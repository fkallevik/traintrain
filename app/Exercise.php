<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name'];

	/**
	 * Get the user that owns the session
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	/**
	 * Get the template that owns the exercise
	 */
	public function template()
	{
		return $this->belongsTo(Template::class);
	}
}
