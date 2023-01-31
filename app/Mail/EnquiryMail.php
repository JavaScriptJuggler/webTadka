<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnquiryMail extends Mailable
{
    use Queueable, SerializesModels;
    public $body, $subject, $fromwhere;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body_string, $subject, $fromwhere)
    {
        $this->body = $body_string;
        $this->subject = $subject;
        $this->fromwhere = $fromwhere;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address('team@webtadka.com', 'Team Webtadka'),
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        if ($this->fromwhere == 'backend') {
            return new Content(
                view: 'mail.admin_mails',
            );
        }
        if ($this->fromwhere == 'frontend1') {
            return new Content(
                view: 'mail.frontend_mail',
            );
        }
        if ($this->fromwhere == 'frontend2') {
            return new Content(
                view: 'mail.blogmail',
            );
        }
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
