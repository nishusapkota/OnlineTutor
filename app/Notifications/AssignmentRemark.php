<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AssignmentRemark extends Notification
{
    use Queueable;
    public $remark;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($remark)
    {
        $this->remark=$remark;
       
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
        'remark' => $this->remark->id,
        'message' => 'Your assignment has new remarks from tutor ',
        'url' => route('student.remark.show',[$this->remark]),
        ];
    }
}
