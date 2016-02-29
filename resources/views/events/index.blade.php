@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Workout Event
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

					<!-- New event Form -->
					<form action="/event" method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<!-- Add Event Button -->
						<div class="form-group">
							<div class="col-xs-6">
								  <label for="select-template">Select Workout Template:</label>
								  <select class="form-control" id="select-template">
								    <option>Template 1</option>
								    <option>Template 2</option>
								  </select>
							</div>
							<div class="col-xs-offset-2 col-xs-4">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-btn fa-plus"></i>Add Workout Event
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<!-- Current Events -->
			@if (count($events) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						Previous Workout Events
					</div>

					<div class="panel-body">
						<table class="table table-striped event-table">
							<thead>
								<th>Workout</th>
								<th>&nbsp;</th>
							</thead>
							<tbody>
								@foreach ($events as $event)
									<tr>
										<td class="table-text"><div>{{ $event->created_at }}</div></td>

										<!-- event Delete Button -->
										<td>
											<form action="/event/{{ $event->id }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" id="delete-event-{{ $event->id }}" class="btn btn-danger">
													<i class="fa fa-btn fa-trash"></i>Delete
												</button>
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection