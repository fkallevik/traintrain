<?php

namespace App\Repositories;

use App\User;
use App\Session;

class SessionRepository
{
	/**
	 * Get all of the sessions for a given user.
	 *
	 * @param  User $user
	 * @return Collection
	 */
	public function forUser(User $user)
	{
		return Session::where('user_id', $user->id)
					->orderBy('created_at', 'asc')
					->get();
	}
}