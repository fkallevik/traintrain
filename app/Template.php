<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name'];

	/**
	 * Get all the sessions that use the template
	 */
	public function sessions()
	{
		return $this->hasMany(Session::class);
	}

	/**
	 * Get the user that owns the template
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
