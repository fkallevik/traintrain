<?php

namespace App\Http\Controllers;

use App\Template;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
	 * Display a list of all of the users templates.
	 *
	 * @param  Request $request
	 * @return  Response
	 */
	public function index(Request $request)
	{
		$templates = Template::where('user_id', $request->user()->id)->get();

		return view('templates.index', [
			'templates' => $this->templates->forUser($request->user()),
		]);
	}

	/**
	 * Create a new template.
	 *
	 * @param  Request $request
	 * @return  Response
	 */
	public function store(Request $request)
	{

		$this->validate($request, [
		    'name' => 'required|min:3',
		]);
		$request->user()->templates()->create([
		    'name' => $request->name,
		]);
		return redirect('/templates');
	}


	/**
	 * Destroy the given template.
	 *
	 * @param  Request  $request
	 * @param  Template  $template
	 * @return Response
	 */
	public function destroy(Request $request, Template $template)
	{
	    $this->authorize('destroy', $template);
	    $template->delete();
	    return redirect('/templates');
	}
}
