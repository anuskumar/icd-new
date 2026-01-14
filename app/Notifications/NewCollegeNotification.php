<?php

namespace App\Notifications;

use App\Models\College;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCollegeNotification extends Notification
{
    use Queueable;

    protected $college;

    /**
     * Create a new notification instance.
     */
    public function __construct(College $college)
    {
        $this->college = $college;
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
            'message' => 'New college added: ' . $this->college->name,
        ];
    }
}
