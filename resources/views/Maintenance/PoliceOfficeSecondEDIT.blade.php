<html>
<head>
	<title>Police Office Edit</title>
</head>

	<h1>Police Offices</h1>
	<form action="editsubpolice" method="POST">
		<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" type="text">
		
		<label>Police Office Name</label>
		<select name="office">
			@foreach($offices as $key => $res)
				<option value="{{$res->ID}}">
					{{$res->policeofficecode}}: {{$res->officename}}
				</option>
			@endforeach
		</select>

		<label>Sub Office Name</label>
		<input type="text" name="name" value="{{$ids->officename}}">

		<label>Sub Office Code</label>
		<input type="text" name="secondcode" value="{{$ids->policeofficecode2}}">

		<label>Description</label>
		<input type="text" name="desc" value="{{$ids->desc}}">

		<label>Street</label>
		<input type="text" name="street" value="{{$ids->street}}">

		<label>Barangay</label>
		<input type="text" name="barangay" value="{{$ids->barangay}}">

		<label>City</label>
		<input type="text" name="city" value="{{$ids->city}}">

		<label>Province</label>
		<input type="text" name="province" value="{{$ids->province}}">

		<label>Contact No</label>
		<input type="text" name="contact" value="{{$ids->contactno}}">

		<button type="submit" name="edit">Submit</button>
	</form>

</html>