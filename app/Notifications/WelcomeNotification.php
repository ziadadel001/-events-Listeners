<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
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
            ->subject('مرحبًا بك في موقعنا!')
            ->greeting('مرحبًا ' . $notifiable->name . '!')
            ->line('شكرًا لانضمامك إلينا. نتمنى لك تجربة رائعة!')
            ->action('زيارة الموقع', url('/'))
            ->line('إذا كان لديك أي استفسار، لا تتردد في التواصل معنا.');
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'مرحبًا بك في موقعنا، ' . $notifiable->name . '!',
        ];
    }
}
