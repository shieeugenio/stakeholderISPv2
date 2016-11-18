<html>
<head>
	<title>Edit</title>
</head>

	<h1>Edit {{$subcategory->subcategoryname}} ({{$subcategory->acsubcategorycode}})</h1>
	<form action="subeditCommit" method="POST">
		<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" type="text">
		<input type="hidden" name="subcatID" value="{{$subcategory->ID}}">
		<label>Sub Category Code</label>
		<input type="text" name="subcatcode" value="{{$subcategory->acsubcategorycode}}">
		<label>SubCategory Name</label>
		<input type="text" name="name" value="{{$subcategory->subcategoryname}}">
		<select name="catID">
				@foreach($cat as $key=>$value)
				@if($value->ID == $subcategory->categoryId)
				<option value="{{$value->ID}}" selected="true">
					{{$value->accategorycode}} - {{$value->categoryname}}
				</option>
				@else
				<option value="{{$value->ID}}">
					{{$value->accategorycode}} - {{$value->categoryname}}
				</option>
				@endif
				@endforeach
		</select>
		<label>Description</label>
		<textarea name="desc">{{$subcategory->desc}}</textarea>

		<input type="submit" name="submit" value="UPDATE">
	</form>

</html>