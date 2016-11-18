<html>
	<head>

	</head>
	<body>
		<h1>Police Offices SECOND</h1>
		<form action="/confirmpolice" method="POST">
		<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" type="text">

		<label>Police Office</label>
		<select name="office">
			@foreach($offices as $key => $res)
				<option value="{{$res->ID}}">
					{{$res->policeofficecode}}: {{$res->officename}}
				</option>
			@endforeach
		</select>

		<label>Sub Office Name</label>
		<input type="text" name="name">

		<label>Sub Office Code</label>
		<input type="text" name="secondcode">

		<label>Description</label>
		<input type="text" name="desc">

		<label>Office Street</label>
		<input type="text" name="street">

		<label>Office Barangay</label>
		<input type="text" name="barangay">

		<label>Office City</label>
		<input type="text" name="city">

		<label>Office Province</label>
		<input type="text" name="province">

		<label>Contact no</label>
		<input type="text" name="contact">

		<button type="submit" name="addbtn">Submit</button>
	</form>
	<form action="" method="POST">
		<table>
			<thead>
				<tr>
					<th>
						Police Office Name
					</th>
					<th>
						Police Office Code
					</th>
					<th>
						Sub Office Name
					</th>
					<th>
						Sub Office Code
					</th>
					<th>
						Description
					</th>
					<th>
						street
					</th>
					<th>
						barangay
					</th>
					<th>
						city
					</th>
					<th>
						province
					</th>
					<th>
						Contact No
					</th>
				</tr>
			</thead>
				<tbody>
					@foreach($suboffices as $key => $res)
					<tr>
						<td>{{$res->policeoffice->officename}}</td>
						<td>{{$res->policeoffice->policeofficecode}}</td>
						<td>{{$res->officename}}</td>
						<td>{{$res->policeofficecode2}}</td>
						<td>{{$res->desc}}</td>
						<td>{{$res->street}}</td>
						<td>{{$res->barangay}}</td>
						<td>{{$res->city}}</td>
						<td>{{$res->province}}</td>
						<td>{{$res->contactno}}</td>
						<td><a href="{{URL::to('maintenance/' .$res->ID. '/subpoliceview')}}" value="edit">EDIT</a></td>
					</tr>
					@endforeach
				</tbody>
		<table>
	</form>
	</body>
</html>