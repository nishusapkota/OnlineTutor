<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewAssignmentNotification extends Notification
{
    use Queueable;
    public $assignment;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($assignment)
    {
        $this->assignment=$assignment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'assignment_id' => $this->assignment->id,
            'message' => 'New Assignment is uploaded on '.$this->assignment->course->course,
            'url' => route('student.assignment.show', [$this->assignment->id]),
        ];
    }
}
