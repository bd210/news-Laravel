<?php

namespace App\Policies;

use App\Http\Controllers\Controller;
use App\Models\BadWord;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BadWordPolicy
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
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BadWord  $badWord
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, BadWord $badWord)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        $controller = new Controller();

        if(in_array('create-forbidden-word', $controller->getPermissions()))
            return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BadWord  $badWord
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, BadWord $badWord)
    {
        $controller = new Controller();

        if(in_array('update-forbidden-word', $controller->getPermissions()))
            return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BadWord  $badWord
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, BadWord $badWord)
    {
        $controller = new Controller();

        if(in_array('delete-forbidden-word', $controller->getPermissions()))
            return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BadWord  $badWord
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, BadWord $badWord)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BadWord  $badWord
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, BadWord $badWord)
    {
        //
    }
}
