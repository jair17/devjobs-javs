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
        VerifyEmail::toMailUsing(function($notifiable,$url) {
            return(new MailMessage)
                ->subject(__('Verify Email Address'))
                ->line(__('Your account is almost ready, You only need to press the following link here.'))
                ->action(__('Confirm Account'),$url)
                ->line(__("If you don't requested this event, you must ignore this email."));
        });
    }
}
