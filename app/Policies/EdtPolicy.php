<?php

namespace App\Policies;

use App\Enums\UserLevel;
use App\Models\User;
use App\Models\Edt;
class EdtPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return $user->level == UserLevel::User || $user->level == UserLevel::Admin || $user->level == UserLevel::Manager;
    }

    public function view(User $user, Edt $edt)
    {
        return $user->level == UserLevel::User || $user->level == UserLevel::Admin || $user->level == UserLevel::Manager;
    }

    public function create(User $user)
    {
        return $user->level == UserLevel::Admin || $user->level == UserLevel::Manager;
    }

    public function update(User $user, Edt $edt)
    {
        return $user->level == UserLevel::Admin || $user->level == UserLevel::Manager;
    }

    public function delete(User $user, Edt $edt)
    {
        return $user->level == UserLevel::Admin || $user->level == UserLevel::Manager;
    }
    public function restore(User $user, Edt $edt)
    {
        return $user->level == UserLevel::Admin || $user->level == UserLevel::Manager;
    }
    public function forceDelete(User $user, Edt $edt)
    {
        return $user->level == UserLevel::Admin || $user->level == UserLevel::Manager;
    }


}
