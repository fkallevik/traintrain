<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * Get the user that owns the task
     */
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
