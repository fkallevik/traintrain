<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['template_id'];

	/**
	 * Get the user that owns the event
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	/**
	 * Get the template that "owns" the event
	 */
	public function template()
	{
		return $this->belongsTo(Template::class);
	}
}
