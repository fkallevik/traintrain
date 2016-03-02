<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
	protected $guarded = [];

	/**
	 * Get the user that owns the session
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	/**
	 * Get the template that "owns" the session
	 */
	public function template()
	{
		return $this->belongsTo(Template::class);
	}
}
