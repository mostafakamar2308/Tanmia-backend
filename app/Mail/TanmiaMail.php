<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use function Ramsey\Uuid\v1;

class TanmiaMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data=$data;
    }




    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(

        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.messages',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return string
     */
    public function attachments(): array
    {
        return [];
    }
   /* public function build(): ClientMail
    {
        return $this->subject('Mail from ItSolutionStuff.com')
            ->view('emails.myTestMail');
    }*/
}
