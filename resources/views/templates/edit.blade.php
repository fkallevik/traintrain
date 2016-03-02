@extends('layouts.app')

@section('content')
	<h2>Edit Workout Template</h2>

	<div class="form-group">
	{!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('templates.destroy', $template))) !!}
		{!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
	{!! Form::close() !!}
	</div>
	
	<p>
		{{ $template }}
	</p>
	
	{!! Form::model($template, array('route' => array('templates.update', $template))) !!}
		@include('templates/partials/_form_template_edit', ['submit_text' => 'Add New Exercise'])
	{!! Form::close() !!}
@endsection