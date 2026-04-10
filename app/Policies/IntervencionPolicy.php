<?php

namespace App\Policies;

use App\Models\Intervencion;
use App\Models\User;
use Illuminate\Auth\Access\Response;
//usamos carbon para comparar fechas
use Carbon\Carbon;

class IntervencionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Intervencion $intervencion): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Intervencion $intervencion)
{
    // ✔ Admin puede todo
    if ($user->hasRole('admin')) {
        return true;
    }

    // ✔ Solo el técnico que creó
    if ($user->id !== $intervencion->user_id) {
        return false;
    }

    // ✔ Solo durante los primeros 30 minutos
    return Carbon::parse($intervencion->created_at)
        ->addMinutes(30)
        ->isFuture();
}

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Intervencion $intervencion): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Intervencion $intervencion): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Intervencion $intervencion): bool
    {
        return false;
    }
}
