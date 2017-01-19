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

			<form action="javascript:loadModal()" method="POST" class = "ui form">
				<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" type="text">
												
					<div class = "logcontent">

						<span class ="message" name="message"></span>

						<span class ="message" name="message"></span>

						<div class ="twelve wide column  bspacing8">
							<div class="ui input logfield2">
								<input type="text" name = "name" placeholder="Full Name (FN MI LN EXT)">
							</div>
												
						</div>

						<div class ="twelve wide column  bspacing8">
							<div id = "ucon" class="ui input logfield2">
								<input onchange = "checkusername()" type="text" name = "username" placeholder="Username">
							</div>
												
						</div>

						<div class ="twelve wide column  bspacing8">
							<div id = "passcon1" class="ui input logfield2">
								<input id = "pass1" type="password" onchange = "validatepass()" placeholder="Password">
							</div>
														
						</div>

						<div class ="twelve wide column  bspacing8">
							<div id = "passcon2" class="ui input logfield2">
								<input id = "pass2" type="password" onchange = "validatepass()" name = "password" placeholder="Retype Password">
							</div>
														
						</div>

						<br>
						<br>
						<div class ="ten wide column  bspacing8">
							<center><button type="submit" name="submit" class="ui big button">
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
				<p>Thanks for joining! Please wait for the confirmation.</p>
			</div>
			
			<div class="actions">
		    	<div onclick = "window.location('{{url('/')}}')" class="ui basic ok inverted button">
		      		OK
		    	</div>
		  	</div>
		</div>
	</div>

	<script type="text/javascript">

		function validatepass() {
			var pass1 = $('#pass1').val();
			var pass2 = $('#pass2').val();

			if(pass2 != "") {
				if(pass1 !== pass2) {
					$('#passcon1').attr('class', 'ui input error logfield2');
					$('#passcon2').attr('class', 'ui input error logfield2');
					document.getElementsByName('message')[1].innerHTML = "PASSWORDS DO NOT MATCH";

				} else if (pass1 === pass2){
					$('#passcon1').attr('class', 'ui input logfield2');
					$('#passcon2').attr('class', 'ui input logfield2');
					document.getElementsByName('message')[1].innerHTML = "";


				}//if(pass1 ==! pass2) {
			}//if

		}//function validatepass() {

		function checkusername() {
			var data = { 
					'username' : $("input[name='username']").val(),
					'_token' : '{{ Session::token() }}'
				};

			$.ajax({
				type: "POST",
				url: "{{url('checkusername')}}",
				data: data,
			   	dataType: "JSON",
			   	success : function(result) {

			   		if(result == 0) {
			   			$('#ucon').attr('class', 'ui input logfield2');
						document.getElementsByName('message')[1].innerHTML = "";

			   		} else {
			   			$('#ucon').attr('class', 'ui input error logfield2');
						document.getElementsByName('message')[1].innerHTML = "USERNAME ALREADY EXISTS";

			   		}//if

			   		//console.log(result);
			   	}//success : function() {
			});

		}//function checkusername() {

		function loadModal() {
			$('#confirmmodal').modal('show');
		}//function loadModal() {

		function registeruser() {
			var data = {
				'name' : document.getElementsByName('name')[0].value,
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
			   	dataType: "JSON",
			   	success : function() {
					$('#completemodal').modal('show');
			   		
			   	}//success : function() {
			});


		}//function registeruser() {
	</script>



@stop