@extends('welcome')

@section('content')

	<div>
		<form>
			<input type="file" id="filepic" name="adviserpic" accept="image/jpeg, image/png, image/jpg"/><br>
			First Name:<input type="text" name="fname" value="" /><br>
			Middle Name:<input type="text" name="mname" value="" /><br>
			Last Name:<input type="text" name="lname" value="" /><br><br>

			Street:<input type="text" name="street" value="" /><br>
			Barangay:<input type="text" name="barangay" value="" /><br>
			City:<input type="text" name="city" value="" /><br>
			Province:<input type="text" name="province" value="" /><br>

			E-mail:<input type="email" name="email" value="" /><br>
			Birthdate:<input type="date" name="birthdate" value="" /><br>

			Category
			<select>
				<option selected><----select----</option>
				<option value="1">Advisory Council</option>
				<option value="1">Technical Working Group(TWG)</option>
				<option value="1">Police Strategy Management Unit(PSMU)</option>

			</select>>



		</form>
	</div>

@stop
