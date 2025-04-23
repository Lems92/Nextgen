<?php

namespace App\Mail;

use App\Models\Etudiant;
use App\Models\Offre;
use App\Models\Entreprise;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CandidatRecruited extends Mailable
{
    use Queueable, SerializesModels;

    public $etudiant;
    public $offre;
    public $entreprise;

    public function __construct(Etudiant $etudiant, Offre $offre, Entreprise $entreprise)
    {
        $this->etudiant = $etudiant;
        $this->offre = $offre;
        $this->entreprise = $entreprise;
    }

    public function build()
    {
        return $this->subject('Félicitations, vous avez été recruté !')
            ->view('mails.candidat-recruited')
            ->with([
                'etudiant' => $this->etudiant,
                'offre' => $this->offre,
                'entreprise' => $this->entreprise,
            ]);
    }
}
