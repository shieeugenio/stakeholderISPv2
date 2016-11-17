<html>
	<head>
		
	</head>
	<body>
		<h1>Add Category</h1>
		<form action="/confirm" method="POST">
			<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" type="text">
			<label for="cat_name">Category Name</label>
			<input type="text" name="name">
			<input type="submit" value="submit" name="submit">
		</form>
		@if(Session::has('mess'))
		    <div class="alert alert-success">
		        {{ Session::get('mess') }}
		    </div>
		@endif
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