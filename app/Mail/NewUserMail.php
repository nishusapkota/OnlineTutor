<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewUserMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $data,$address;
    public function __construct(array $data)
    {
        $this->data=$data;
        $this->address=$data['email'];
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope($name=null, $email = [])
    {
        $from = [
            'address' => 'nisa_csit2075@lict.edu.np',
            'name' => 'Admin',
        ];
        return (new Envelope())
        ->from($from['address'], $from['name'])
        ->to($this->address, $name)
        ->subject('New Tutor Account Created');
        
    }

    
    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.new-user',
        );
    }

    
    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
