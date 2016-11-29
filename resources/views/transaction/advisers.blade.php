<html>
	<head>
		
	</head>
	<body>
		<h1>Advisers</h1>
		<form method="POST" action="addadvisers" autocomplete="on" enctype="multipart/form-data">
			<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" type="text">
			
			<label>Firstname</label>
			<input type="text" name="fname">
			<label>Lastname</label>
			<input type="text" name="lname">
			<label>middlename</label>
			<input type="text" name="mname">
			<label>street</label>
			<input type="text" name="street">
			<label>barangay</label>
			<input type="text" name="barangay">
			<label>city</label>
			<input type="text" name="city">
			<label>province</label>
			<input type="text" name="province">
			<label>email</label>
			<input type="text" name="email">
			<label>birthday</label>
			<input type="date" name="birthday">
			<label>Category</label>
			<select name="category">
				<option value="1">AC</option>
				<option value="2">TWG</option>
				<option value="3">Others</option>
			</select>
			<label>Status</label>
			<select name="stat">
				<option value="1">ACTIVE</option>
				<option value="2">Retired</option>
			</select>
			<input type="file" name="img">
			<input type="submit" name="submit">


		</form>
	</body>
</html>