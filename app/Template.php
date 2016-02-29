<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{

	/**
	 * Get all the exercises for the template
	 */
	public function exercises()
	{
		return $this->hasMany('App\Exercise');
	}

	/**
	 * Get all the events that use the template
	 */
	public function events()
	{
		return $this->hasMany('App\Event');
	}

	/**
	 * Get the user that owns the template
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
