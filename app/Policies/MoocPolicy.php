<?php

namespace App\Policies;

use App\User;
use App\Mooc;
use Illuminate\Auth\Access\HandlesAuthorization;

class MoocPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the mooc.
     *
     * @param  \App\User  $user
     * @param  \App\Mooc  $mooc
     * @return mixed
     */
    public function view(User $user, Mooc $mooc)
    {
        //
    }

    /**
     * Determine whether the user can create moocs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the mooc.
     *
     * @param  \App\User  $user
     * @param  \App\Mooc  $mooc
     * @return mixed
     */
    public function update(User $user, Mooc $mooc)
    {
        return $user->id == $mooc->user_id;
    }

    /**
     * Determine whether the user can delete the mooc.
     *
     * @param  \App\User  $user
     * @param  \App\Mooc  $mooc
     * @return mixed
     */
    public function delete(User $user, Mooc $mooc)
    {
        return $user->id == $mooc->user_id;
    }

    /**
     * Determine whether the user can restore the mooc.
     *
     * @param  \App\User  $user
     * @param  \App\Mooc  $mooc
     * @return mixed
     */
    public function restore(User $user, Mooc $mooc)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the mooc.
     *
     * @param  \App\User  $user
     * @param  \App\Mooc  $mooc
     * @return mixed
     */
    public function forceDelete(User $user, Mooc $mooc)
    {
        //
    }
}
