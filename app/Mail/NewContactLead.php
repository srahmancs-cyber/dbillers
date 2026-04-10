<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\ContactLead;

class NewContactLead extends Mailable
{
    use Queueable, SerializesModels;

    public $lead;

    public function __construct(ContactLead $lead)
    {
        $this->lead = $lead;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Contact Form Submission - DBillers',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.admin-lead',
        );
    }
}
