<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- 
			Note: need po ung css library na to para kay captcha

	-->
	<link href="{{ captcha_layout_stylesheet_url() }}" type="text/css" rel="stylesheet">
</head>
<body>
<form action="register" method="POST">
	@if(session('message'))
		@if(session('check') == 1)
		<p style="color:green;">{{session('message')}}</p>
		@else
		<p style="color:red;">{{session('message')}}</p>
		@endif
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
	{!! captcha_image_html('ExampleCaptcha') !!}
  	<input type="text" id="CaptchaCode" name="CaptchaCode">
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


<br>
<br>

-----------
{{session('try')}}

</body>
</html>