<!DOCTYPE html>
<head>
<title>Advisory Council</title>
</head>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/semantic.css')}}">
<script type="text/javascript" src="{{ URL::asset('js/jquery-2.1.4.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/semantic.js') }}"></script>

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

			</br></br>


					<label>AC Sectors</label>
					<select id="multipleSelect" multiple class="ui selection dropdown"  name="sector" onclick="sectoradd(this.id)">
							@foreach($ac as $id => $key)
							<option value='{{$key->ID}}'>
								{{$key->sectorname}}
							</option>
							@endforeach
						
					</select></br><br>

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
						<td><a href="{{URL::to('transac/' .$res->ID. '/edit')}}" value="edit">EDIT</a></td>
					</tr>
					@endforeach
				</tbody>
		<table>
	

</body>
<script type="text/javascript">

$("select[name='sector']").dropdown(); //refresh dropdown

$("select[name='sector']").val(); 

// var selected= new array();
// $('.sector :selected').each(function(){
// 	selected[$(this).val]=$(this).text();
// });
// console.log(selected);


	function sectoradd(id){
		var categ = document.getElementById('multipleSelect').value;
		var dataString = "ID=" + categ;
		var token = document.getElementById('csrf-token').value;

		$.ajax({

				type: "post",
				headers: {'X-CSRF-TOKEN': token},
				url: "{{url('../add')}}",
				data: dataString,
				datatype: 'json',
				cache: false,
				success: function(data){

				

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