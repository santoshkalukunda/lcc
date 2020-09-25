<?php

namespace App\Notifications;

use App\Profile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AllDocumentReportNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $documentreport;
    public $days;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($documentreport,$remaining)
    {
        $this->documentreport = $documentreport;
        $this->days=$remaining;
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
        ->subject('Starting report submition notification')
        ->markdown('mail.document', [
            'shareholderName' => $notifiable->shareholder_name,
            'documentreport=' => $this->documentreport,
            'days' => $this->days,
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
