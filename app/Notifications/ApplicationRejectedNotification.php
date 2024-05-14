<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationRejectedNotification extends Notification
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
                    ->subject('Cuti yang diajukan oleh '.$this->application->applier->name.' ditolak')
                    ->line('Cuti yang diajukan oleh '.$this->application->applier->name.' selama '.$this->application->duration.' hari dimulai dari '.$this->application->start_date.' ditolak oleh Manajemen.')
                    ->line('Kami mohon maaf atas hal tersebut.');
    }

    public function toArray($notifiable)
    {
        return [
            'data'=>'Cuti yang diajukan oleh '.$this->application->applier->name.' selama '.$this->application->duration.' hari dimulai dari '.$this->application->start_date.' ditolak oleh Manajemen.',
        ];
    }
}
