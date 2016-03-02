@extends('layouts.app')
 
@section('content')
	<h2>Create a Workout Template</h2>
	
	{!! Form::model(new App\Template, ['route' => ['templates.store']]) !!}
	    @include('templates/partials/_form_template_name', ['submit_text' => 'Create Workout Template'])
	{!! Form::close() !!}

	@if ( !$templates->count() )
		You have no workout templates.
	@else
		<h2>Workout Templates</h2>	
		<table class="table table-striped template-table">
			<thead>
				<th>Workout Template</th>
				<th>&nbsp;</th>
			</thead>
			<tbody>
				@foreach ($templates as $template)
					<tr>
						<td class="table-text"><a href="{{ route('templates.edit', $template) }}">{{ $template->name }}</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif
@endsection