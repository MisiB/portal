<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class bidrefundNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $company;
    private $amount;
    private $tendernumber;
    private $entity;
    private $bank;
    private $accountnumber;
    private $transferdate;

    public function __construct($company,$amount,$tendernumber,$entity,$bank,$accountnumber,$transferdate)
    {
         $this->company= $company;
         $this->amount = $amount;
         $this->tendernumber = $tendernumber;
         $this->entity = $entity;
         $this->bank = $bank;
         $this->accountnumber = $accountnumber;
         $this->transferdate = $transferdate;
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
                    ->greeting('Dear Sir/Madam')
                    ->line('The Procurement Regulatory Authority of Zimbabwe has successfully processed Your Bid Bond for the details below:')
                    ->line('Company: '.$this->company)
                    ->line('Tender Number: '.$this->tendernumber)
                    ->line('Entity: '.$this->entity)
                    ->line('Bank :'.$this->bank)
                    ->line('account number: '.$this->accountnumber)
                    ->line('Transfer Date: '.$this->transferdate)
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
