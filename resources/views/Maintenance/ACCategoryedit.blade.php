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
		<label for="cat_name">Category Code</label>
		<input type="text" name="code" value="{{$category->accategorycode}}">
		<br>
		<label for="cat_name">Description</label>
		<textarea name="desc">{{$category->desc}}</textarea>
		<input type="submit" name="submit" value="UPDATE">
	</form>

</html>