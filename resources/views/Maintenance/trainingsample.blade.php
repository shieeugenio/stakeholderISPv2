@extends('welcome')

@section('content')
	<script type="text/javascript" src="{{ URL::asset('js/jquery-2.1.4.js') }}"></script>


				<div>
						<form method="POST" action="javascript:CRUD(0,document.getElementById('dualbutton').value)">
							<legend>Training</legend>
							<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token()}}"/>
							<input type="hidden" id="ID" value="" />
							Training Name:<input type="text" name="tname" value="" /><br>
							Start date   :<input type="date" name="startdate" value="" /><br>
							End date     :<input type="date" name="enddate" value="" /><br>

							Location:<input type="text" name="location" value="" /><br>
							Organizer:<input type="text" name="organizer" value="" /><br>

							Start Time   :<input type="long time" name="starttime"  date-format="HH:mm:ss" value="12:00 AM" /><br>
							End Time     :<input type="long time" name="endtime" value="12:00 AM" /><br>
							Training Type:
							<select id="ttype">
								<option selected><----select----></option>
								<option value="1">Barilan</option>
								<option value="2">Suntukan</option>
								<option value="3">Technical</option>

							</select>

							<legend>Training</legend>
							<input type="hidden" id="ID" value="" />
							Training Name:<input type="text" name="tname" value="" /><br>
							Start date   :<input type="date" name="startdate" value="" /><br>
							End date     :<input type="date" name="enddate" value="" /><br>

							Location:<input type="text" name="location" value="" /><br>
							Organizer:<input type="text" name="organizer" value="" /><br>

							Start Time   :<input type="long time" name="starttime"  date-format="HH:mm:ss" value="12:00 AM" /><br>
							End Time     :<input type="long time" name="endtime" value="12:00 AM" /><br>
							Training Type:
							<select id="ttype">
								<option selected><----select----></option>
								<option value="1">Barilan</option>
								<option value="2">Suntukan</option>
								<option value="3">Technical</option>

							</select>

							<legend>Training</legend>
							<input type="hidden" id="ID" value="" />
							Training Name:<input type="text" name="tname" value="" /><br>
							Start date   :<input type="date" name="startdate" value="" /><br>
							End date     :<input type="date" name="enddate" value="" /><br>

							Location:<input type="text" name="location" value="" /><br>
							Organizer:<input type="text" name="organizer" value="" /><br>

							Start Time   :<input type="long time" name="starttime"  date-format="HH:mm:ss" value="12:00 AM" /><br>
							End Time     :<input type="long time" name="endtime" value="12:00 AM" /><br>
							Training Type:
							<select id="ttype">
								<option selected><----select----></option>
								<option value="1">Barilan</option>
								<option value="2">Suntukan</option>
								<option value="3">Technical</option>

							</select>

							<button id="dualbutton" value="1" name="submit">Add Training</button>
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
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
								@foreach ($info as $info)

									<tr >
										<td>{{$info->trainingname}}</td>
										<td>{{$info->startdate}}</td>
										<td>{{$info->enddate}}</td>
										<td>{{$info->location}}</td>
										<td>{{$info->organizer}}</td>
										<td>{{$info->starttime}}</td>
										<td>{{$info->endtime}}</td>
										<td>{{$info->trainingtype}}</td>
										<td><button id= "{{$info->ID}}" value="{{$info->ID}}" onclick="CRUD(this.value,2)">Edit</button></td>
									</tr>
								
								@endforeach

						</tbody>

					</table>

