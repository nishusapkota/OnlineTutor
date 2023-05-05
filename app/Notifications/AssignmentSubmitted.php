<?php

namespace App\Notifications;

use App\Models\StudentAssignment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AssignmentSubmitted extends Notification
{
    use Queueable;
public $studentAssignment;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($studentAssignment)
    {
        $this->studentAssignment=$studentAssignment;
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
            'stdassignment_id' => $this->studentAssignment->id,
            'message' => 'Assignment is submited by '.$this->studentAssignment->user->name,
            'url' => route('tutor.submitassignment.show', [$this->studentAssignment->id]),
        ];
    }
}
