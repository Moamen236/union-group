<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ContactMessage $contactMessage)
    {
    }

    public function envelope(): Envelope
    {
        $subject = $this->contactMessage->subject
            ? 'New Contact Form Message: ' . $this->contactMessage->subject
            : 'New Contact Form Message';

        return new Envelope(
            subject: $subject,
            replyTo: [$this->contactMessage->email],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-form-submitted',
            with: [
                'contactMessage' => $this->contactMessage,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

