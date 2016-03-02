<?php

namespace App\Http\Controllers;

use App\Session;
use App\Template;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SessionRepository;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\TemplateRepository;

class SessionController extends Controller
{
	/**
	 * The session repository instance.
	 *
	 * @var SessionRepository
	 */
	protected $sessions;

	/**
	 * The template repository instance.
	 *
	 * @var TemplateRepository
	 */
	protected $templates;

	/**
	 * Create a new controller instance.
	 *
	 * @return  void
	 */
	public function __construct(SessionRepository $sessions, TemplateRepository $templates)
	{
		$this->middleware('auth');

		$this->sessions = $sessions;
		$this->templates = $templates;
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @param  Request $request
	 * @return  Response
	 */
	public function index(Request $request)
	{
		$templates = Template::where('user_id', $request->user()->id)->get();
		$sessions = Session::where('user_id', $request->user()->id)->get();

		return view('sessions.index', [
			'sessions' => $this->sessions->forUser($request->user()),
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
	 * @param  Request $request
	 * @return  Response
	 */
	public function store(Request $request)
	{
		$request->user()->sessions()->create([
			'template_id' => $request->template_id,
		]);

		return Redirect::route('sessions.index')->with('message', 'Session created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Session $session
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$session = Session::findOrFail($id);
		
		$this->authorize('show', $session);

		return view('sessions.show', [
		    'session' => $session,
		]);
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
	 * @param  Session $session
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$session = Session::findOrFail($id);
		$this->authorize('destroy', $session);
		$session->delete();
		return Redirect::route('sessions.index')->with('message', 'Session deleted');
	}
}
