<?php
namespace App\Notifications;

use App\Models\Pelaporan;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewPelaporanNotification extends Notification
{
    use Queueable;

    protected $pelaporan;
    protected $isAdmin;

    public function __construct(Pelaporan $pelaporan, $isAdmin)
    {
        $this->pelaporan = $pelaporan;
        $this->isAdmin = $isAdmin;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        $message = $this->isAdmin
            ? 'Admin sudah mengupload hasil verifikasi'
            : 'Pelaporan baru dari ' . $this->pelaporan->instansi . ' Atas Nama ' . $this->pelaporan->nama;

        return [
            'message' => $message,
            'pelaporan_id' => $this->pelaporan->id,
        ];
    }
}
