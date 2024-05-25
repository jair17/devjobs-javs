<?php

namespace App\Notifications;

use App\Models\Vacant;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewApplicantNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(Vacant $vacant, $user_id)
    {
        $this->vacant = $vacant;
        $this->user_id = $user_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->line(__('You have received a new applicant on your vacant'))
            ->line(__('The vacant is: :title',['title' => $this->vacant->title]))
            ->action(__('View notifications'), url('/applicants/'.$this->vacant->id))
            ->line(__('Thank you for using DevJobs!'));
    }

    public function toDatabase($notifiable): array
    {
        return [
            'vacant_id' => $this->vacant->id,
            'vacant_title' => $this->vacant->title,
            'user_id' => $this->user_id
        ];
    }
}
