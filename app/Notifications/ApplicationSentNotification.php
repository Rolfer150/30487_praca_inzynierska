<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationSentNotification extends Notification
{
    use Queueable;
    public $apply;

    /**
     * Create a new notification instance.
     */
    public function __construct($apply)
    {
        $this->apply = $apply;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'Pomyślne wysłanie aplikacji',
            'offerName' => $this->apply->offer->name,
            'ownerName' => $this->apply->offer->user->name,
            'description' => 'Aplikacja na ofertę pracy "' . $this->apply->offer->name . '" została zakończona pomyślnie.'
        ];
    }
}
