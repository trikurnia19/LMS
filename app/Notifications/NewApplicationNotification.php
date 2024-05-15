<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewApplicationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $application;

    public function __construct($application)
    {
        $this->application = $application;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Pengajuan Cuti baru diterima pada '.$this->application->created_at)
                    ->line('Salah satu karyawan mengajukan cuti.')
                    ->action('Take Action', 'localhost:8000/action')
                    ->line('Thank you for your co-operation!');
    }

    public function toArray($notifiable)
    {
        return [
            'data'=>'Pengajuan Cuti baru diterima pada '.$this->application->created_at,
        ];
    }
}
