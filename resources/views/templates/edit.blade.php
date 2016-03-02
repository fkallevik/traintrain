@extends('layouts.app')

@section('content')
	<h2>Edit <i>{{ $template->name }}</i> Template</h2>

	<!-- Delete button -->
	<div class="form-group">
	{!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('templates.destroy', $template))) !!}
		{!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
	{!! Form::close() !!}
	</div>
	

	{!! Form::model($template, ['method' => 'PATCH', 'route' => ['templates.update', $template]]) !!}
	    @include('templates/partials/_form_new_name', ['submit_text' => 'Save Name'])
	{!! Form::close() !!}

	{!! link_to_route('templates.exercises.create', 'Add New Exercise', $template) !!}


	@if ( !$template->exercises->count() )
		You have no workout templates.
	@else
		<table class="table table-striped">
			<thead>
				<th>Exercises</th>
			</thead>
			<tbody>
				@foreach ($template->exercises as $exercise)
					<tr>
						<td class="table-text">
							{{ $exercise->name }}
							{!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('templates.exercises.destroy', $template, $exercise))) !!}
							        {!! link_to_route('templates.exercises.edit', 'Edit', array($template, $exercise), array('class' => 'btn btn-info')) !!}
							        {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
							{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif

@endsection