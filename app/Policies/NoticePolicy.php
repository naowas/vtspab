<?php

namespace App\Policies;

use App\Models\User;


class NoticePolicy
{
    /**
     * Create a new policy instance.
     */
    public function create(User $user): bool
    {
        if ($user->hasRole('super_admin')) {
            return true;
        }
        return false;
    }

    public function update(User $user): bool
    {
        if ($user->hasRole('super_admin')) {
            return true;
        }
        return false;
    }

    public function delete(User $user): bool
    {
        if ($user->hasRole('super_admin')) {
            return true;
        }
        return false;
    }
}
