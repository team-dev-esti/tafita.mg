<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Mooc;
use App\Chapter;

class ChapterPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the chapter.
     *
     * @param  \App\User  $user
     * @param  \App\Chapter  $chapter
     * @return mixed
     */
    public function view(User $user, Chapter $chapter)
    {
        //
    }

    /**
     * Determine whether the user can create chapters.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user,Chapter $chapter,Mooc $mooc)
    {
        return $user->id == $mooc->user_id;
    }

    /**
     * Determine whether the user can update the chapter.
     *
     * @param  \App\User  $user
     * @param  \App\Chapter  $chapter
     * @return mixed
     */
    public function update(User $user, Chapter $chapter)
    {
        //
    }

    /**
     * Determine whether the user can delete the chapter.
     *
     * @param  \App\User  $user
     * @param  \App\Chapter  $chapter
     * @return mixed
     */
    public function delete(User $user, Chapter $chapter)
    {
        //
    }

    /**
     * Determine whether the user can restore the chapter.
     *
     * @param  \App\User  $user
     * @param  \App\Chapter  $chapter
     * @return mixed
     */
    public function restore(User $user, Chapter $chapter)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the chapter.
     *
     * @param  \App\User  $user
     * @param  \App\Chapter  $chapter
     * @return mixed
     */
    public function forceDelete(User $user, Chapter $chapter)
    {
        //
    }
}
