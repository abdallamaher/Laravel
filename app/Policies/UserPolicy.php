<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function get(User $user, User $requested_user): bool
    {
        return $user->id == $requested_user->id;
    }

    public function index(User $user): bool
    {
        return $user->id > 0;
    }
}
