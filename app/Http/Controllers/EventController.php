<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\EventRepository;

class EventController extends Controller
{
	/**
	 * The event repository instance.
	 *
	 * @var EventRepository
	 */
	protected $events;

	/**
	 * Create a new controller instance.
	 *
	 * @return  void
	 */
	public function __construct(EventRepository $events)
	{
		$this->middleware('auth');

		$this->events = $events;
	}

	/**
	 * Display a list of all of the users events.
	 *
	 * @param  Request $request
	 * @return  Response
	 */
	public function index(Request $request)
	{
		$events = Event::where('user_id', $request->user()->id)->get();

		return view('events.index', [
			'events' => $this->events->forUser($request->user()),
		]);
	}

	/**
	 * Create a new event.
	 *
	 * @param  Request $request
	 * @return  Response
	 */
	public function store(Request $request)
	{

		$request->user()->events()->create([]);

		return redirect('/events');
	}


	/**
	 * Destroy the given event.
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
