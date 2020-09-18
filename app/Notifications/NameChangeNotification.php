<?php

namespace App\Notifications;

use App\Namechange;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class NameChangeNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $namechange;
    public $currentdate;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($namechange)
    {
        $this->namechange = $namechange;
        $this->currentdate=$namechange->remaining;
        
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
            ->subject('Company Name Change Notification')
            ->markdown('mail.namechange', [
                'shareholderName' => $notifiable->shareholder_name,
                'nameChange' => $this->namechange,
                'curentdate'=>$this->currentdate,
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {

        return [];
    }
}
