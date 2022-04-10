<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    protected string $userMail;
    protected string $userMessage;

    /**
     * Create a new message instance.
     * @return void
     */
    public function __construct(string $userMail, string $userMessage) {
        $this->userMail = $userMail;
        $this->userMessage = $userMessage;
    }

    /**
     * Build the message.
     * @return $this
     */
    public function build() {
        // Use from() if you want to set a different sender mail & name than default
        return $this->from('example@example.com', 'Example')
            // Blade template for the mail content
                    ->view('emails.mailTemplate')
            // with to send protected properties in the template
                    ->with(['userMail'    => $this->userMail,
                            'userMessage' => $this->userMessage]);
    }
}
