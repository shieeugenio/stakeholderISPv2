<html>
<head>
	
</head>

<body>
	<form action="/confirm" method="POST">
		<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" type="text">
		<label>Name</label>
		<input type="text" name="name" value="">
		<input type="submit" name="button">

	</form>
</body>
</html>