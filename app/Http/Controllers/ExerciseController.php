<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ExerciseController extends Controller
{
	protected $rules = [
		'name' => ['required', 'min:3'],
	];

	/**
	 * Create a new exercise instance.
	 *
	 * @return  void
	 */
	public function __construct()
	{
		$this->middleware('auth');
		
	}
}
