<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\NewUserNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class NewUserRegisteredNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        $admins = User::where('user_type', 'A')->get();
        Notification::send($admins, new NewUserNotification($event->user));
    }
}
