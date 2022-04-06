<?php

namespace App\Policies;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MoviePolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks.
     * @param \App\Models\User $user
     * @return void|bool
     */
    public function before(User $user) {
        if ($user->rights === 'ADMINISTRATOR') {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     * @param User|null $user
     * @return bool
     */
    public function viewAny(?User $user) {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     * @param User|null $user
     * @param \App\Models\Movie $movie
     * @return bool
     */
    public function view(?User $user, Movie $movie) {
        return true;
    }

    /**
     * Determine whether the user can create models.
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user) {
        //
    }

    /**
     * Determine whether the user can update the model.
     * @param \App\Models\User $user
     * @return bool
     */
    public function update(User $user) {
        return $user->rights === 'CONTRIBUTOR';
    }

    /**
     * Determine whether the user can delete the model.
     * @param \App\Models\User $user
     * @param \App\Models\Movie $movie
     * @return bool
     */
    public function delete(User $user, Movie $movie) {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     * @param \App\Models\User $user
     * @param \App\Models\Movie $movie
     * @return bool
     */
    public function restore(User $user, Movie $movie) {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     * @param \App\Models\User $user
     * @param \App\Models\Movie $movie
     * @return bool
     */
    public function forceDelete(User $user, Movie $movie) {
        return false;
    }
}
