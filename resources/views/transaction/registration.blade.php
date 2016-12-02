<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="register" method="POST">
	@if(session('message'))
		<p>{{session('message')}}</p>
	@endif
	<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" type="text">
	<label>Name</label>
	<input type="text" name="name">
	<label>Username</label>
	<input type="text" name="username">
	<label>Password</label>
	<input type="password" name="password">
	<input type="submit">

</form>
</body>
</html>