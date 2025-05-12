<?php

namespace App\Mail;

use App\Models\Pendaftaran;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class PendaftaranStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public Pendaftaran $pendaftaran) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $user = Auth::user();

        return new Envelope(
            from: new Address($user->email, $user->nama),
            subject: 'Pendaftaran Status',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $schedules = Pendaftaran::with('jadwal')
            ->initial()
            ->where('id_siswa', $this->pendaftaran->id_siswa)
            ->first();

        return new Content(
            view: 'emails.pendaftaran-status',
            with: [
                'schedules' => $schedules
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
