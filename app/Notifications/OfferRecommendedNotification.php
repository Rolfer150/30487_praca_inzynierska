<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OfferRecommendedNotification extends Notification
{
    use Queueable;
    public $offers;

    /**
     * Create a new notification instance.
     */
    public function __construct($offers)
    {
        $this->offers = $offers;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('Witaj! Poniżej znajduje się lista ofert, które mogą Cię zainteresować.')
                    ->action('Przejdź do Strony', url('/'))
                    ->line('Może tu być idealna oferta dla Ciebie!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $offerIDArray = [];
        foreach ($this->offers as $key => $value)
        {
            $offerIDArray[] = $value;
        }
        return [
            'title' => 'Lista polecanych ofert pracy!',
            'offerID' => $offerIDArray,
            'description' => 'Poniżej system odnalazł oferty pracy, które mogą Cię zainteresować:',
        ];
    }
}
