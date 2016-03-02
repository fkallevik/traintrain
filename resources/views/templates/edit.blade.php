@extends('layouts.app')

@section('content')
	<h2>Edit Workout Template</h2>

	<!-- Delete button -->
	<div class="form-group">
	{!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('templates.destroy', $template))) !!}
		{!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
	{!! Form::close() !!}
	</div>
	
	<p>
		{{ $template }}
	</p>
	
	{!! Form::model($template, ['method' => 'PATCH', 'route' => ['templates.update', $template]]) !!}
	    @include('templates/partials/_form_new_name', ['submit_text' => 'Save Name'])
	{!! Form::close() !!}



	{!! link_to_route('templates.exercises.create', 'Add New Exercise', $template) !!}

@endsection