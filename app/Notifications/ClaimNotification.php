<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Models\Claim;

class ClaimNotification extends Notification
{
    use Queueable;

    protected $claim;

    public function __construct(Claim $claim)
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
            'message' => 'Klaim Baru Telah Ditambahkan Oleh '.$this->claim->instansi . ' Atas Nama ' . $this->claim->nama, 
            'claim_id' => $this->claim->id,
            'nip' => $this->claim->nip,
            'nama' => $this->claim->nama,
        ];
    }
}
