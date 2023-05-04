<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NoteUploaded extends Notification
{
    use Queueable;
public$course_name ,$note_id;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($course_name,$note_id)
    {
        $this->course_name = $course_name;
        $this->note_id = $note_id;
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
        'note_id' => $this->note_id,
        'message' => 'New Note is uploaded on '.$this->course_name,
        'url' => route('student.note.show', [$this->note_id]),
    ];
}

}
