@extends('layouts.app')
 
@section('content')
	{!! link_to_route('sessions.index', 'Back to Workout Sessions') !!}
	<h2>Workout Session</h2>

	<h4>{{ $session->created_at }}</h4>
	<h4>{{ App\Template::where('id', '=', $session->template_id)->lists('name')->get(0) }}</h4>
	<p>Session: {{ $session }}</p>

	{!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('sessions.destroy', $session))) !!}
		{!! link_to_route('sessions.edit', 'Edit', array($session), array('class' => 'btn btn-info')) !!}
		{!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
	{!! Form::close() !!}
@endsection