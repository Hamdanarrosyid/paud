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
        //
    }

    /**
     * Determine whether the user can view the siswa.
     *
     * @param  \App\User  $user
     * @param  \App\Siswa  $siswa
     * @return mixed
     */
    public function view(User $user, Siswa $siswa)
    {
        //
    }

    /**
     * Determine whether the user can create siswas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the siswa.
     *
     * @param  \App\User  $user
     * @param  \App\Siswa  $siswa
     * @return mixed
     */
    public function update(User $user, Siswa $siswa)
    {
        //
    }

    /**
     * Determine whether the user can delete the siswa.
     *
     * @param  \App\User  $user
     * @param  \App\Siswa  $siswa
     * @return mixed
     */
    public function delete(User $user, Siswa $siswa)
    {
        //
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
}
