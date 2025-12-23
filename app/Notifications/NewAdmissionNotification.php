<?php

namespace App\Notifications;

use App\Models\Admission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewAdmissionNotification extends Notification
{
    use Queueable;

    protected $admission;

    /**
     * Create a new notification instance.
     */
    public function __construct(Admission $admission)
    {
        $this->admission = $admission;
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
            'message' => 'New admission application for course: ' . $this->admission->course->name . ' at ' . $this->admission->college->name,
        ];
    }
}
