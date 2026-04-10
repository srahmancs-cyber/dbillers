<!DOCTYPE html>
<html>
<head>
    <title>Thank You - DBillers</title>
</head>
<body>
    <h2>Thank You, {{ $lead->name }}!</h2>
    
    <p>We have received your message and will get back to you within 24 hours.</p>
    
    <p><strong>Your message:</strong></p>
    <p>{{ $lead->message }}</p>
    
    <hr>
    <p>Best regards,<br>
    DBillers Team<br>
    {{ url('/') }}</p>
</body>
</html>
