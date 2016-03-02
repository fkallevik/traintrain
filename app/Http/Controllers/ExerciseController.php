<?php

namespace App\Http\Controllers;

use App\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Template;

class ExerciseController extends Controller
{
	protected $rules = [
		'name' => ['required', 'min:3'],
		'sets' => ['required', 'min:1'],
		'reps' => ['required', 'min:1'],
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
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create($id)
	{
		$template = Template::findOrFail($id);
		
		return view('exercises.create', [
		    'template' => $template,
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, $id)
	{
		$this->validate($request, $this->rules);

		$input = Input::all();
		$input['template_id'] = $id;
		
		$exercise = Exercise::create( $input );

		return Redirect::route('templates.edit', $id)->with('Task created.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($exerciseID, $templateID)
	{
		$exercise = Exercise::findOrFail($exerciseID);
		// $this->authorize('destroy', $exercise);
		$exercise->delete();
		return Redirect::route('templates.edit', $templateID)->with('Exercise deleted.');

	}
}
