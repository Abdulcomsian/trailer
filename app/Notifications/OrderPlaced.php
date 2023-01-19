<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderPlaced extends Notification
{
    use Queueable;

    public $code;
    public $type;
    public $user;
    public $userFistOrder;
    public $orderconfirm;
    public function __construct($code,$type,$user=null,$userFistOrder,$orderconfirm=null)
    {
        $this->code=$code;
        $this->type=$type;
        $this->user=$user;
        $this->userFistOrder=$userFistOrder;
        $this->orderconfirm=$orderconfirm;
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
            ->greeting('Order Confirmed')
            ->subject('Order Confirmed')
            ->view('mail.orderPlacement',['code'=>$this->code,'type'=>$this->type,'user'=>$this->user,'userFistOrder'=>$this->userFistOrder,'orderconfirm'=>$this->orderconfirm]);
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
