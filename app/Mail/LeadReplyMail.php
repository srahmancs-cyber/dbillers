<?php

namespace App\Mail;

use App\Models\ContactLead;
use App\Models\LeadReply;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LeadReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public ContactLead $lead;
    public LeadReply   $reply;

    public function __construct(ContactLead $lead, LeadReply $reply)
    {
        $this->lead  = $lead;
        $this->reply = $reply;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Re: Your enquiry to DBillers',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.lead-reply',
        );
    }
}
