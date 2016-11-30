<!DOCTYPE html>
<head>
<title>Advisory Council</title>
</head>

<body>
	<form action="/addpolice" method="POST">
		<fieldset>
			<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" type="text">
				<label>Position ID </label>
					<select name="position">
						@foreach($positions as $position => $key)
						<option value='{{$key->ID}}'>
							{{$key->positionname}}
						</option>
						@endforeach
					</select></br><br>
				
				<label>Police Office Second </label>
					<select name="officetwo" id="sub" onchange="subcat()">
						@foreach($offices as $position => $key)
							<option value='{{$key->ID}}'>
								{{$key->officename}}
							</option>
						@endforeach
					</select></br><br>
				
				<label> Authority Number </label>
				<input type='text' value='' name='authority' required placeholder="Authority Number" maxlength="20"/>

				<button type="submit" name="submit">Save</button>

		</fieldset>
	</form>

<table>
			<thead>
				<tr>
					<th>
						Police Position
					</th>
					<th>
						Police Offices
					</th>
					<th>
						Authority Number
					</th>
				</tr>
			</thead>
				<tbody>
					@foreach($adviser as $res => $key)
						<tr>
							<td>{{$key->policeposition->positionname}}</td>
							<td>{{$key->policeofficetwo->officename}}</td>
							<td>{{$key->authorityorder}}</td>
							<td><a href ="{{URL::to('policeadv/' .$key->ID. '/edit')}}" value="edit">EDIT</a></td>
						</tr>
					@endforeach
				</tbody>
		<table>
	

</body>
<script type="text/javascript">
	function catChange(){
		var categ = document.getElementById('cat').value;
		var dataString = "ID=" + categ;
		var token = document.getElementById('csrf-token').value;

		$.ajax({

				type: "post",
				headers: {'X-CSRF-TOKEN': token},
				url: "subcatOptionsone",
				data: dataString,
				datatype: 'json',
				cache: false,
				success: function(data){

					var parse_data = JSON.parse(data);

					document.getElementById('sub').disabled = false;

					document.getElementById('sub').innerHTML = "<option>- Select Subcategory -</option>";

					for (var i = 0; i < parse_data.length; i = i + 2) {
							
						var j = i + 1;

					}
					
				}

			});
	}
</script>
</html>