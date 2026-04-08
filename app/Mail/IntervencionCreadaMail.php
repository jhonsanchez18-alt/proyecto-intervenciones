<?php

namespace App\Mail; // Namespace del Mailable

use Illuminate\Bus\Queueable; // Permite usar colas si luego lo necesitas
use Illuminate\Contracts\Queue\ShouldQueue; // Interfaz para indicar que el correo se puede poner en cola
use Illuminate\Mail\Mailable; // Clase base del correo
use Illuminate\Mail\Mailables\Content; // Define el contenido del correo
use Illuminate\Mail\Mailables\Envelope; // Define asunto y encabezado
use Illuminate\Queue\SerializesModels; // Permite serializar modelos

class IntervencionCreadaMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $intervencion; // Variable disponible en la vista Blade

    /**
     * Constructor
     */
    public function __construct($intervencion)
    {
        // Guardamos la intervención para usarla en la vista
        $this->intervencion = $intervencion;
    }

    /**
     * Define el asunto del correo
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nueva intervención registrada', // Asunto del correo
        );
    }

    /**
     * Define el contenido del correo
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.intervencion_creada', // Vista Blade
        );
    }

    /**
     * Adjuntos (opcional)
     */
    public function attachments(): array
    {
        return []; // Sin adjuntos por ahora
    }
}