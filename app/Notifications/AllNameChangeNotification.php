<?php

namespace App\Notifications;

use App\Profile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AllNameChangeNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $namechange;
    public $currentdate;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($namechange,$remaining)
    {
        $this->namechange = $namechange;
        $this->currentdate=$remaining;
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
        $profile=Profile::first();
            return (new MailMessage)
            ->subject('Company Name Change Notification')
            ->markdown('mail.namechange', [
                'shareholderName' => $notifiable->shareholder_name,
                'nameChange' => $this->namechange,
                'curentdate'=>$this->currentdate,
                'profile'=>$profile,
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
        return [
            //
        ];
    }
}
