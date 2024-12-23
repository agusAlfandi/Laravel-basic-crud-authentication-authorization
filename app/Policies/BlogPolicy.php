<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BlogPolicy
{
  /**
   * Determine whether the user can view any models.
   */
  public function viewAny(User $user): Response
  {
    return $user->active == 1
      ? Response::allow()
      : Response::deny('You do not own this blog.');
  }

  /**
   * Determine whether the user can view the model.
   */
  public function view(User $user, Blog $blog): void
  {
    //
  }

  /**
   * Determine whether the user can create models.
   */
  public function create(User $user): void
  {
    //
  }

  /**
   * Determine whether the user can update the model.
   */
  public function update(User $user, Blog $blog): Response
  {
    return $user->id === $blog->author_id
      ? Response::allow()
      : Response::deny('You cannot update this blog.');
  }

  /**
   * Determine whether the user can delete the model.
   */
  public function delete(User $user, Blog $blog): Response
  {
    return $user->id === $blog->author_id
      ? Response::allow()
      : Response::deny('You cannot delete this blog.');
  }

  /**
   * Determine whether the user can restore the model.
   */
  public function restore(User $user, Blog $blog): void
  {
    //
  }

  /**
   * Determine whether the user can permanently delete the model.
   */
  public function forceDelete(User $user, Blog $blog): void
  {
    //
  }
}
