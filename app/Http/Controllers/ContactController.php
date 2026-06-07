<?php

namespace App\Http\Controllers;

use App\Models\ContactLead;
use App\Models\LeadReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewContactLead;
use App\Mail\ContactAutoReply;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
            'selected_challenges' => 'nullable|string',
        ]);

        // Append challenges to message if present
        $finalMessage = $validated['message'];
        if (!empty($validated['selected_challenges'])) {
            $finalMessage .= "\n\n--- Selected Challenges ---\n" . str_replace(', ', "\n• ", $validated['selected_challenges']);
        }

        $lead = ContactLead::create([
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'phone'   => $validated['phone'],
            'message' => $finalMessage,
            'status'  => 'new',
        ]);

        // Log the auto-reply that will be sent as a thread entry
        LeadReply::create([
            'contact_lead_id' => $lead->id,
            'user_id'         => null,
            'type'            => 'reply',
            'body'            => "Hi {$lead->name},\n\nThank you for reaching out to DBillers. We've received your free practice audit request and a billing specialist is already reviewing your information.\n\nYou'll hear from us within 24 hours. We'll reach out to schedule your free 30-minute audit call.\n\n— DBillers Support Team",
        ]);

        // Send email to admin (from settings)
        $adminEmail = setting('company_email');
        if ($adminEmail) {
            Mail::to($adminEmail)->send(new NewContactLead($lead));
        }
        
        // Send auto-reply to user
        Mail::to($lead->email)->send(new ContactAutoReply($lead));

        // Redirect to dedicated thank you page
        return redirect()->route('thank-you');
    }
}
