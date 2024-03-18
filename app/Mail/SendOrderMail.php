<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Mail\Attachable;
use Illuminate\Mail\Mailables\Attachment;

class SendOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('norepply@grupomeicol.co', 'MEICOL Sede: '. $this->data['sede']),
            subject: "NUEVO PEDIDO DE SEDE",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.sendOrderMail',
            with: [
                'nombre' => $this->data['nombre'],
                'apellido' => $this->data['apellido'],
                'sede' => $this->data['sede'],

            ]
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromPath(storage_path('app/'.$this->data['attachment'])),
        ];
    }

}
