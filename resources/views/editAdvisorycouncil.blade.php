<!DOCTYPE html>
<head>
<title>Advisory Council</title>
</head>

<body>
	<form action="editAc" method="POST">
		<fieldset>
			<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" type="text">
			<!-- <input type="hidden" id="editID" name="editID"> -->
				<label for='acpositionid'>Position ID </label>
					<select name="position">
						@foreach($ac as $key)
							<option value='{{$key->ID}}'>
								{{$key->advisoryposition->acpositionname}}
							</option>
						@endforeach
					</select></br><br>
				
				<label for='acofficename'> Office Name </label>
				<input type='text' value='{{$ids->officename}}' name='acofficename' maxlength="20" pattern = '[A-Z a-z]+'/>

				<label for='acofficeadd'> Office Address </label>
				<input type='text' value='{{$ids->officeaddress}}' name='acofficeadd' required placeholder="Office Addres" maxlength="20" pattern = '[A-Z a-z]+'/></br><br>

				<label for='accategoryid'>Category </label>
					<select name="category" id="cat" onchange="catChange()">
							@foreach($ac as $key)
								<option value='{{$key->ID}}'>
									{{$key->acsubcategory->subcategoryname}}
								</option>
							@endforeach
					</select>&nbsp

					
				<label for='acsubcategoryid'>Sub-Category </label>
					<select name="subcat" id="sub">
							@foreach($ac as $key)
								<option value='{{$key->ID}}'>
									{{$key->acsubcategory->subcategoryname}}
								</option>
							@endforeach
						
					</select></br><br>
				
				<label for='startdate'>Start Date </label>
				<input type='date' value='{{$ids->startdate}}' name='startdate' required placeholder='Start Date'>&nbsp
					
				<label for='enddate'>End Date </label>
				<input type='date' value='{{$ids->enddate}}' name='enddate' required placeholder='End Date'>

				<button type="submit" name="edit">Save</button>

		</fieldset>
	</form>