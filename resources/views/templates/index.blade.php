@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Workout Template
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

					<!-- New template Form -->
					<form action="/template" method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<!-- template Name -->
						<div class="form-group">
							<label for="template-name" class="col-sm-3 control-label">Template Name</label>

							<div class="col-sm-6">
								<input type="text" name="name" id="template-name" class="form-control" value="{{ old('template') }}">
							</div>
						</div>

						<!-- Add template Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-btn fa-plus"></i>Add Workout Template
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<!-- Current templates -->
			@if (count($templates) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						My Workout Templates
					</div>

					<div class="panel-body">
						<table class="table table-striped template-table">
							<thead>
								<th>Workout Template</th>
								<th>&nbsp;</th>
							</thead>
							<tbody>
								@foreach ($templates as $template)
									<tr>
										<td class="table-text"><a href="/templates/{{ $template->id }}">{{ $template->name }}</a></td>
										<!-- template Delete Button -->
										<td>
											<form action="/template/{{ $template->id }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" id="delete-template-{{ $template->id }}" class="btn btn-danger">
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