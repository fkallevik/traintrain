<?php

namespace App\Policies;

use App\User;
use App\Session;
use Illuminate\Auth\Access\HandlesAuthorization;

class SessionPolicy
{
	use HandlesAuthorization;

	/**
	 * Determine if the given user can delete the given session.
	 *
	 * @param  User $user
	 * @param  session $session
	 * @return bool
	 */
	public function destroy(User $user, Session $session)
	{

		return $user->id === $session->user_id;
	}

	/**
	 * Determine if the given user can view the session.
	 *
	 * @param  User $user
	 * @param  session $session
	 * @return bool
	 */
	public function show(User $user, Session $session)
	{

		return $user->id === $session->user_id;
	}
}
