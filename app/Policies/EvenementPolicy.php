<?php

namespace App\Policies;

use App\Models\Evenement;
use App\Models\User;

class EvenementPolicy
{
    /**
     * Vérifie si l'utilisateur peut modifier ou supprimer un événement.
     */
    public function update(User $user, Evenement $evenement): bool
    {
        return $user->id === $evenement->organisateur_id;
    }

    public function delete(User $user, Evenement $evenement): bool
    {
        return $user->id === $evenement->organisateur_id;
    }
}
