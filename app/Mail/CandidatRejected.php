<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CandidatRejected extends Mailable
{
    use Queueable, SerializesModels;

    public $etudiant;

    /**
     * Create a new message instance.
     */
    public function __construct($etudiant)
    {
        $this->etudiant = $etudiant;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Votre candidature a été rejetée',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.candidat-rejected',
            with: [
                'etudiant' => $this->etudiant,
                'data' => [
                    'prenom' => $this->etudiant->prenom,
                    'titre_poste' => $this->etudiant->offres->first()->titre_poste,
                    'nom_entreprise' => $this->etudiant->offres->first()->entreprise->nom,
                ],
            ],
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
