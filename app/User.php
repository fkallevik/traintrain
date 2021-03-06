<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * Get all of the events for the user
	 */
	public function sessions()
	{
		return $this->hasMany(Session::class);
	}

	/**
	 * Get all of the templates for the user
	 */
	public function templates()
	{
		return $this->hasMany(Template::class);
	}
}
