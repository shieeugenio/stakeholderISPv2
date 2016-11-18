<html>
	<head>
		
	</head>
	<body>
		<h1>Add Category</h1>
		<form action="/confirm" method="POST">
			<label for="cat_name">Category Name</label>
			<input type="text">
			<input type="submit" value="submit" name="submit">
		</form>
		<table>
			<thead>
				<tr>
					<th>
						Category ID
					</th>
					<th>
						Category Name
					</th>
				</tr>
			</thead>
			<tbody>
				@foreach($category as $key => $value)
					<tr>
						<td>{{ $value->ID }}</td>
						<td>{{ $value->categoryname }}</td>
						<td>
							<a  href="{{ URL::to('Maintenance/' . $value->ID . '/edit') }}">Edit</a>
						</td>
					</tr>
				@endforeach

			</tbody>
		</table>

	</body>
</html>