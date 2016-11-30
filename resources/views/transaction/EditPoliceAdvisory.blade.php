<!DOCTYPE html>
<head>
<title>Advisory Council</title>
</head>

<body>
	<form action="editpolice" method="POST">
		<fieldset>
			<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" type="text">
			<!-- <input type="hidden" id="editID" name="editID"> -->
				<label>Position </label>
					<select name="position">
						@foreach($police as $key)
							<option value='{{$key->ID}}'>
								{{$key->policeposition->positionname}}
							</option>
						@endforeach
					</select></br><br>
				
				<label>Secondary Office two</label>
					<select name="officetwo" id="cat" onchange="catChange()">
							@foreach($police as $key)
								<option value='{{$key->ID}}'>
									{{$key->policeofficetwo->officename}}
								</option>
							@endforeach
					</select>&nbsp

				<label for='acofficename'> Authority Number </label>
				<input type='text' value='{{$ids->authorityorder}}' name='authority' maxlength="20" pattern = '[A-Z a-z]+'/>

				<button type="submit" name="edit">Save</button>

		</fieldset>
	</form>