@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					New event
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

					<!-- New event Form -->
					<form action="/event" method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<!-- event Name -->
						<div class="form-group">
							<label for="event-name" class="col-sm-3 control-label">event</label>

							<div class="col-sm-6">
								<input type="text" name="name" id="event-name" class="form-control" value="{{ old('event') }}">
							</div>
						</div>

						<!-- Add event Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-btn fa-plus"></i>Add event
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
						Current events
					</div>

					<div class="panel-body">
						<table class="table table-striped event-table">
							<thead>
								<th>event</th>
								<th>&nbsp;</th>
							</thead>
							<tbody>
								@foreach ($events as $event)
									<tr>
										<td class="table-text"><div>{{ $event->name }}</div></td>

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