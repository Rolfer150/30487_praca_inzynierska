<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function (object $notifiable, string $url)
        {
            return (new MailMessage)
                ->subject('Aplikacja Oferty Pracy - Weryfikacja E-Mail')
                ->line('Udało Ci się założyć konto na naszej stronie. Aby wpełni korzystać z naszych usług,
                kliknij poniżej przycisk weryfikujący adres e-mail.')
                ->action('Zweryfikuj E-Mail', $url);
        });
    }
}
