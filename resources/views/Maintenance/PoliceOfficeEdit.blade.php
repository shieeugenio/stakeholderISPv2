<html>
<head>
	<title>Police Office Edit</title>
</head>

	<h1>Police Offices</h1>
	<form action="editpolice" method="POST">
		<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" type="text">
		<label>Office Name</label>
		<input type="text" name="name" value="{{$ids->officename}}">

		<label>Office Address</label>
		<input type="text" name="add" value="{{$ids->police_address}}">

		<label>Contact no</label>
		<input type="text" name="contact" value="{{$ids->contactno}}">

		<button type="submit" name="edit">Submit</button>
	</form>

</html>