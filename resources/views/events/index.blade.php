@extends('layouts.app')
 
@section('content')
	<h2>Create Workout Event</h2>

	@if ( !$templates->count() )
		You have no workout templates.
		
		<p>
			{!! link_to_route('templates.index', 'Create a Workout Template') !!}
		</p>

	@else
		{!! Form::model(new App\Event, ['route' => ['events.store']]) !!}
			@include('events/partials/_form', ['submit_text' => 'Start Workout'])
		{!! Form::close() !!}
	@endif

	<h2>Workout Events</h2>
 
	@if ( !$events->count() )
		You have no workout sessions.
	@else
		<table class="table table-striped">
			<thead>
				<th>Date and Time</th>
				<th>&nbsp;</th>
			</thead>
			<tbody>
				@foreach ($events as $event)
					<tr>
						<td><a href="{{ route('events.show', $event) }}">{{ $event->created_at }}</a></td>
						<td>{{ App\Template::where('id', '=', $event->template_id)->lists('name')->get(0) }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif
@endsection