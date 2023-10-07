<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmailTagihan extends Mailable
{
    use Queueable, SerializesModels;

    protected $biaya;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($biaya)
    {
        $this->biaya = $biaya;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Tagihan Perbaikan Light Service',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function build()
    {
        return $this->view('email.tagihan-email')
                    ->with(['biaya' => $this->biaya]); // Menyertakan nilai biaya ke dalam data view
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments(): array
    {
        return [];
    }
}
