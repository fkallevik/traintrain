<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
	protected $guarded = [];

	/**
	 * Get the template that owns the exercise
	 */
	public function template()
	{
		return $this->belongsTo('App\Template');
	}
}
