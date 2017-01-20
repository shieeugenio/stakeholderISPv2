@extends('baseformv2')

@section('publicpagesection')
	
	<br>
	<br>
	<br>

	<div class = "ui white raised very padded text container segment">
		<div class="ui container">
			<div class = "loghead2">
				<i class = "small add user icon round"></i>
					 Sign up

				<hr class = "hr2">
			</div>

			<form id = "form" method="POST" class = "ui form">
				<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" type="text">
												
					<div class = "logcontent">

						<span class ="message" name="message"></span>
						<br>
						<span class ="message" name="message"></span>

						<div class ="twelve wide column  bspacing8">
							<div id = "fncon" class="ui input field logfield2">
								<input type="text" onchange = "validatefullname()" name = "fullname" placeholder="Full Name e.g. FN MI LN EXT (Required)">
							</div>
												
						</div>

						<div class ="twelve wide column  bspacing8">
							<div id = "ucon" class="ui input field logfield2">
								<input onchange = "checkusername()" type="text" name = "username" placeholder="Username (Required)">
							</div>
												
						</div>

						<div class ="twelve wide column  bspacing8">
							<div id = "passcon1" class="ui input field logfield2">
								<input id = "pass1" type="password" name = "password" onchange = "validatepass()" placeholder="Password (Required)">
							</div>
														
						</div>

						<div class ="twelve wide column  bspacing8">
							<div id = "passcon2" class="ui input field logfield2">
								<input id = "pass2" type="password" onchange = "validatepass()" placeholder="Retype Password (Required)">
							</div>
														
						</div>

						<br>
						<br>
						<div class ="ten wide column  bspacing8">
							<center><button type="button" onclick = "checkinput()" name="submit" class="ui big button">
								Sign up
							</button></center>
						</div>


														
					</div>
			</form>
		</div>

		<div class="ui basic modal" id = "confirmmodal">
			<div class="ui icon header">
				<i class="help circle icon"></i>
		    		<div name = "modalmessage">Proceed?</div>
			</div>
			
			<div class="actions">
		    	<div class="ui basic cancel inverted button">
		      			No
		   		</div>
		    	<div onclick = "registeruser()" class="ui basic ok inverted button">
		      		Yes
		    	</div>
		  	</div>
		</div>

		<div class="ui basic modal" id = "completemodal">
			<div class="ui icon header">
				<i class="help circle icon"></i>
		    	<div name = "modalmessage">Registration Complete</div>
			</div>

			<div class = "content">
				<p><center>Thanks for joining! Please wait for the confirmation.</center></p>
			</div>
			
			<div class="actions">
		    	<div onclick = "window.location= '{{url('login')}}'" class="ui basic ok inverted button">
		      		OK
		    	</div>
		  	</div>
		</div>
	</div>

	<script type="text/javascript" src = "{{ URL::asset('js/formvalidation.js') }}"></script>

	<script type="text/javascript">
		function loadCModal() {
			$('#confirmmodal').modal('show');
		}//function loadModal() {

		function registeruser() {
			var data = {
				'name' : document.getElementsByName('fullname')[0].value,
				'username' : document.getElementsByName('username')[0].value,
				'status' : 0,
				'password' : document.getElementsByName('password')[0].value,
				'source' : 0,
				'_token' : '{{ Session::token() }}'
			};

			$.ajax({
				type: "POST",
				url: "{{url('register')}}",
				data: data,
			   	success : function() {
					$('#completemodal').modal('show');
			   		
			   	}//success : function() {
			});


		}//function registeruser() {
	</script>


@include('admin.admin_script')

@stop