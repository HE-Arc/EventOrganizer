<?php

namespace App\Mail;

use App\LoginToken;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoginMail extends Mailable
{
    use Queueable, SerializesModels;


    private $loginToken;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(LoginToken $loginToken)
    {
        $this->loginToken = $loginToken;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('auth.email_click_to_login',["token" => $this->loginToken->token]);
    }
}
