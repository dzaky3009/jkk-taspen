<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ClaimReupload extends Notification
{
    
    use Queueable;

    protected $claim;

    public function __construct($claim)
    {
        $this->claim = $claim;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'message' => $this->claim->instansi . ' Telah Memperbaiki Claimnya, '. 'Atas Nama  ' . $this->claim->nama,
            'claim_id' => $this->claim->id,
        ];
    }
}
