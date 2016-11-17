<html>
<head>
	<title>Edit</title>
</head>

	<h1>Edit {{$subcategory->subcategoryname}}</h1>
	<form action="subeditCommit" method="POST">
		<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" type="text">
		<input type="hidden" name="catID" value="{{$subcategory->ID}}">
		<label>SubCategory Name</label>
		<input type="text" name="name" value="{{$subcategory->subcategoryname}}">
		<select name="catID">
				@foreach($cat as $key=>$value)
				@if($value->ID == $subcategory->categoryId)
				<option value="{{$value->ID}}" selected="true">
					{{$value->categoryname}}
				</option>
				@else
				<option value="{{$value->ID}}">
					{{$value->categoryname}}
				</option>
				@endif
				@endforeach
			</select>
		<input type="submit" name="submit" value="UPDATE">
	</form>

</html>