<?php

namespace App\Policies;

use App\Enums\UserLevel;
use App\Models\Group;
use App\Models\User;

class GroupPolicy
{
    /**
     * Create a new policy instance.
     */

    public function viewAny(User $user): bool
    {
        return true;
    }
    public function view(User $user, Group $group): bool
    {
        return true;
    }
    public function create(User $user): bool
    {
        return $user->level == UserLevel::Admin;
    }
    public function update(User $user, Group $group): bool
    {
        return $user->level == UserLevel::Admin || $user->level == UserLevel::Manager;
    }
    public function delete(User $user, Group $group): bool
    {
        return $user->level == UserLevel::Admin;
    }
    public function restore(User $user, Group $group): bool
    {
        return $user->level == UserLevel::Admin;
    }
    public function forceDelete(User $user, Group $group): bool
    {
        return $user->level == UserLevel::Admin;
    }
}
