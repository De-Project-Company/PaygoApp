<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    protected $url;

    /**
     * Create a new notification instance.
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Password Reset Request for Your Account')
                    ->line('Hello ' . $notifiable->business_name)
                    ->line('We received a request to reset the password for your account associated with this email address. If you made this request, please click the link below to reset your password:')
                    ->action('Reset Password', $this->url)
                    ->line('If you did not request a password reset, please ignore this email or contact our support team if you have any concerns.
                    For your security, this link will expire in 60 minutes.')
                    ->line('Important Notes: If you can\'t click the link, copy and paste the following URL into your browser: '. $this->url.
                    'For security reasons, never share your password with anyone.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
