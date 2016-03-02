@extends('layouts.app')

@section('content')
	<h2>Edit Workout Template</h2>
	{{ $template }}
	
	{!! Form::model($template, array('route' => array('templates.update', $template))) !!}
		@include('templates/partials/_form_template_edit', ['submit_text' => 'Add New Exercise'])
	{!! Form::close() !!}
@endsection