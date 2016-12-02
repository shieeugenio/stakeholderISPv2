@extends('baseform')

@section('content')
	<script type="text/javascript" src="{{ URL::asset('js/jquery-2.1.4.js') }}"></script>

	<dir>
		<form method="POST" action="javascript:lectcrud(0,document.getElementById('dualbutton').value)">
			<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}">
			<input type="hidden" id="ID" value="">
			Name:
																<input type="text" 
																	placeholder="LN, FN MI" 
																	id = '0'
																	class = "perfield error" 
																	name="inputlecturer"
																	onclick="divonfocus()" 
																	onkeydown = "if(event.keyCode == 13){ addarritem(this.id);}" 
																	value=''/>
			<button id="dualbutton" value="1" name="submit">Save</button>
			<button name="reset" onclick="resetflag()">Cancel</button>
		</form>	

			<table border="1">
				<thead>
					<tr>
						<th><center>Speaker Name</center></th>
						<th><center>Action</center></th>
					</tr>
				</thead>
				<tbody>
					@foreach($lecturer as $lecturer)
						<tr>
							<td>{{$lecturer->lecturername}}</td>
							<td><button id="{{$lecturer->ID}}" value="{{$lecturer->ID}}" onclick="lectcrud(this.value,2)">Edit</button></td>
						</tr>
					@endforeach
				</tbody>
			</table>
	</dir>
	<script type="text/javascript" src="{{URL::asset('js/formcontrol.js')}}"></script>
	<script type="text/javascript">
		var lecturers = new Array();


		function addarritem(index) {
			var text = document.getElementsByName('inputlecturer')[index].value;
			var pattern = new RegExp("^(?=.*(\d|\w))[A-Za-z0-9 .,'-]{3,}$");
			var flag = 0;

			//if(pattern.test(text) == true) {
				for (var count = 0 ; count < lecturers.length ; count++) {
					if(text === lecturers[count][0] && index == lecturers[count][1]) {
						flag = 1;
						break;
					}//if
				};//for

				if(flag == 0) {
					additem(text, index);
					lecturers.push(new Array(text, index));

				}//if(flag == 0) {]

			//}//pattern

		}//add item to array

		function deletearritem(index, rowindex) {
			var ulist = document.getElementsByName('lecturer')[rowindex];
			var text = ulist.getElementsByTagName('li')[index].firstChild.innerHTML;

			deleteitem(index, rowindex, ulist);

			for (var count = 0 ; count < lecturers.length ; count++) {
				if(text === lecturers[count][0] && rowindex == lecturers[count][1]) {
					lecturers.splice(count, 1);
					break;
				}//if
					
			};//for

			console.log(lecturers);


		}//delete from array

		function lectcrud(id,func)
		{
			var data;
			
			if(func==1)
			{
				data = {
					'callId' : 1,
					'lecturer' : lecturers,
					'submit' : document.getElementsByName('submit')[0].value,
					'_token' : '{{Session::token()}}'
				}
			}
			if(func==2)
			{
				data = {
					'id' : id,
					'callId' : 2,
					'submit' : document.getElementsByName('submit')[0].value,
					'_token' : '{{Session::token()}}'
				}	
			}
			if(func==3)
			{
				data = {
					'id' : document.getElementById('ID').value,
					'callId' : 1,
					'lecturer' : lecturers,
					'submit' : document.getElementsByName('submit')[0].value,
					'_token' : '{{Session::token()}}'
				}	
			}

			console.log(data);
			$.ajax({
				type: "POST",
				url: "{{url('transaction/lectcrud')}}",
				data: data,
				success:function(data){
					if(func == 1 || func == 3)
					{

					}
					else
					{
						document.getElementById('ID').value = data['ID'];
						document.getElementsByName('lectname').value = data['lecturer'];
						document.getElementById('dualbutton') = 3;
						console.log(data);
					}
				}

			});
		}
	</script>


@stop