<!DOCTYPE html>
<html>
<head>
    <title>New Contact Lead</title>
</head>
<body>
    <h2>New Contact Form Submission</h2>
    
    <p><strong>Name:</strong> {{ $lead->name }}</p>
    <p><strong>Email:</strong> {{ $lead->email }}</p>
    <p><strong>Phone:</strong> {{ $lead->phone ?? 'Not provided' }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $lead->message }}</p>
    
    <hr>
    <p>View all leads in admin panel: {{ url('/admin/contact-leads') }}</p>
</body>
</html>
