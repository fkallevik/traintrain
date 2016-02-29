<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var  array [<description>]
     */
    protected $fillable = ['name'];

    /**
     * Get the user that owns the task
     */
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
