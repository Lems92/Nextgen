<?php

namespace App\Console\Commands;

use App\Mail\CompleteProfileReminderMail;
use App\Models\Etudiant;
use App\Models\Entreprise;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendProfileReminderEmails extends Command
{
    protected $signature = 'reminder:send-profile-emails';
    protected $description = 'Envoie des emails de rappel aux utilisateurs qui n\'ont pas complété leur profil après 10 minutes';

    public function handle()
    {
        // Récupérer les étudiants qui se sont inscrits il y a 10 minutes
        $etudiants = Etudiant::whereHas('user', function ($query) {
            $query->where('created_at', '<=', now()->subMinutes(10))
                  ->where('created_at', '>', now()->subMinutes(11));
        })->get();

        // Récupérer les entreprises qui se sont inscrites il y a 10 minutes
        $entreprises = Entreprise::whereHas('user', function ($query) {
            $query->where('created_at', '<=', now()->subMinutes(10))
                  ->where('created_at', '>', now()->subMinutes(11));
        })->get();

        // Envoyer les emails aux étudiants dont le profil est incomplet
        foreach ($etudiants as $etudiant) {
            if ($this->isProfileIncomplete($etudiant, 'etudiant')) {
                $this->sendReminderEmail($etudiant->user, 'etudiant');
            }
        }

        // Envoyer les emails aux entreprises dont le profil est incomplet
        foreach ($entreprises as $entreprise) {
            if ($this->isProfileIncomplete($entreprise, 'entreprise')) {
                $this->sendReminderEmail($entreprise->user, 'entreprise');
            }
        }

        $this->info('Emails de rappel envoyés avec succès !');
    }

    private function sendReminderEmail($user, $userType)
    {
        $data = [
            'name' => $user->userable->nom ?? $user->userable->prenom ?? 'Utilisateur',
        ];

        Mail::to($user->email)->send(new CompleteProfileReminderMail($data, $userType));
    }

    private function isProfileIncomplete($user, $type)
    {
        if ($type === 'etudiant') {
            return empty($user->profile_picture) ||
                   empty($user->cv) ||
                   empty($user->competences) ||
                   empty($user->experiences_professionnelles) ||
                   empty($user->formations) ||
                   empty($user->disponibilites);
        } else {
            return empty($user->logo) ||
                   empty($user->description) ||
                   empty($user->secteurs_activite) ||
                   empty($user->opportunites) ||
                   empty($user->informations_contact);
        }
    }
} 