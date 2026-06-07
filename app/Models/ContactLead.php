<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactLead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'message', 'status', 'assigned_to',
    ];

    // ── Relationships ─────────────────────────────────────────────

    public function replies()
    {
        return $this->hasMany(LeadReply::class)->orderBy('created_at', 'asc');
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    // ── Helpers ───────────────────────────────────────────────────

    /**
     * Parse the structured message (from the multi-step contact form)
     * into a key → value array for clean display.
     */
    public function parsedMessage(): array
    {
        $lines  = explode("\n", $this->message ?? '');
        $parsed = [];
        $notes  = [];

        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '') continue;

            if (str_contains($line, ': ')) {
                [$key, $val]   = explode(': ', $line, 2);
                $parsed[trim($key)] = trim($val);
            } else {
                $notes[] = $line;
            }
        }

        if ($notes) {
            $parsed['Notes'] = implode(' ', $notes);
        }

        return $parsed;
    }

    public function statusColor(): string
    {
        return match ($this->status) {
            'new'         => 'danger',
            'in_progress' => 'warning',
            'replied'     => 'info',
            'closed'      => 'success',
            default       => 'gray',
        };
    }

    public function statusLabel(): string
    {
        return match ($this->status) {
            'new'         => 'New',
            'in_progress' => 'In Progress',
            'replied'     => 'Replied',
            'closed'      => 'Closed',
            // legacy values
            'unread'      => 'New',
            'read'        => 'Closed',
            default       => ucfirst($this->status),
        };
    }
}
