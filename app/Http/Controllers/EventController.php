<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class EventController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return  void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a list of all of the users events.
	 *
	 * @param  Request $request
	 * @return  Response
	 */
	public function index(Request $request)
	{
		return view('events.index');
	}
}
