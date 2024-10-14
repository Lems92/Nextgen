<?php

namespace App\Models;

use App\Interface\Sluggable;
use App\Trait\HasSlug;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail, Sluggable
{
    use HasFactory, Notifiable, HasRoles, HasSlug;
    protected $fillable = [
        'email',
        'password',
        'userable_type',
        'userable_id',
        'is_accepted_by_admin',
        //subscription
        'subscription_id',
        'subscription_started_at',
        'subscription_expires_at',
        'slug',
    ];

    // Relation polymorphique
    public function userable(): MorphTo
    {
        return $this->morphTo();
    }

    protected $casts = [
        'userable_type' => 'string',
        'userable_id' => 'integer',
        //subscription
        'subscription_started_at' => 'datetime',
        'subscription_expires_at' => 'datetime',
    ];


    /**
     * L'abonnement de l'entreprise.
     */
    public function subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class);
    }

    /**
     * Vérifie si l'abonnement est actif.
     */
    public function hasActiveSubscription(): bool
    {
        return $this->subscription && $this->subscription_expires_at && now()->lessThanOrEqualTo($this->subscription_expires_at);
    }

    /**
     * Attribue un abonnement à l'utilisateur avec des dates de début et de fin.
     */
    public function assignSubscription(Subscription $subscription, int $durationInDays): void
    {
        $this->subscription()->associate($subscription);
        $this->subscription_started_at = now();
        $this->subscription_expires_at = now()->addDays($durationInDays);
        $this->save();

        // Synchroniser les permissions de l'abonnement
        $this->syncPermissions($subscription->permissions->pluck('name')->toArray());
    }

    /**
     * Renouvelle l'abonnement de l'utilisateur.
     */
    public function renewSubscription(int $additionalDays): void
    {
        if ($this->hasActiveSubscription()) {
            if ($this->subscription_expires_at) {
                $this->subscription_expires_at = $this->subscription_expires_at->addDays($additionalDays);
            } else {
                $this->subscription_expires_at = now()->addDays($additionalDays);
            }
        } else {
            $this->subscription_started_at = now();
            $this->subscription_expires_at = now()->addDays($additionalDays);
        }
        $this->save();
    }

    public function slugAttribute(): string
    {
        if (is_null($this->userable)) {
            return 'email';
        }
        return 'userable';
    }
}

