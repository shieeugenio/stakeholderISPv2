<html>
	<head>
		
	</head>
	<body>
		<h1>Sub Category</h1>
		<form action="addcommit" method="POST">
		<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" type="text">
			<label>Sub Category Code</label>
			<input type="text" name="subcatcode">
			<label>Sub Category Name</label>
			<input type="text" name="subcat">
			<label>Category: </label>
			<select name="category">
				@foreach($category as $key=>$value)
				<option value="{{$value->ID}}">
					{{$value->accategorycode}} - {{$value->categoryname}}
				</option>
				@endforeach
			</select>
			<label>Description</label>
			<textarea name="desc">
				
			</textarea>

			<input type="submit" name="submit" value="add">
		</form>
		<table border="5">
			<thead>
				<tr>
					<th>ID</th>
					<th>Subcategory Code</th>
					<th>Subcategory</th>
					<th>Category</th>
					<th>Description</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			
				@foreach($subcat as $skey=>$svalue)
					<tr>
						<td>{{$svalue->ID}}</td>
						<td>{{$svalue->acsubcategorycode}}</td>
						<td>{{$svalue->subcategoryname}}</td>
						<td>{{$svalue->category->categoryname}} ({{$svalue->category->accategorycode}})</td>
						<td>{{$svalue->desc}}</td>ssss
						<td><a href="{{ URL::to('Maintenance/' . $svalue->ID . '/subedit') }}">Edit</a></td>	
					</tr>
				@endforeach
			
			</tbody>
		</table>
	</body>
</html>