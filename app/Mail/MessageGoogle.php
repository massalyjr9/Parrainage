<?php

namespace App\Mail;

use App\Models\Electeur;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageGoogle extends Mailable
{
    use Queueable, SerializesModels;

    public $electeur;
    public $code_auth;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Electeur $electeur, $code_auth)
    {
        $this->electeur = $electeur;
        $this->code_auth = $code_auth;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("no-reply@kayparrainer.sn")
                    ->subject('Création de votre compte électeur')
                    ->view('emails.message_google')
                    ->with([
                        'electeur' => $this->electeur,
                        'code_auth' => $this->code_auth,
                    ]);
    }
}