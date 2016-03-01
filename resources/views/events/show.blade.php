@extends('layouts.app')
 
@section('content')
	{!! link_to_route('events.index', 'Back to Workout Sessions') !!}
	<h2>Workout Session</h2>

	<p>{{ $event->created_at }}</p>
	<p>{{ App\Template::where('id', '=', $event->template_id)->lists('name')->get(0) }}</p>
	<p>ID: {{ $event->id }}</p>
	<p>USER_ID: {{ $event->user_id }}</p>


	{!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('events.destroy', $event))) !!}
	    <a href="{{ route('events.show', $event) }}">{{ $event->name }}</a>
	    (
	        {!! link_to_route('events.edit', 'Edit', array($event), array('class' => 'btn btn-info')) !!},
	        {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
	    )
	{!! Form::close() !!}
 
@endsection