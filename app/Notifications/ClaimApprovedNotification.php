<?php
// app/Notifications/ClaimApprovedNotification.php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ClaimApprovedNotification extends Notification
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
            'message' => 'Klaim Anda Atas Nama ' . $this->claim->nama . ' Telah Disetujui',
            'claim_id' => $this->claim->id,
        ];
    }
}


