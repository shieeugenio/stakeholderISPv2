<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=yes">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<link rel="shortcut icon" type="image/png" href="{{URL::asset('images/Philippine-National-Police.png')}}"> <!--LOGO-->

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/semantic.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/stylev1.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/icon.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/toast.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/multipletextinput.css')}}">


		<!-- JS -->
		<script type="text/javascript" src="{{ URL::asset('js/jquery-2.1.4.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/semantic.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/initialization.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/toast.js') }}"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>



		<!--Data Table plugins and design-->
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/datatable/dataTables.semanticui.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/datatable/responsive.semanticui.min.css')}}">

		<script type="text/javascript" src="{{ URL::asset('js/datatable/jquery.dataTables.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/datatable/dataTables.semanticui.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/datatable/dataTables.responsive.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/datatable/responsive.semanticui.min.js') }}"></script>
	</head>
	<body>
		<h1>Advisers</h1>
		<form method="POST" id="formInfo" action="" autocomplete="on" enctype="multipart/form-data">
			<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" type="text">
			
			<label>Firstname</label>
			<input type="text" name="fname"><br>
			<label>middlename</label>
			<input type="text" name="mname"><br>
			<label>Lastname</label>
			<input type="text" name="lname"><br>
			<label>Gender</label>
			<select name="gender">
				<option value="0">male</option>
				<option value="1">female</option>
			</select><br>
			<label>Contact No</label>
			<input type="text" name="contact"><br>
			<label>landline</label>
			<input type="text" name="landline"><br>

			<label>street</label>
			<input type="text" name="street"><br>
			<label>barangay</label>
			<input type="text" name="barangay"><br>
			<label>city</label>
			<input type="text" name="city"><br>
			<label>province</label>
			<input type="text" name="province"><br>
			<label>email</label>
			<input type="text" name="email"><br>
			<label>Start Date</label>
			<input type="date" name="startDate"><br>
			<label>fb</label>
			<input type="text" name="fb"><br>
			<label>twitter</label>
			<input type="text" name="twitter"><br>
			<label>ig</label>
			<input type="text" name="ig"><br>
			<label>birthday</label>
			<input type="date" name="birthday"><br>
			<label>Category</label>
			<select name="category">
				<option value="1">AC</option>
				<option value="2">TWG</option>
				<option value="3">Others</option>
			</select>
			<label>Status</label>
			<select name="stat">
				<option value="1">ACTIVE</option>
				<option value="2">Retired</option>
			</select>
			<input type="file" name="img">
			<input type="submit" name="submit">


		</form>
		<script type="text/javascript">
			$(document).ready(function (e) {
			$("#formInfo").on('submit',(function(e) {
			e.preventDefault();
			$.ajax({
			url: "testAdviserAdd", 
			type: "POST",             
			data: new FormData(this), 
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,        // To send DOMDocument or non processed data file it is set to false
			success: function(data)   // A function to be called if request succeeds
			{
				alert('good');
			}
			});
			}));
			});

		</script>
	</body>
</html>