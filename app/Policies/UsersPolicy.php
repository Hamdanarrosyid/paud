<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsersPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any users.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $this->getpermission($user,13);
    }

    /**
     * Determine whether the user can view the users.
     *
     * @param  \App\User  $user
     * @param  \App\Users  $users
     * @return mixed
     */
    public function view(User $user)
    {
        return $this->getpermission($user,13);
    }

    /**
     * Determine whether the user can create users.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->getpermission($user,14);
    }

    /**
     * Determine whether the user can update the users.
     *
     * @param  \App\User  $user
     * @param  \App\Users  $users
     * @return mixed
     */
    public function update(User $user)
    {
        return $this->getpermission($user,15);
    }

    /**
     * Determine whether the user can delete the users.
     *
     * @param  \App\User  $user
     * @param  \App\Users  $users
     * @return mixed
     */
    public function delete(User $user)
    {
        return $this->getpermission($user,16);
    }

    /**
     * Determine whether the user can restore the users.
     *
     * @param  \App\User  $user
     * @param  \App\Users  $users
     * @return mixed
     */
    public function restore(User $user, Users $users)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the users.
     *
     * @param  \App\User  $user
     * @param  \App\Users  $users
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
