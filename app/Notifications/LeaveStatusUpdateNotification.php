<?php

namespace App\Notifications;

use App\Models\leave_grant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LeaveStatusUpdateNotification extends Notification
{
    use Queueable;

    public $leave;

    /**
     * Create a new notification instance.
     *
     * @param  leave_grant  $leave
     * @return void
     */
    public function __construct(leave_grant $leave)
    {
        $this->leave = $leave;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail message to be sent.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $status = $this->leave->status == 'approved' ? 'approved' : 'rejected';

        return (new MailMessage)
            ->subject('Leave Request Status Update')
            ->greeting('Hello ' . $this->leave->user->name)
            ->line('Your leave request (ID: ' . $this->leave->id . ') has been ' . ucfirst($status) . '.')
            ->line('Leave Type: ' . $this->leave->leave_type)
            ->line('Requested Days: ' . $this->leave->days_requested)
            ->line('Start Date: ' . $this->leave->start_date)
            ->line('End Date: ' . $this->leave->end_date)
            ->line('Status: ' . ucfirst($status))
            ->line('If you have any questions, please contact HR.')
            ->salutation('Best regards, Your Company HR');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array<string, mixed>
     */
    public function toArray($notifiable)
    {
        return [
            'leave_id' => $this->leave->id,
            'status' => $this->leave->status,
        ];
    }
}
