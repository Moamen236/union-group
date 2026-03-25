<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Message</title>
</head>
<body style="font-family: Arial, sans-serif; color: #222; line-height: 1.6;">
    <h2 style="margin-bottom: 12px;">New Contact Form Message</h2>

    <p style="margin: 0 0 8px;"><strong>Name:</strong> {{ $contactMessage->name }}</p>
    <p style="margin: 0 0 8px;"><strong>Email:</strong> {{ $contactMessage->email }}</p>
    <p style="margin: 0 0 8px;"><strong>Phone:</strong> {{ $contactMessage->phone ?: 'N/A' }}</p>
    <p style="margin: 0 0 8px;"><strong>Subject:</strong> {{ $contactMessage->subject ?: 'N/A' }}</p>

    <p style="margin: 16px 0 8px;"><strong>Message:</strong></p>
    <div style="padding: 12px; border: 1px solid #ddd; background: #fafafa; white-space: pre-wrap;">{{ $contactMessage->message }}</div>
</body>
</html>

