@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $template->name }}
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

					<!-- New exercise Form -->
					<form action="/exercise" method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<!-- exercise Name -->
						<div class="form-group">
							<div class="row">
								<label for="exercise-name" class="col-sm-3 control-label">Exercise Name</label>
								<div class="col-sm-6">
									<input type="text" name="name" id="exercise-name" class="form-control" value="{{ old('exercise') }}">
								</div>
							</div>

							<div class="row" style="margin-top: 20px;">
								<label for="exercise-sets" class="col-sm-3 control-label">Total sets</label>
								<div class="col-sm-2">
									<input type="text" name="total_sets" id="exercise-name" class="form-control" value="{{ old('exercise') }}">
								</div>
								<label for="exercise-reps" class="col-sm-2 control-label">Total reps</label>
								<div class="col-sm-2">
									<input type="text" name="total_reps" id="exercise-name" class="form-control" value="{{ old('exercise') }}">
								</div>
							</div>
						</div>

						<!-- Add exercise Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-btn fa-plus"></i>Add Exercise
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection