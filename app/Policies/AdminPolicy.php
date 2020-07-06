<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return bool
     */
    public function __construct(User $user)
    {
        //
    }
    public function admin(User $user)
    {
        foreach ($user->role as $data) {
            if ($data->id == 1) {
                return true;
            }
        }
    }
    public function guru(User $user)
    {
        foreach ($user->role as $data) {
            if ($data->id == 2) {
                return true;
            }
        }
    }
}
