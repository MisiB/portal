<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class adminAccountNotification extends Notification
{
    use Queueable;
     private $username;
     private $password;
    public function __construct($username,$password)
    {
         $this->username = $username;
         $this->password = $password;
    }

   
    public function via($notifiable)
    {
        return ['mail'];
    }

  
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('A ')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
