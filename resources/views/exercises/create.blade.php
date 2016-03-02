<!-- /resources/views/projects/create.blade.php -->
@extends('app')
 
@section('content')
	<h2>Create Exercise</h2>
 
	{!! Form::model(new App\Exercise, ['route' => ['exercises.store']]) !!}
		@include('exercises/partials/_form', ['submit_text' => 'Create Exercise'])
	{!! Form::close() !!}
@endsection