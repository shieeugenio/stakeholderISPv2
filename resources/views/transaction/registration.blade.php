<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="register" method="POST">
	@if(session('message'))
		<p>{{session('message')}}</p>
	@endif
	<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" type="text">
	<label>Name</label>
	<input type="text" name="name">
	<label>Username</label>
	<input type="text" name="username">
	<label>Password</label>
	<input type="password" name="password">
	<SELECT name='type'>
		<option value="1">
			Super Admin
		</option>
		<option value="0">
			Admin
		</option>
	</SELECT>
	<input type="submit">


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
				@foreach($users as $key => $value)
					@if($value->status == 0)
					<tr>
						<td>{{ $value->name }}</td>
						<td>
							<a  href="{{ URL::to('Accountapproved/' . $value->id) }}">Approved</a>
							<a  href="{{ URL::to('Accountdisapproved/' . $value->id) }}">Disapproved</a>
						</td>
					</tr>
					@endif
				@endforeach

			</tbody>
		</table>

</form>
</body>
</html>