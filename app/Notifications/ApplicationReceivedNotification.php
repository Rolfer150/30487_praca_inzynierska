<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationReceivedNotification extends Notification
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
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('Użytkownik ' . $this->apply->user->name
                        . ' zaaplikował/a na Twoją ofertę pracy '. $this->apply->offer->name . '.')
                    ->action('Przejdź do Strony', url('/offers/' . $this->apply->offer->slug))
                    ->line('Może to być potencjalny pracownik :O');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'Zaaplikowano na Twoją ofertę',
            'offerName' => $this->apply->offer->name,
            'addresseeName' => $this->apply->user->name,
            'description' => 'Użytkownik ' . $this->apply->user->name
                . ' zaaplikował/a na Twoją ofertę pracy '. $this->apply->offer->name . '.',
            'slug' => $this->apply->offer->slug
        ];
    }
}
