<?php

namespace App\Http\Controllers;

use App\Models\ContactLead;
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
        ]);

        $lead = ContactLead::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'message' => $validated['message'],
            'status' => 'unread',
        ]);

        // Send email to admin (from settings)
        $adminEmail = setting('company_email');
        if ($adminEmail) {
            Mail::to($adminEmail)->send(new NewContactLead($lead));
        }
        
        // Send auto-reply to user
        Mail::to($lead->email)->send(new ContactAutoReply($lead));

        return redirect()->route('contact')->with('success', 'Thank you for contacting us. We will get back to you within 24 hours.');
    }
}
