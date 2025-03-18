<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Electeur;

class SendCode extends Mailable
{
    use Queueable, SerializesModels;

    public $electeur;
    public $codeVerification;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Electeur $electeur, $codeVerification)
    {
        $this->electeur = $electeur;
        $this->codeVerification = $codeVerification;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@kayparrainer.sn')
                    ->subject('Code de Vérification du Parrainage')
                    ->view('emails.send_code')
                    ->with([
                        'electeur' => $this->electeur,
                        'codeVerification' => $this->codeVerification,
                    ]);
    }
}