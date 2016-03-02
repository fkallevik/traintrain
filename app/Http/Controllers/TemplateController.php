<?php

namespace App\Http\Controllers;

use App\Template;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\TemplateRepository;

class TemplateController extends Controller
{
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
		$templates = Template::where('user_id', $request->user()->id)->get();

		return view('templates.index', [
			'templates' => $this->templates->forUser($request->user()),
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		// Not in use
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{

		$this->validate($request, [
			'name' => 'required|min:3',
		]);

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
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Request  $request
	 * @param  Template  $template
	 * @return Response
	 */
	public function destroy(Request $request, Template $template)
	{
		$this->authorize('destroy', $template);
		$template->delete();
		return view('templates.index');
	}
}
