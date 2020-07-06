<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SarprasPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    /**
     * Determine whether the user can view any gurus.
     *
     * @param \App\User $user
     * @return mixed
     */


    public function viewAny(User $user)
    {
        return $this->getpermission($user,17);
    }

    /**
     * Determine whether the user can view the guru.
     *
     * @param \App\User $user
     * @param \App\Guru $guru
     * @return mixed
     */
    public function view(User $user)
    {
        return $this->getpermission($user,17);
    }

    /**
     * Determine whether the user can create gurus.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->getpermission($user,18);
    }

    /**
     * Determine whether the user can update the guru.
     *
     * @param \App\User $user
     * @param \App\Guru $guru
     * @return mixed
     */
    public function update(User $user)
    {
        return $this->getpermission($user,19);
    }

    /**
     * Determine whether the user can delete the guru.
     *
     * @param \App\User $user
     * @param \App\Guru $guru
     * @return mixed
     */
    public function delete(User $user)
    {
        return $this->getpermission($user,20);
    }

    /**
     * Determine whether the user can restore the guru.
     *
     * @param \App\User $user
     * @param \App\Guru $guru
     * @return mixed
     */
    public function getpermission($data,$permission_id)
    {
        foreach ($data->role as $roles){
            foreach ($roles->permissions as $permission){
                if ($permission->id === $permission_id){
                    return true;
                }
            }
        }
    }
}
