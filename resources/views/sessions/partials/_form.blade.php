<div class="form-group">
	{!! Form::label('name', 'Choose a Workout Template:') !!}
	{!! Form::select('template_id', $templates->lists('name', 'id')) !!}
</div>
<div class="form-group">
	{!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>