<!doctype html>
<html>
<head>
<title>Look at me Login</title>
</head>
<body>
@if(session('message'))
		<p>{{session('message')}}</p>
@endif

<form action="login" method="POST">
	<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" type="text">
	<label>Username</label><input type="text" name="username">
	<br>
	<label>Password</label> <input type="password" name="password">
	<input type="submit">
</form>
<br>
<br>
@foreach($adviser as $key => $val)
	<img src={{ $val->imagepath }}>
	{{ $val->fname }} {{ $val->fname }}

	<br>

@endforeach
</body>
</html>