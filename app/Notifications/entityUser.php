<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class entityUser extends Notification
{
    use Queueable;

    private $name;
    private $password;
    private $entityname;
    private $email;

    public function __construct($name,$password,$entityname,$email)
    {
         $this->name = $name;
         $this->password =$password;
         $this->entityname = $entityname;
         $this->email = $email;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Dear '.$this->name)
                    ->line('A Procurement Account has been created for you on our PRAZ portal on behalf of '.$this->entityname)
                    ->line('You can access your account by using the following details')
                    ->line('email :'.$this->email)
                    ->line('password :'.$this->password)
                    ->action('Goto Portal', url('/'))
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
