function validatepass() {
		var pass1 = $('#pass1').val();
		var pass2 = $('#pass2').val();

		if(pass2 != "") {
			if(pass1 !== pass2) {
				$('#passcon1').attr('class', 'ui input field error logfield2');
				$('#passcon2').attr('class', 'ui input field error logfield2');
				document.getElementsByName('message')[1].innerHTML = "PASSWORDS DO NOT MATCH";

			} else if (pass1 === pass2){
				$('#passcon1').attr('class', 'ui input field logfield2');
				$('#passcon2').attr('class', 'ui input field logfield2');
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
		   			$('#ucon').attr('class', 'ui input field field logfield2');
					document.getElementsByName('message')[1].innerHTML = "";
		   		} else {
		   			$('#ucon').attr('class', 'ui input field field error logfield2');
					document.getElementsByName('message')[1].innerHTML = "USERNAME ALREADY EXISTS";

		   		}//if

		   		//console.log(result);
		   	}//success : function() {
		});

	}//function checkusername() {