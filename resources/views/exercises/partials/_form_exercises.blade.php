<div class="form-group">
	{!! Form::label('name', 'Name:') !!}
	{!! Form::text('name') !!}
</div>
<div class="form-group">
	{!! Form::label('sets', 'Sets:') !!}
	{!! Form::text('sets') !!}
</div>
<div class="form-group">
	{!! Form::label('reps', 'Reps:') !!}
	{!! Form::text('reps') !!}
</div>
<div class="form-group">
	{!! Form::submit($submit_text, ['class'=>'btn btn-success']) !!}
</div>