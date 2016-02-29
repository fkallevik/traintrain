<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TemplateController extends Controller
{
	/**
	 * Create a new template instance.
	 *
	 * @return  void
	 */
	public function __construct()
	{
		$this->middleware('auth');
		
	}
}
