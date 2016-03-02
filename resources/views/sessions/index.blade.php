@extends('layouts.app')
 
@section('content')
	<h2>Create Workout Session</h2>

	@if ( !$templates->count() )
		You have no workout templates.
		
		<p>
			{!! link_to_route('templates.index', 'Create a Workout Template') !!}
		</p>

	@else
		{!! Form::model(new App\Session, ['route' => ['sessions.store']]) !!}
			@include('sessions/partials/_form', ['submit_text' => 'Start Workout'])
		{!! Form::close() !!}
	@endif

	<h2>Workout Sessions</h2>
 
	@if ( !$sessions->count() )
		You have no workout sessions.
	@else
		<table class="table table-striped">
			<thead>
				<th>Date and Time</th>
				<th>&nbsp;</th>
			</thead>
			<tbody>
				@foreach ($sessions as $session)
					<tr>
						<td><a href="{{ route('sessions.show', $session) }}">{{ $session->created_at }}</a></td>
						<td>{{ App\Template::where('id', '=', $session->template_id)->lists('name')->get(0) }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif
@endsection