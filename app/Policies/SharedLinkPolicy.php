<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\SharedLink;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SharedLinkPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SharedLink  $sharedLink
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Article $article)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SharedLink  $sharedLink
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function destroy(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }
}
