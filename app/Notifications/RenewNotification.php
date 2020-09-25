<?php

namespace App\Notifications;

use App\Profile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RenewNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $thresholdate;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($thesholddate)
    {
        $this->thresholdate=$thesholddate;
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
        ->subject('Anual renew report submition notification')
        ->markdown('mail.renew', [
            'shareholderName' => $notifiable->shareholder_name,
            'thresholddate' => $this->thresholdate,
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
