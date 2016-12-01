<!DOCTYPE html>
<head>
<title>Advisory Council</title>
</head>

<body>
	<form action="/add" method="POST">
		<fieldset>
			<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" type="text">
				<label for='acpositionid'>Position ID </label>
					<select name="position">
						@foreach($positions as $position => $key)
						<option value='{{$key->ID}}'>
							{{$key->acpositionname}}
						</option>
						@endforeach
					</select></br><br>
				
				<label for='acofficename'> Office Name </label>
				<input type='text' value='' name='acofficename' required placeholder="Office Name" maxlength="20" pattern = '[A-Z a-z]+'/>

				<label for='acofficeadd'> Office Address </label>
				<input type='text' value='' name='acofficeadd' required placeholder="Office Addres" maxlength="20" pattern = '[A-Z a-z]+'/></br><br>

				<label for='accategoryid'>Category </label>
					<select name="category" id="cat" onchange="catChange()">
						<option disabled selected>Category</option>
						@foreach($cat as $key)
							<option value='{{$key->ID}}'>
								{{$key->categoryname}}
							</option>
						@endforeach

					</select>

					
				<label for='acsubcategoryid'>Sub-Category </label>
					<select name="subcat" id="sub" onchange="subcat()">
								
							@foreach($sub as $key)
							<option value='{{$key->ID}}'>
								{{$key->subcategoryname}}
							</option>
						@endforeach
					</select></br><br>
				
				<label for='startdate'>Start Date </label>
				<input type='date' value='' name='startdate' required placeholder='Start Date'>&nbsp
					
				<label for='enddate'>End Date </label>
				<input type='date' value='' name='enddate' required placeholder='End Date'>

				<button type="submit" name="submit">Save</button>

		</fieldset>
	</form>

<table>
			<thead>
				<tr>
					<th>
						Advisory Council Name
					</th>
					<th>
						Advisory Council Address
					</th>
					<th>
						Advisory Position
					</th>
					<th>
						Category
					</th>
					<th>
						SubCategory
					</th>
					<th>
						Start Date
					</th>
					<th>
						End Date
					</th>
				</tr>
			</thead>
				<tbody>
					@foreach($council as $key => $res)
					<tr>
						<td>{{$res->officename}}</td>
						<td>{{$res->officeaddress}}</td>
						<td>{{$res->advisoryposition->acpositionname}}</td>
						<!-- <td>{{$res->acsubcategory->subcategoryname}}</td> -->
						<td></td>
						<td>{{$res->acsubcategory->subcategoryname}}</td>
						<td>{{$res->startdate}}</td>
						<td>{{$res->enddate}}</td>
						<td><a href="{{URL::to('transac/' .$res->ID. '/edit')}}" value="edit">EDIT</a></td>
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

	// function subcat(){
	// 	var subID = document.getElementById('sub').value;
	// 	var dataString = "ID=" + subID;
	// 	var token = document.getElementById('csrf-token').value;
		
	// 		$.ajax({

	// 			type: "post",
	// 			headers: {'X-CSRF-TOKEN': token},
	// 			url: "subcatOptions",
	// 			data: dataString,
	// 			datatype: 'json',
	// 			cache: false,
	// 			success: function(data){

	// 				var parse_data = JSON.parse(data);

	// 				document.getElementById('cat').disabled = false;

	// 				document.getElementById('cat').innerHTML = "<option>- SUB -</option>";

	// 				for (var i = 0; i < parse_data.length; i = i + 2) {
							
	// 					var j = i + 1;

	// 				}
					

	// 			}

	// 		});
	// }
</script>
</html>