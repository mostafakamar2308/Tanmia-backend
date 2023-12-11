<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserMessage extends Notification
{
    public $message;
    public $name;
    public $id;

    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $message, string $name, int $id)
    {
        $this->message = $message;
        $this->name = $name;
        $this->id = $id;
    }

    //


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
     * Get the mail representation of the notification.
     */

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => $this->message,
            'name' => $this->name,
            'id' => $this->id,
            'count' => $notifiable->unreadNotifications->count(),
        ];
    }
}
