<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CandidatApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $etudiant;

    public function __construct($etudiant)
    {
        $this->data = [
            'prenom' => $etudiant->prenom,
            'nom' => $etudiant->nom,
        ];
    }

    public function build()
    {
        return $this->subject('Votre candidature a été approuvée')
                    ->view('mails.approver')
                    ->with(['data' => $this->data]);
    }
}
