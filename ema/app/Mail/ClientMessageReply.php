<?php

namespace App\Mail;

use App\Models\ClientMessage;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class ClientMessageReply extends Mailable
{
    public function __construct(
        public ClientMessage $clientMessage,
        public string $reply,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Re: '.$this->clientMessage->subject,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.client-message-reply',
        );
    }
}
