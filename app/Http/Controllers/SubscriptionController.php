<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubscriptionController extends Controller
{
    /**
     * Affiche la liste des utilisateurs avec leurs abonnements.
     */
    public function index(): View
    {
        $users = User::with(['subscription', 'userable'])
            ->where('userable_type', '=', Entreprise::class)
            ->get();
        return view('admin.subscriptions.index', compact('users'));
    }

    public function assignSubscriptionGet(Request $request, User $user): View
    {
        $subscriptions = Subscription::all();
        return view('admin.subscriptions.assign', compact('user', 'subscriptions'));
    }

    /**
     * Assigne ou met à jour l'abonnement d'un utilisateur.
     */
    public function assignSubscription(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'subscription_id' => 'required|exists:subscriptions,id',
            'duration' => 'required|integer|min:1', // Durée en jours
        ]);

        $subscription = Subscription::findOrFail($request->subscription_id);
        $duration = $request->input('duration');

        // Assigner l'abonnement
        $user->assignSubscription($subscription, $duration);

        return redirect()->intended(route('admin.subscriptions.index'))->with('success', 'Abonnement assigné avec succès.');
    }

    public function renewSubscriptionGet(Request $request, User $user): View
    {
        return view('admin.subscriptions.renew', compact('user'));
    }

    /**
     * Renouvelle l'abonnement d'un utilisateur.
     */
    public function renewSubscription(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'additional_days' => 'required|integer|min:1',
        ]);

        $additionalDays = $request->input('additional_days');

        $user->renewSubscription($additionalDays);

        return redirect()->intended(route('admin.subscriptions.index'))->with('success', 'Abonnement renouvelé avec succès.');
    }
}
