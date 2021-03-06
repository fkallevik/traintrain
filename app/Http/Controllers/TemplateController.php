<?php

namespace App\Http\Controllers;

use App\Template;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Repositories\TemplateRepository;

class TemplateController extends Controller
{
	protected $rules = [
		'name' => ['required', 'min:3'],
	];

	/**
	 * The template repository instance.
	 *
	 * @var TemplateRepository
	 */
	protected $templates;

	/**
	 * Create a new template instance.
	 *
	 * @return  void
	 */
	public function __construct(TemplateRepository $templates)
	{
		$this->middleware('auth');

		$this->templates = $templates;

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param  Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		return view('templates.index', [
			'templates' => $this->templates->forUser($request->user()),
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create($templateID)
	{
		//

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{

		$this->validate($request, $this->rules);

		$newTemplate = $request->user()->templates()->create([
			'name' => $request->name,
		]);

		$this->authorize('edit', $newTemplate);

		return Redirect::route('templates.edit', $newTemplate)->with('message', 'Template created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$template = Template::findOrFail($id);

		$this->authorize('edit', $template);

		return Redirect::route('templates.edit', $template);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$template = Template::findOrFail($id);

		$this->authorize('edit', $template);

		return view('templates.edit', [
			'template' => $template,
		]);
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
		$template = Template::findOrFail($id);
		$input = array_except(Input::all(), '_method');
		$template->update($input);

		return Redirect::route('templates.edit', $template)->with('message', 'Template updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Request  $request
	 * @param  Template  $template
	 * @return Response
	 */
	public function destroy($id)
	{
		$template = Template::findOrFail($id);
		$this->authorize('destroy', $template);
		$template->delete();
		return Redirect::route('templates.index')->with('message', 'Template deleted');
	}
}
