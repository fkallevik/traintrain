<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
	protected $guarded = [];

	/**
	 * Get all the sessions that use the template
	 */
	public function sessions()
	{
		return $this->hasMany(Session::class);
	}

	/**
	 * Get all the exercises that the template has
	 */
	public function exercises()
	{
		return $this->hasMany(Exercise::class);
	}

	/**
	 * Get the user that owns the template
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
