<?php

namespace App\Filament\Pages;

use App\Mail\LeadReplyMail;
use App\Models\ContactLead;
use App\Models\LeadReply;
use App\Models\User;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LeadInbox extends Page
{
    protected static ?string $navigationIcon  = 'heroicon-o-inbox';
    protected static ?string $navigationLabel = 'Lead Inbox';
    protected static ?string $navigationGroup = null;   // top-level, no group
    protected static ?int    $navigationSort  = 2;      // Dashboard=1, Inbox=2
    protected static string  $view            = 'filament.pages.lead-inbox';

    // ── State ─────────────────────────────────────────────────────
    public ?int    $activeLead  = null;
    public string  $replyBody   = '';
    public string  $noteBody    = '';
    public string  $filterStatus = 'all';

    public static function canAccess(): bool
    {
        return Auth::check();
    }

    public static function getNavigationBadge(): ?string
    {
        $count = ContactLead::whereIn('status', ['new', 'unread'])->count();
        return $count > 0 ? (string) $count : null;
    }

    public static function getNavigationBadgeColor(): string
    {
        return 'danger';
    }

    // ── Computed ──────────────────────────────────────────────────

    public function getLeadsProperty()
    {
        $q = ContactLead::orderBy('created_at', 'desc');

        if ($this->filterStatus !== 'all') {
            // Support legacy 'unread'/'read' values
            if ($this->filterStatus === 'new') {
                $q->whereIn('status', ['new', 'unread']);
            } elseif ($this->filterStatus === 'closed') {
                $q->whereIn('status', ['closed', 'read']);
            } else {
                $q->where('status', $this->filterStatus);
            }
        }

        return $q->get();
    }

    public function getActiveLeadModelProperty(): ?ContactLead
    {
        if (!$this->activeLead) return null;
        return ContactLead::with(['replies.user', 'assignedTo'])->find($this->activeLead);
    }

    // ── Actions ───────────────────────────────────────────────────

    public function selectLead(int $id): void
    {
        $this->activeLead = $id;
        $this->replyBody  = '';
        $this->noteBody   = '';

        // Auto-mark new/unread as in_progress
        $lead = ContactLead::find($id);
        if ($lead && in_array($lead->status, ['new', 'unread'])) {
            $lead->update(['status' => 'in_progress']);
            LeadReply::create([
                'contact_lead_id' => $id,
                'user_id'         => Auth::id(),
                'type'            => 'note',
                'body'            => '— Marked as In Progress',
            ]);
        }
    }

    public function sendReply(): void
    {
        $body = trim($this->replyBody);
        if (!$body) return;

        $lead = ContactLead::findOrFail($this->activeLead);

        // Save reply to thread
        $reply = LeadReply::create([
            'contact_lead_id' => $lead->id,
            'user_id'         => Auth::id(),
            'type'            => 'reply',
            'body'            => $body,
        ]);

        // Send email to lead
        try {
            Mail::to($lead->email)->send(new LeadReplyMail($lead, $reply));

            // Update status
            $lead->update(['status' => 'replied']);

            // Log the status change
            LeadReply::create([
                'contact_lead_id' => $lead->id,
                'user_id'         => Auth::id(),
                'type'            => 'note',
                'body'            => '— Reply sent by email to ' . $lead->email,
            ]);

            Notification::make()
                ->title('Reply sent to ' . $lead->email)
                ->success()
                ->send();

        } catch (\Exception $e) {
            Notification::make()
                ->title('Email failed: ' . $e->getMessage())
                ->danger()
                ->send();
        }

        $this->replyBody = '';
        $this->activeLead = $lead->id; // refresh
    }

    public function addNote(): void
    {
        $body = trim($this->noteBody);
        if (!$body) return;

        LeadReply::create([
            'contact_lead_id' => $this->activeLead,
            'user_id'         => Auth::id(),
            'type'            => 'note',
            'body'            => $body,
        ]);

        $this->noteBody = '';

        Notification::make()->title('Note added')->success()->send();
    }

    public function updateStatus(string $status): void
    {
        if (!$this->activeLead) return;

        $lead = ContactLead::findOrFail($this->activeLead);
        $old  = $lead->statusLabel();
        $lead->update(['status' => $status]);

        $labels = [
            'new'         => 'New',
            'in_progress' => 'In Progress',
            'replied'     => 'Replied',
            'closed'      => 'Closed',
        ];

        LeadReply::create([
            'contact_lead_id' => $lead->id,
            'user_id'         => Auth::id(),
            'type'            => 'note',
            'body'            => "— Status changed: {$old} → " . ($labels[$status] ?? $status),
        ]);

        Notification::make()->title('Status updated')->success()->send();
    }

    public function setFilter(string $status): void
    {
        $this->filterStatus = $status;
        $this->activeLead   = null;
    }
}
