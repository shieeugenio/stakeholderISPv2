<html>
	<head>
		
	</head>
	<body>
		<h1>Sub Category</h1>
		<form action="addcommit" method="POST">
		<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" type="text">
			
			<label>Sub Category Name</label>
			<input type="text" name="subcat">
			<label>Category: </label>
			<select name="category">
				@foreach($category as $key=>$value)
				<option value="{{$value->ID}}">
					{{$value->categoryname}}
				</option>
				@endforeach
			</select>
			<input type="submit" name="submit" value="add">
		</form>
		<table>
			<thead>
				<tr>
					<th>Subcategory</th>
					<th>Category</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			
				@foreach($subcat as $skey=>$svalue)
					<tr>
						<td>{{$svalue->subcategoryname}}</td>
						<td>{{$svalue->category->categoryname}}</td>
						<td><a  href="{{ URL::to('Maintenance/' . $svalue->ID . '/subedit') }}">Edit</a></td>	
					</tr>
				@endforeach
			
			</tbody>
		</table>
	</body>
</html>