<?php

namespace App\Utils;

class Redirection
{
    public static function redirect_if_authenticated($user): string
    {
        $route = 'accueil';

        if ($user->hasRole('etudiant')) {
            $route = 'etudiants.dashboard';
        } elseif ($user->hasRole('entreprise')) {
            $route = 'entreprise.dashboard';
        } elseif ($user->hasRole('service-carriere')) {
            $route = 'universite.dashboard';
        } elseif ($user->hasRole('admin')) {
            $route = 'admin.dashboard';
        }
        return $route;
    }
}
