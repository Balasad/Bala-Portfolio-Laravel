<?php

namespace App\Notifications;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewContactMessage extends Notification
{
    use Queueable;

    public function __construct(public ContactMessage $msg) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("📬 New message from {$this->msg->name}")
            ->greeting("You have a new portfolio inquiry!")
            ->line("**From:** {$this->msg->name} ({$this->msg->email})")
            ->line("**Subject:** " . ($this->msg->subject ?: 'No subject'))
            ->line("**Message:**")
            ->line($this->msg->message)
            ->action('View in Admin', url('/admin/contact-messages'))
            ->line('Reply directly to this email to respond.');
    }
}