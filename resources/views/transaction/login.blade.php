<!doctype html>
<html>
<head>
<script type="text/javascript" src="{{ URL::asset('js/jquery-1.10.2.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/selectize/js/standalone/selectize.min.js') }}"></script>
<link href="{{ URL::asset('js/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet">
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

<br>
<br>
<script>
	$(document).ready(function(){
	    $('#searchbox').selectize();
	});
</script>
<select id="searchbox" name="q" placeholder="Search products or categories..." class="form-control"></select>
</body>
</html>