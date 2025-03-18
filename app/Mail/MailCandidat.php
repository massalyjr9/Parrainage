<?php

namespace App\Mail;

use App\Models\Candidat;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailCandidat extends Mailable
{
    use Queueable, SerializesModels;

    public $candidat;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Candidat $candidat, $password)
    {
        $this->candidat = $candidat;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("no-reply@kayparrainer.sn")
                    ->subject('Votre compte candidat a été créé')
                    ->view('emails.MailCandidat')
                    ->with([
                        'candidat' => $this->candidat,
                        'password' => $this->password,
                        'loginUrl' => route('login.candidat'),
                    ]);
    }
}