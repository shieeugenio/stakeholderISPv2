@extends('welcome')

@section('content')
	<script type="text/javascript" src="{{ URL::asset('js/jquery-2.1.4.js') }}"></script>


				<div>
						<form method="POST" action="store">
							<legend>Training</legend>
							<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token()}}"/>
							Training Name:<input type="text" name="tname" value="" /><br>
							Start date   :<input type="date" name="startdate" value="" /><br>
							End date     :<input type="date" name="enddate" value="" /><br>

							Location:<input type="text" name="location" value="" /><br>
							Organizer:<input type="text" name="organizer" value="" /><br>

							Start Time   :<input type="long time" name="starttime"  date-format="HH:mm:ss" value="12:00 AM" /><br>
							End Time     :<input type="long time" name="endtime" value="12:00 AM" /><br>
							Training Type:
							<select name="ttype">
								<option selected><----select----</option>
								<option value="1">Barilan</option>
								<option value="2">Suntukan</option>
								<option value="3">Technical</option>

							</select>>

							<button name="submit">Add Training</button>
							<button type="reset" onclick="resetflag()">Cancel</button>

						</form>
					</div><br><br>

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
										<td>{{$info->location}}</td>
										<td>{{$info->organizer}}</td>
										<td>{{$info->starttime}}</td>
										<td>{{$info->endtime}}</td>
										<td>{{$info->trainingtype}}</td>
									</tr>
								
								@endforeach

						</tbody>

					</table>
<!--			</td>

			<td>
				<form method="POST" action="addlecturer">
					<legend>Lecturer</legend>
					<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}">
					First Name:<input type="text" name="fname"><br>
					Middle Name:<input type="text" name="mname"><br>
					Last Name:<input type="text" name="lname"><br>

					<button name="submit">Add</button>
					<button type="reset">Cancel</button>
				</form>
			</td>
		</tr>
	</table>
		<script type="text/javascript">
	
		function addTraining()
		{
			var data = {
				'tname' : document.getElementsByName('tname')[0].value,
				'startdate' : document.getElementsByName('startdate')[0].value,
				'enddate' : document.getElementsByName('enddate')[0].value,
				'location' : document.getElementsByName('location')[0].value,
				'organizer' : document.getElementsByName('organizer')[0].value,
				'starttime' : document.getElementsByName('starttime')[0].value,
				'endtime' : document.getElementsByName('endtime')[0].value,
				'ttype' : document.getElementsByName('ttype')[0].value,
				'submit' : document.getElementsByName('submit')[0].value,
				'_token' : '{{Session::token()}}'
			};

			console.log(data);
			
			$.ajax({

				type: "POST",
				url: "{{url('maintenance/store')}}",
				data: data,
				datatype : "JSON",
				success:function(data){
					
					console.log(data);
				}//success funtion
			});

		}
	</script>
	-->
@stop
