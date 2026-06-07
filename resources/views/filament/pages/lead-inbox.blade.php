<x-filament-panels::page>
<style>
/* ════════════════════════════════════════
   INBOX SHELL
════════════════════════════════════════ */
.inbox-wrap {
    display: grid;
    grid-template-columns: 300px 1fr;
    height: calc(100vh - 9rem);
    background: #fff;
    border-radius: .875rem;
    box-shadow: 0 2px 16px rgba(0,0,0,.07);
    overflow: hidden;
    border: 1px solid #e2e8f0;
}

/* ── Sidebar ── */
.inbox-sidebar {
    display: flex;
    flex-direction: column;
    border-right: 1px solid #e2e8f0;
    background: #f8fafc;
    overflow: hidden;
}
.inbox-sidebar-top {
    padding: .875rem 1rem .625rem;
    background: #fff;
    border-bottom: 1px solid #f1f5f9;
}
.inbox-sidebar-top h3 {
    font-size: .9375rem;
    font-weight: 700;
    color: #1E2A3A;
    margin-bottom: .625rem;
}
.inbox-filters {
    display: flex;
    gap: .25rem;
    flex-wrap: wrap;
}
.ifilter {
    font-size: .6875rem;
    font-weight: 600;
    padding: .2rem .5rem;
    border-radius: 2rem;
    border: 1.5px solid #e2e8f0;
    background: transparent;
    color: #64748b;
    cursor: pointer;
    transition: all .15s;
    line-height: 1.5;
}
.ifilter.on, .ifilter:hover { background: #1A4F8B; color: #fff; border-color: #1A4F8B; }

.inbox-list { overflow-y: auto; flex: 1; }

.lead-row {
    padding: .75rem 1rem;
    border-bottom: 1px solid #f1f5f9;
    cursor: pointer;
    transition: background .12s;
    position: relative;
}
.lead-row:hover    { background: #eef2f8; }
.lead-row.active   { background: #e3ecf7; border-left: 3px solid #1A4F8B; padding-left: calc(1rem - 3px); }
.lead-row-name     { font-size: .875rem; font-weight: 700; color: #1E2A3A; }
.lead-row-sub      { font-size: .75rem; color: #64748b; margin-top: .1rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.lead-row-preview  { font-size: .75rem; color: #94a3b8; margin-top: .125rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.lead-row-time     { position: absolute; top: .75rem; right: .875rem; font-size: .625rem; color: #cbd5e1; }
.lead-dot {
    display: inline-block;
    width: 7px; height: 7px;
    border-radius: 50%;
    margin-right: .375rem;
    vertical-align: middle;
    margin-top: -1px;
}
.dot-new         { background: #ef4444; }
.dot-in_progress { background: #f59e0b; }
.dot-replied     { background: #3b82f6; }
.dot-closed      { background: #22c55e; }

/* ── Main conversation area ── */
.inbox-main {
    display: flex;
    flex-direction: column;
    overflow: hidden;
    background: #fff;
}

/* Empty state */
.inbox-empty {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #94a3b8;
    gap: .75rem;
}
.inbox-empty i { font-size: 2.25rem; opacity: .35; }
.inbox-empty span { font-size: .875rem; }

/* ── Conv header ── */
.conv-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: .75rem 1.25rem;
    border-bottom: 1px solid #f1f5f9;
    gap: .75rem;
    background: #fff;
    flex-shrink: 0;
}
.conv-head-name    { font-size: 1rem; font-weight: 700; color: #1E2A3A; }
.conv-head-sub     { font-size: .8125rem; color: #64748b; margin-top: .125rem; }
.conv-head-sub a   { color: #1A4F8B; text-decoration: none; }
.conv-head-right   { display: flex; align-items: center; gap: .625rem; flex-shrink: 0; }

/* Info panel toggle button */
.info-toggle-btn {
    font-size: .75rem;
    font-weight: 600;
    color: #64748b;
    background: #f1f5f9;
    border: none;
    border-radius: .5rem;
    padding: .375rem .75rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: .375rem;
    transition: background .15s, color .15s;
}
.info-toggle-btn:hover, .info-toggle-btn.open { background: #e2e8f0; color: #1A4F8B; }

/* Status pill selector */
.status-pill {
    font-size: .75rem;
    font-weight: 700;
    padding: .375rem .875rem;
    border-radius: 2rem;
    border: none !important;
    cursor: pointer;
    transition: opacity .15s;
    -webkit-appearance: none !important;
    -moz-appearance: none !important;
    appearance: none !important;
    background-image: none !important;
    outline: none;
    box-shadow: none !important;
    padding-right: .875rem !important; /* override Tailwind forms right-padding for arrow */
}
.status-pill:hover { opacity: .85; }
.spill-new         { background: #fee2e2 !important; color: #dc2626 !important; }
.spill-in_progress { background: #fef3c7 !important; color: #b45309 !important; }
.spill-replied     { background: #dbeafe !important; color: #1d4ed8 !important; }
.spill-closed      { background: #dcfce7 !important; color: #15803d !important; }

/* ── Collapsible info panel ── */
.conv-info-panel {
    background: #f8fafc;
    border-bottom: 1px solid #e2e8f0;
    overflow: hidden;
    max-height: 0;
    transition: max-height .25s ease, padding .25s ease;
    flex-shrink: 0;
}
.conv-info-panel.open {
    max-height: 200px;
    padding: .75rem 1.25rem;
}
.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
    gap: .5rem .75rem;
}
.info-cell strong { display: block; font-size: .6875rem; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: .04em; }
.info-cell span   { font-size: .8125rem; color: #374151; }

/* ── Thread ── */
.conv-thread {
    flex: 1;
    overflow-y: auto;
    padding: 1.25rem 1.5rem;
    display: flex;
    flex-direction: column;
    gap: 0;
    background: #fff;
}

/* Message group: consecutive messages from same sender grouped together */
.msg-group {
    display: flex;
    gap: .75rem;
    margin-bottom: 1.25rem;
}
.msg-group.from-lead   { align-self: flex-start; max-width: 78%; }
.msg-group.from-team   { align-self: flex-end;   max-width: 78%; flex-direction: row-reverse; }
.msg-group.is-system   { align-self: center; max-width: 100%; flex-direction: column; align-items: center; }

/* Avatar */
.mg-avatar {
    width: 2rem; height: 2rem;
    border-radius: 50%;
    font-size: .75rem;
    font-weight: 800;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    align-self: flex-end;
    margin-bottom: .125rem;
}
.av-lead { background: #e0e7ff; color: #4338ca; }
.av-team { background: #1A4F8B; color: #fff; }

/* Bubble stack inside a group */
.mg-bubbles { display: flex; flex-direction: column; gap: .25rem; }
.mg-sender  { font-size: .6875rem; font-weight: 600; color: #94a3b8; margin-bottom: .25rem; }
.from-team .mg-sender { text-align: right; }

.bubble {
    padding: .625rem .9375rem;
    border-radius: 1rem;
    font-size: .875rem;
    line-height: 1.6;
    white-space: pre-wrap;
    word-break: break-word;
}
/* First bubble in group: full radius; subsequent: slight flat on same-side corner */
.from-lead  .bubble { background: #f1f5f9; color: #1E2A3A; border-bottom-left-radius: .25rem; }
.from-team  .bubble { background: #1A4F8B; color: #fff;    border-bottom-right-radius: .25rem; text-align: left; }
/* Last bubble — restore full radius */
.from-lead  .mg-bubbles .bubble:last-child  { border-bottom-left-radius: 1rem; }
.from-team  .mg-bubbles .bubble:last-child  { border-bottom-right-radius: 1rem; }
/* First non-last bubble: flatten connecting corner */
.from-lead  .mg-bubbles .bubble:not(:last-child) { border-bottom-left-radius: .25rem; border-top-left-radius: .25rem; }
.from-team  .mg-bubbles .bubble:not(:last-child) { border-bottom-right-radius: .25rem; border-top-right-radius: .25rem; }

.bubble-time {
    font-size: .625rem;
    color: #cbd5e1;
    margin-top: .25rem;
}
.from-team .bubble-time { text-align: right; }

/* System note */
.sys-note {
    font-size: .75rem;
    color: #94a3b8;
    font-style: italic;
    display: flex;
    align-items: center;
    gap: .625rem;
    margin-bottom: 1rem;
}
.sys-note::before, .sys-note::after {
    content: '';
    flex: 1;
    height: 1px;
    background: #f1f5f9;
}

/* Internal note bubble */
.note-bubble-wrap {
    align-self: center;
    max-width: 80%;
    margin-bottom: 1rem;
}
.note-bubble-inner {
    background: #fefce8;
    border: 1px solid #fde68a;
    border-radius: .75rem;
    padding: .5rem .875rem;
    font-size: .8125rem;
    color: #92400e;
    font-style: italic;
    text-align: center;
}

/* ── Composer ── */
.conv-composer {
    border-top: 1px solid #e2e8f0;
    background: #fff;
    flex-shrink: 0;
}
.comp-tabs {
    display: flex;
    border-bottom: 1px solid #f1f5f9;
    padding: 0 1.25rem;
    gap: 0;
}
.comp-tab {
    padding: .5rem .875rem;
    font-size: .8125rem;
    font-weight: 600;
    color: #94a3b8;
    cursor: pointer;
    border-bottom: 2px solid transparent;
    transition: all .15s;
    background: none;
    border-top: none; border-left: none; border-right: none;
    display: flex; align-items: center; gap: .375rem;
}
.comp-tab.on { color: #1A4F8B; border-bottom-color: #1A4F8B; }
.comp-body { padding: .75rem 1.25rem .875rem; }
.comp-textarea {
    width: 100%;
    border: 1.5px solid #e2e8f0;
    border-radius: .625rem;
    padding: .625rem .875rem;
    font-size: .875rem;
    font-family: inherit;
    resize: none;
    outline: none;
    transition: border-color .2s;
    color: #1E2A3A;
    background: #f8fafc;
}
.comp-textarea:focus { border-color: #1A4F8B; background: #fff; }
.comp-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: .5rem;
}
.comp-hint { font-size: .75rem; color: #94a3b8; display: flex; align-items: center; gap: .375rem; }
.send-btn {
    display: inline-flex;
    align-items: center;
    gap: .375rem;
    background: #1A4F8B;
    color: #fff;
    border: none;
    border-radius: .5rem;
    padding: .5rem 1.125rem;
    font-size: .875rem;
    font-weight: 600;
    cursor: pointer;
    transition: background .15s;
}
.send-btn:hover { background: #0E3A6B; }
.send-btn.note  { background: #78716c; }
.send-btn.note:hover { background: #57534e; }

.comp-panel { display: none; }
.comp-panel.on { display: block; }

@media (max-width: 860px) {
    .inbox-wrap { grid-template-columns: 240px 1fr; }
}
@media (max-width: 640px) {
    .inbox-wrap { grid-template-columns: 1fr; height: auto; }
    .inbox-sidebar { max-height: 280px; }
}
</style>

<div class="inbox-wrap" x-data="{ composer: 'reply', infoOpen: false }">

    {{-- ══════════ SIDEBAR ══════════ --}}
    <div class="inbox-sidebar">
        <div class="inbox-sidebar-top">
            <h3>Leads
                @php $newCount = \App\Models\ContactLead::where('status','new')->count(); @endphp
                @if($newCount > 0)
                    <span style="background:#ef4444;color:#fff;font-size:.625rem;font-weight:700;padding:.15rem .4rem;border-radius:2rem;margin-left:.375rem;">{{ $newCount }}</span>
                @endif
            </h3>
            <div class="inbox-filters">
                @foreach(['all'=>'All','new'=>'New','in_progress'=>'Active','replied'=>'Replied','closed'=>'Closed'] as $val => $label)
                    <button class="ifilter {{ $filterStatus === $val ? 'on' : '' }}"
                            wire:click="setFilter('{{ $val }}')">{{ $label }}</button>
                @endforeach
            </div>
        </div>

        <div class="inbox-list">
            @forelse($this->leads as $lead)
                <div class="lead-row {{ $activeLead == $lead->id ? 'active' : '' }}"
                     wire:click="selectLead({{ $lead->id }})">
                    <div class="lead-row-time">{{ $lead->created_at->diffForHumans(null, true) }}</div>
                    <div class="lead-row-name">
                        <span class="lead-dot dot-{{ $lead->status }}"></span>{{ $lead->name }}
                    </div>
                    <div class="lead-row-sub">{{ $lead->email }}</div>
                    <div class="lead-row-preview">{{ Str::limit($lead->message, 55) }}</div>
                </div>
            @empty
                <div style="padding:2rem;text-align:center;color:#94a3b8;font-size:.8125rem;">No leads.</div>
            @endforelse
        </div>
    </div>

    {{-- ══════════ MAIN ══════════ --}}
    <div class="inbox-main">

        @if(!$this->activeLeadModel)
            <div class="inbox-empty">
                <i class="fas fa-inbox"></i>
                <span>Select a lead to open the conversation</span>
            </div>

        @else
            @php
                $lead   = $this->activeLeadModel;
                $parsed = $lead->parsedMessage();
                $statusClasses = [
                    'new'         => 'spill-new',
                    'in_progress' => 'spill-in_progress',
                    'replied'     => 'spill-replied',
                    'closed'      => 'spill-closed',
                ];
                $sc = $statusClasses[$lead->status] ?? 'spill-new';
            @endphp

            {{-- Header --}}
            <div class="conv-head">
                <div style="flex:1;min-width:0;">
                    <div class="conv-head-name">{{ $lead->name }}</div>
                    <div class="conv-head-sub">
                        <a href="mailto:{{ $lead->email }}">{{ $lead->email }}</a>
                        @if($lead->phone) &nbsp;·&nbsp; <a href="tel:{{ $lead->phone }}">{{ $lead->phone }}</a> @endif
                        &nbsp;·&nbsp; {{ $lead->created_at->format('M j, Y') }}
                    </div>
                </div>
                <div class="conv-head-right">
                    {{-- Info toggle --}}
                    @if($parsed)
                    <button class="info-toggle-btn" :class="{ open: infoOpen }" @click="infoOpen = !infoOpen">
                        <i class="fas fa-circle-info"></i>
                        <span x-text="infoOpen ? 'Hide Info' : 'View Info'">View Info</span>
                    </button>
                    @endif

                    {{-- Status — custom dropdown, no native arrow ── --}}
                    <div style="position:relative;" x-data="{ sopen: false }">
                        <button @click="sopen=!sopen" @click.outside="sopen=false"
                                class="status-pill spill-{{ $lead->status }}"
                                type="button">
                            {{ $lead->statusLabel() }}
                        </button>
                        <div x-show="sopen" x-transition
                             style="position:absolute;top:calc(100% + 6px);right:0;background:#fff;border:1px solid #e2e8f0;border-radius:.625rem;box-shadow:0 8px 24px rgba(0,0,0,.1);min-width:140px;z-index:50;overflow:hidden;">
                            @foreach(['new'=>['New','#fee2e2','#dc2626'],'in_progress'=>['In Progress','#fef3c7','#b45309'],'replied'=>['Replied','#dbeafe','#1d4ed8'],'closed'=>['Closed','#dcfce7','#15803d']] as $val => $info)
                                <button type="button"
                                        wire:click="updateStatus('{{ $val }}')"
                                        @click="sopen=false"
                                        style="display:flex;align-items:center;gap:.5rem;width:100%;padding:.5rem .875rem;font-size:.8125rem;font-weight:600;background:transparent;border:none;cursor:pointer;color:#374151;text-align:left;"
                                        onmouseover="this.style.background='#f8fafc'"
                                        onmouseout="this.style.background='transparent'">
                                    <span style="width:8px;height:8px;border-radius:50%;background:{{ $info[2] }};flex-shrink:0;display:inline-block;"></span>
                                    {{ $info[0] }}
                                    @if($lead->status === $val)
                                        <span style="margin-left:auto;color:{{ $info[2] }};">✓</span>
                                    @endif
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- Collapsible info panel --}}
            @if($parsed)
            <div class="conv-info-panel" :class="{ open: infoOpen }">
                <div class="info-grid">
                    @foreach($parsed as $key => $val)
                        @if(!in_array($key, ['Notes','Additional Notes']))
                        <div class="info-cell">
                            <strong>{{ $key }}</strong>
                            <span>{{ Str::limit($val, 50) }}</span>
                        </div>
                        @endif
                    @endforeach
                </div>
                @if(isset($parsed['Notes']))
                <div style="margin-top:.625rem;font-size:.8125rem;color:#374151;border-top:1px solid #e2e8f0;padding-top:.5rem;">
                    <strong style="font-size:.6875rem;color:#94a3b8;text-transform:uppercase;letter-spacing:.04em;">Notes</strong><br>
                    {{ $parsed['Notes'] }}
                </div>
                @endif
            </div>
            @endif

            {{-- ── Thread ── --}}
            <div class="conv-thread" id="thread-{{ $lead->id }}">

                {{-- Build message groups: consecutive messages from same sender --}}
                @php
                    // Merge original inbound + all replies/notes into a flat list
                    $allItems = collect([
                        (object)[
                            'type'       => 'inbound',
                            'body'       => $lead->message,
                            'sender'     => $lead->name,
                            'sender_key' => 'lead',
                            'time'       => $lead->created_at,
                        ]
                    ]);

                    foreach ($lead->replies as $r) {
                        $allItems->push((object)[
                            'type'       => $r->type,
                            'body'       => $r->body,
                            'sender'     => $r->user?->name ?? 'DBillers',
                            'sender_key' => $r->type === 'reply' ? 'team' : 'system',
                            'time'       => $r->created_at,
                        ]);
                    }

                    // Group consecutive messages by same sender_key
                    $groups   = [];
                    $curGroup = null;

                    foreach ($allItems as $item) {
                        if ($curGroup === null || $curGroup['key'] !== $item->sender_key) {
                            if ($curGroup !== null) $groups[] = $curGroup;
                            $curGroup = [
                                'key'    => $item->sender_key,
                                'sender' => $item->sender,
                                'items'  => [],
                            ];
                        }
                        $curGroup['items'][] = $item;
                    }
                    if ($curGroup !== null) $groups[] = $curGroup;
                @endphp

                @foreach($groups as $group)

                    @if($group['key'] === 'system')
                        {{-- System notes / status changes --}}
                        @foreach($group['items'] as $item)
                            @if(str_starts_with($item->body, '—'))
                                <div class="sys-note">{{ $item->body }}</div>
                            @else
                                <div class="note-bubble-wrap">
                                    <div class="note-bubble-inner">
                                        <i class="fas fa-sticky-note" style="margin-right:.375rem;"></i>{{ $item->body }}
                                    </div>
                                    <div style="font-size:.625rem;color:#cbd5e1;text-align:center;margin-top:.25rem;">{{ $item->time->format('M j, g:i A') }}</div>
                                </div>
                            @endif
                        @endforeach

                    @else
                        @php
                            $isLead = $group['key'] === 'lead' || $group['key'] === 'inbound';
                            $initial = strtoupper(substr($group['sender'], 0, 1));
                        @endphp
                        <div class="msg-group {{ $isLead ? 'from-lead' : 'from-team' }}">

                            {{-- Avatar --}}
                            <div class="mg-avatar {{ $isLead ? 'av-lead' : 'av-team' }}">{{ $initial }}</div>

                            <div class="mg-bubbles" style="flex:1;min-width:0;">
                                {{-- Sender name + first timestamp --}}
                                <div class="mg-sender">
                                    {{ $group['sender'] }}
                                    &nbsp;·&nbsp; {{ $group['items'][0]->time->format('M j, g:i A') }}
                                </div>

                                {{-- All bubbles in this group --}}
                                @foreach($group['items'] as $i => $item)
                                    <div class="bubble">{{ $item->body }}</div>
                                    {{-- Show time only on last bubble if group has multiple --}}
                                    @if($i === count($group['items']) - 1 && count($group['items']) > 1)
                                        <div class="bubble-time">{{ $item->time->format('g:i A') }}</div>
                                    @endif
                                @endforeach
                            </div>

                        </div>
                    @endif

                @endforeach

            </div>

            {{-- ── Composer ── --}}
            <div class="conv-composer">
                <div class="comp-tabs">
                    <button class="comp-tab" :class="{ on: composer==='reply' }" @click="composer='reply'">
                        <i class="fas fa-reply"></i> Reply by Email
                    </button>
                    <button class="comp-tab" :class="{ on: composer==='note' }" @click="composer='note'">
                        <i class="fas fa-sticky-note"></i> Internal Note
                    </button>
                </div>

                <div class="comp-panel" :class="{ on: composer==='reply' }">
                    <div class="comp-body">
                        <textarea class="comp-textarea" rows="3"
                            wire:model="replyBody"
                            placeholder="Write your reply to {{ $lead->name }}..."></textarea>
                        <div class="comp-footer">
                            <span class="comp-hint">
                                <i class="fas fa-envelope" style="color:#1A4F8B;"></i>
                                Sending to {{ $lead->email }}
                            </span>
                            <button class="send-btn" wire:click="sendReply" wire:loading.attr="disabled">
                                <span wire:loading.remove wire:target="sendReply"><i class="fas fa-paper-plane"></i> Send</span>
                                <span wire:loading wire:target="sendReply"><i class="fas fa-spinner fa-spin"></i> Sending…</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="comp-panel" :class="{ on: composer==='note' }">
                    <div class="comp-body">
                        <textarea class="comp-textarea" rows="3"
                            wire:model="noteBody"
                            placeholder="Add a private note — only your team can see this…"></textarea>
                        <div class="comp-footer">
                            <span class="comp-hint" style="color:#a8a29e;">
                                <i class="fas fa-eye-slash"></i> Internal only
                            </span>
                            <button class="send-btn note" wire:click="addNote">
                                <i class="fas fa-sticky-note"></i> Add Note
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<script>
document.addEventListener('livewire:updated', function () {
    var t = document.querySelector('[id^="thread-"]');
    if (t) t.scrollTop = t.scrollHeight;
});
</script>

</x-filament-panels::page>
