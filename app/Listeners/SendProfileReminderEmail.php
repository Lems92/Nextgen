<?php

namespace App\Listeners;

use App\Events\EmailVerified;
use App\Mail\CompleteProfileReminderMail;
use Illuminate\Support\Facades\Mail;

class SendProfileReminderEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(EmailVerified $event): void
    {
        $user = $event->user;
        
        // Log pour déboguer
        \Log::info('EmailVerified event triggered', [
            'user_id' => $user->id,
            'email' => $user->email
        ]);

        // Charger la relation userable
        $user->load('userable');
        
        // Vérifier si userable existe
        if (!$user->userable) {
            \Log::error('User userable relation is null', [
                'user_id' => $user->id
            ]);
            return;
        }

        // Log pour déboguer
        \Log::info('User userable loaded', [
            'userable_type' => get_class($user->userable),
            'userable_id' => $user->userable->id
        ]);
        
        // Déterminer le type d'utilisateur
        $userType = match (get_class($user->userable)) {
            'App\Models\Etudiant' => 'etudiant',
            'App\Models\Entreprise' => 'entreprise',
            default => 'etudiant', // Valeur par défaut
        };

        // Déterminer le nom en fonction du type
        $name = match ($userType) {
            'etudiant' => $user->userable->prenom ?? 'Utilisateur',
            'entreprise' => $user->userable->nom_entreprise ?? 'Utilisateur',
            default => 'Utilisateur'
        };

        $data = [
            'name' => $name,
        ];

        // Log pour déboguer
        \Log::info('Sending reminder email', [
            'user_type' => $userType,
            'name' => $name,
            'email' => $user->email
        ]);

        Mail::to($user->email)->send(new CompleteProfileReminderMail($data, $userType));
    }
} 