<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CandidatAccountCreated extends Notification
{
    use Queueable;

    public $user;
    public $password;

    /**
     * Create a new notification instance.
     */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Votre compte candidat a été créé')
            ->greeting('Bonjour ' . $this->user->name . ',')
            ->line('Votre compte candidat a été créé avec succès. Voici vos informations de connexion :')
            ->line('Email : ' . $this->user->email)
            ->line('Mot de passe : ' . $this->password)
            ->action('Se connecter', route('login.dge'))
            ->line('Merci,')
            ->line('L\'équipe ' . config('app.name'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}