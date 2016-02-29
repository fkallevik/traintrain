<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
	/**
	 * Get the template that owns the exercise
	 */
	public function template()
	{
		return $this->belongsTo(Template::class);
	}
}
