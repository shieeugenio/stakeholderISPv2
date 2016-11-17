<html>
<head>
	<title>Edit</title>
</head>

	<h1>Edit {{$category->categoryname}}</h1>
	<form action="editCommit" method="POST">
		<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" type="text">
		<input type="hidden" name="catID" value="{{$category->ID}}">
		<label>Category Name</label>
		<input type="text" name="name" value="{{$category->categoryname}}">
		<input type="submit" name="submit" value="UPDATE">
	</form>

</html>