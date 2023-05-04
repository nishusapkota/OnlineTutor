<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostUploaded extends Notification
{
    use Queueable;
public $course_name,$post_id;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($course_name,$post_id)
    {
        $this->course_name = $course_name;
        $this->post_id = $post_id;
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
            'post_id' => $this->post_id,
            'message' => 'New Post is uploaded on '.$this->course_name,
            'url' => route('student.post.show', [$this->post_id]),
        ];
    }
}
