<?php

namespace App\Policies;

use App\Siswa;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SiswaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any siswas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $this->getpermission($user,5);
    }

    /**
     * Determine whether the user can view the siswa.
     *
     * @param  \App\User  $user
     * @param  \App\Siswa  $siswa
     * @return mixed
     */
    public function view(User $user)
    {
        return $this->getpermission($user,5);
    }

    /**
     * Determine whether the user can create siswas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->getpermission($user,6);
    }

    /**
     * Determine whether the user can update the siswa.
     *
     * @param  \App\User  $user
     * @param  \App\Siswa  $siswa
     * @return mixed
     */
    public function update(User $user)
    {
        return $this->getpermission($user,7);
    }

    /**
     * Determine whether the user can delete the siswa.
     *
     * @param  \App\User  $user
     * @param  \App\Siswa  $siswa
     * @return mixed
     */
    public function delete(User $user)
    {
        return $this->getpermission($user,8);
    }

    /**
     * Determine whether the user can restore the siswa.
     *
     * @param  \App\User  $user
     * @param  \App\Siswa  $siswa
     * @return mixed
     */
    public function restore(User $user, Siswa $siswa)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the siswa.
     *
     * @param  \App\User  $user
     * @param  \App\Siswa  $siswa
     * @return mixed
     */
    public function forceDelete(User $user, Siswa $siswa)
    {
        //
    }

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