<script type="text/javascript">

		function resetflag()
		{
			document.getElementById('dualbutton').value = 1;
		}
	
		function CRUD(id,func)
		{
			var data;
			var ctr;
			var form = document.forms[0];
			var title = form['tname'];
			var trainingsdate = form['startdate'];
			var trainingedate = form['enddate'];
			var trainloc = form['location'];
			var trainorg = form['organizer'];
			var trainingstime = form['starttime'];
			var trainingetime = form['endtime'];
			var traincat = form['ttype'];
			var trainId = form['ID'];

			var id = new Array();
			var traintitle = new Array();
			var trainsdate = new Array();
			var trainedate = new Array();
			var location = new Array();
			var org = new Array();
			var trainstime = new Array();
			var trainetime = new Array();
			var traintype = new Array();

			if(func == 1)
			{
				

			for(ctr=0;ctr<title.length;ctr++){
				if(title[ctr].value==""){
						break;
				}
				else{
					traintitle.push(title[ctr].value);
					trainsdate.push(trainingsdate[ctr].value);
					trainedate.push(trainingedate[ctr].value);
					location.push(trainloc[ctr].value);
					org.push(trainorg[ctr].value);
					trainstime.push(trainingstime[ctr].value);
					trainetime.push(trainingetime[ctr].value);
					traintype.push(traincat[ctr].value);
				}
			}
				callId=1;
				var data = {
					'adviserid' : 3,
					'id' : id,
					'tname' : traintitle,
					'startdate' : trainsdate,
					'enddate' : trainedate,
					'location' : location,
					'organizer' : org,
					'starttime' : trainstime,
					'endtime' : trainetime,
					'trainingtype' : traintype,
					'callId' : callId,
					'submit' : document.getElementsByName('submit')[0].value,
					'_token' : '{{Session::token()}}'
				};
			}

			if(func == 2)
			{
				callId=2;
				var data = {
					'id' : id,
					'adviserid' : 2,
					'callId' : callId,
					'submit' : document.getElementsByName('submit')[0].value,
					'_token' : '{{Session::token()}}'
				};
			}
			
			if(func == 3)
			{
				for(ctr=0;ctr<title.length;ctr++){
					if(title[ctr].value==""){
							break;
					}
					else{
						id.push(trainId[ctr].value);
						traintitle.push(title[ctr].value);
						trainsdate.push(trainingsdate[ctr].value);
						trainedate.push(trainingedate[ctr].value);
						location.push(trainloc[ctr].value);
						org.push(trainorg[ctr].value);
						trainstime.push(trainingstime[ctr].value);
						trainetime.push(trainingetime[ctr].value);
						traintype.push(traincat[ctr].value);
					}
				}
				

				callId=3;
				var data = {
					'adviserid' : 2,
					'id' : id,
					'tname' : traintitle,
					'startdate' : trainsdate,
					'enddate' : trainedate,
					'location' : location,
					'organizer' : org,
					'starttime' : trainstime,
					'endtime' : trainetime,
					'trainingtype' : traintype,
					'callId' : callId,
					'submit' : document.getElementsByName('submit')[0].value,
					'_token' : '{{Session::token()}}'
				};
			}
			

			console.log(data);
			
			$.ajax({

				type: "POST",
				url: "{{url('transaction/trainingcrud')}}",
				data: data,
				success:function(data){

					if(func == 1 || func == 3)
					{
						window.location.href = "{{url('transaction/trainingsample')}}";
					}

					else {
							for(var j=0;j<data.length;j++){
								trainId[j].value = data[j].ID;
								title[j].value = data[j].trainingname;
								trainingsdate[j].value = data[j].startdate;
								trainingedate[j].value = data[j].enddate;
								trainloc[j].value = data[j].location;
								trainorg[j].value = data[j].organizer;
								trainingstime[j].value = data[j].starttime;
								trainingetime[j].value = data[j].endtime;
								

							for(var k=0, opt = traincat[j].options; k < opt.length ;++k)
							{	
								if( opt[k].value == data[j].trainingtype)
					   			{
					   				alert(opt[k].value);
					   			   	traincat[j].options[k].selected = true; 
					   			   	break;
					   			}
							}
							
						}
						document.getElementById('dualbutton').value = 3;

						console.log(data);
					}//else
				}//success funtion
			});

		}
	</script>
	
@stop
