<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CandidatApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $etudiant;
    public $entrepriseNom;

    public function __construct($etudiant, $entrepriseNom)
    {
        $this->etudiant = $etudiant;
        $this->entrepriseNom = $entrepriseNom;
    }

    public function build()
    {
        return $this->view('mails.approver')
            ->with([
                'prenom' => $this->etudiant->prenom,
                'entreprise_nom' => $this->entrepriseNom,
            ]);
    }
}
