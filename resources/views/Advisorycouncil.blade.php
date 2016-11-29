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
						@foreach($cat as $adv => $key)
							<option value='{{$key->ID}}'>
								{{$key->categoryname}}
							</option>
						@endforeach
					</select>&nbsp

					
				<label for='acsubcategoryid'>Sub-Category </label>
					<select name="subcat" id="sub">
								@foreach($sub as $adv => $key)
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
						<td>{{$res->acsubcategory->subcategoryname}}</td>
						<td>{{$res->startdate}}</td>
						<td>{{$res->enddate}}</td>
						<td><a href="{{URL::to('transac/' .$res->ID. '/edit')}}" value="edit">EDIT</a></td>
					</tr>
					@endforeach
				</tbody>
		<table>
	

</body>
<script>
function catChange(){
    $.get('/subcatOptions?catID=' + $("#cat").val(), function(data){
      var $selectDropdown = 
        $("#sub")
          .empty()
          .html(' ');
      $.each(data, function(index, subcatObj){
          $selectDropdown.append(
            $("<option></option>")
              .attr("value",subcatObj.ID)
              .text(subcatObj.subcategoryname)
          );
      });
    });
  } 
</script>
</html>