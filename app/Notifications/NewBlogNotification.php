<?php

namespace App\Notifications;

use App\Models\Blog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewBlogNotification extends Notification
{
    use Queueable;

    protected $blog;

    /**
     * Create a new notification instance.
     */
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
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
            'message' => 'New blog added: ' . $this->blog->title,
        ];
    }
}
