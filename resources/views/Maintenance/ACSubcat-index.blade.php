<html>
	<head>
		
	</head>
	<body>
		<h1>Sub Category</h1>
		<form action="" method="POST">
			<label>Category: </label>
			<select name="category">
				@foreach($category as $key=>$value)
				<option value="{{$value->ID}}">
					{{$value->categoryname}}
				</option>
				@endforeach
			</select>
			<label>Sub Category Name</label>
			<input type="text" name="subcat">
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
			<!--
				@foreach($subcat as $skey=>$svalue)
					<tr>
						<td>{{$svalue->subcategoryname}}</td>
						<td>{{$svalue->categoryname}}</td>
						<td><a  href="{{ URL::to('Maintenance/' . $svalue->ID . '/edit') }}">Edit</a></td>	
					</tr>
				@endforeach
			-->
			</tbody>
		</table>
	</body>
</html>