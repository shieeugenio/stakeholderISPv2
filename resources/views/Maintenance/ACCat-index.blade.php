<html>
	<head>
		
	</head>
	<body>
		<h1>Add Category</h1>
		<form action="/confirm" method="POST">
			<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" type="text">
			<label for="cat_name">Category Name</label>
			<input type="text" name="name">
			<label for="cat_name">Category Code</label>
			<input type="text" name="code">
			<br>
			<label for="cat_name">Description</label>
			<textarea name="desc"></textarea>
			<br>
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
						Category Code
					</th>
					<th>
						Category Name
					</th>
					<th>
						Description
					</th>
					<th>
						Action
					</th>
				</tr>
			</thead>
			<tbody>
				@foreach($category as $key => $value)
					<tr>
						<td>{{ $value->ID }}</td>
						<td>{{ $value->accategorycode }}</td>
						<td>{{ $value->categoryname }}</td>
						<td>{{ $value->desc }}</td>
						<td>
							<a  href="{{ URL::to('Maintenance/' . $value->ID . '/edit') }}">Edit</a>
						</td>
					</tr>
				@endforeach

			</tbody>
		</table>

	</body>
</html>