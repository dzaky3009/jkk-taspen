<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class ClaimRejectedNotification extends Notification
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
            'message' => 'Klaim Anda Atas Nama ' . $this->claim->nama . ' Ditolak Dengan Catatan ' . $this->claim->note,
            'claim_id' => $this->claim->id,
        ];
    }
}
