<?php

namespace App\Http\Controllers;

use App\Event;
use App\Template;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\EventRepository;
use App\Repositories\TemplateRepository;

class EventController extends Controller
{
	/**
	 * The event repository instance.
	 *
	 * @var EventRepository
	 */
	protected $events;

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
	public function __construct(EventRepository $events, TemplateRepository $templates)
	{
		$this->middleware('auth');

		$this->events = $events;
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
		$events = Event::where('user_id', $request->user()->id)->get();

		return view('events.index', [
			'events' => $this->events->forUser($request->user()),
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
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request $request
	 * @return  Response
	 */
	public function store(Request $request)
	{
		$request->user()->events()->create([
			'template_id' => $request->template,
		]);

		return redirect('/events');
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
	 * @param  Request  $request
	 * @param  Event  $event
	 * @return Response
	 */
	public function destroy(Request $request, Event $event)
	{
		$this->authorize('destroy', $event);
		$event->delete();
		return redirect('/events');
	}
}
