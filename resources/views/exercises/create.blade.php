@extends('layouts.app')
 
@section('content')
	<h2>Create Exercise</h2>

	{!! Form::model(new App\Exercise, ['route' => ['templates.exercises.store', $template]]) !!}
		@include('exercises/partials/_form_exercises', ['submit_text' => 'Create'])
	{!! Form::close() !!}

@endsection