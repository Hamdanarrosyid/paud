<?php

namespace App\Policies;

use App\User;
use App\Walimurid;
use Illuminate\Auth\Access\HandlesAuthorization;

class WalimuridPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any walimurids.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the walimurid.
     *
     * @param  \App\User  $user
     * @param  \App\Walimurid  $walimurid
     * @return mixed
     */
    public function view(User $user, Walimurid $walimurid)
    {
        //
    }

    /**
     * Determine whether the user can create walimurids.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the walimurid.
     *
     * @param  \App\User  $user
     * @param  \App\Walimurid  $walimurid
     * @return mixed
     */
    public function update(User $user, Walimurid $walimurid)
    {
        //
    }

    /**
     * Determine whether the user can delete the walimurid.
     *
     * @param  \App\User  $user
     * @param  \App\Walimurid  $walimurid
     * @return mixed
     */
    public function delete(User $user, Walimurid $walimurid)
    {
        //
    }

    /**
     * Determine whether the user can restore the walimurid.
     *
     * @param  \App\User  $user
     * @param  \App\Walimurid  $walimurid
     * @return mixed
     */
    public function restore(User $user, Walimurid $walimurid)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the walimurid.
     *
     * @param  \App\User  $user
     * @param  \App\Walimurid  $walimurid
     * @return mixed
     */
    public function forceDelete(User $user, Walimurid $walimurid)
    {
        //
    }
}
