<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ContactFormMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $surname;
    public $email;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $surname, $email, $messages)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->messages = $messages;
    }

    public function build()
    {
        Log::info('ContactFormMailable build function was called');

        return $this->from($this->email)
            ->view('emails.contact', [
                'name' => $this->name,
                'surname' => $this->surname,
                'email' => $this->email,
                'messages' => $this->messages,
            ]);
    }
}
