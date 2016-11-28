@extends('welcome')

@section('content')

	<div>
		<form>
			<legend>Lecturer</legend>

			<table border='1'>
						<thead>
							<tr>
								<th>Training Name</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Location</th>
								<th>Organizer</th>
								<th>Start Time</th>
								<th>End Time</th>
								<th>Training Type</th>
							</tr>
						</thead>
						<tbody>
								@foreach ($info as $info)

									<tr id= "{{$info->ID}}">
										<td>{{$info->trainingname}}</td>
										<td>{{$info->startdate}}</td>
										<td>{{$info->enddate}}</td>
									</tr>
								
								@endforeach

						</tbody>

					</table>
		</form>
	</div>

@stop