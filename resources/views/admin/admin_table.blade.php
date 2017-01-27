@extends('module.admin')
@section('mfillformsection')
	<form class = "ui form" id = "form">
							
		<div class = "labelpane">

			<div class = "twelve wide column bspacing">
				<label class = "formlabel">Full Name</label>
				<span class = "asterisk">*</span>
										
			</div>

			<div class = "twelve wide column bspacing">
				<label class = "formlabel">Username</label>
				<span class = "asterisk">*</span>
										
			</div>

			<div class = "twelve wide column bspacing">
				<label class = "formlabel">Password</label>
				<span class = "asterisk">*</span>
										
			</div>

			<div class = "twelve wide column bspacing6">
				<label class = "formlabel">Type</label>
				<span class = "asterisk">*</span>				
			</div>
		</div>
									
		<input type="hidden" value="" name="categid"/>
		<div class = "fieldpane">

			<div class = "twelve wide column bspacing2">
				<div  id = "fncon" class="ui input field formfield">
					<input type="text" onchange = "validatefullname()" name = "fullname" placeholder="e.g. Shiela Mae F. Eugenio">
				</div>
			</div>

			<div class = "twelve wide column bspacing2">
				<div id = "ucon" class="ui input field formfield">
					<input type="text" onchange = "checkusername()" name = "username" placeholder="e.g. bluishlemon (6-20 characters)">
				</div>
			</div>

			<div class = "twelve wide column bspacing2">
				<div id = "passcon1" class="ui input field formfield">
					<input id = "pass1" onchange = "validatepass()" type="password" name = "password" placeholder="e.g. bluishlemon (6-20 characters)">
				</div>
			</div>

			<div class = "twelve wide column bspacing2">
				<div id = "passcon2" class="ui input field formfield">
					<input id = "pass2"  onchange = "validatepass()" type="password" placeholder="Retype Password (Required)">
				</div>
			</div>

			<div class = "twelve wide column bspacing2">
				<div class="inline fields">
					<div class = "field">
						<div class = "ui radio checkbox">
							<input type="radio" value = '0' name = "admintype" checked/>
							<label>Superadmin</label>
							
						</div>
						
					</div>

					<div class = "field">
						<div class = "ui radio checkbox">
							<input type="radio" value = '1' name = "admintype"/>
							<label>Admin</label>
							
						</div>
						
					</div>
				</div>
			</div>

			<div class = "twelve wide column bspacing2">
				<center><button type = "button" name="submit"
						onclick="src = 0 ; checkinput()"
						class="ui tiny button submit savebtnstyle">
					Save
				</button>
		
				<button type="button" onclick = "$('#cancelmodal').modal('show');" class="ui tiny button">
					Cancel

				</button></center>
			</div>

			<div class = "twelve wide column bspacing2">
				<span class ="asterisk" name="message"></span>

				<span class ="asterisk" name="message"></span>
				
			</div>

								
		</div>
								
	</form>


@endsection

@section('mtablesection')
	<div class = "mtitle">Registration Request(s)</div>

	<div class = "tablecon">
		<table id="datatable" class="ui celled table" cellspacing="0" width="100%">
		    <thead>
		    	<tr>
		            <th><center>Full Name</center></th>
		            <th><center>Username</center></th>
		            <th><center>Type</center></th>
		            <th><center>Status</center></th>
		        </tr>	
		    </thead>
					                   
		    <tbody>
		    	@foreach($users as $result)
		    		<tr class = "trow">
			    		<td><center>{{$result->name}}</center></td>
			    		<td><center>{{$result->email}}</center></td>
			    		<td><center>
			    			@if($result->status == 0)
					    		N/A


			    			@elseif($result->status == 1 || $result->status == 2)
					    		

			    				@if($result->admintype == 0)

			    					Superadmin
			    				@else
			    					Admin
			    				@endif


			    			@endif
			    		</center></td>
			    		<td><center>
			    			@if($result->status == 0)
					    		<i class="ui yellow large wait icon"></i>


			    			@elseif($result->status == 1)
					    		<i class="ui green large checkmark icon"></i>

			    			@elseif($result->status == 2)
					    		<i class="ui red large remove icon"></i>


			    			@endif




			    		</center></td>
		    		</tr>




		    	@endforeach

		    </tbody>
		</table>						
	</div>

	<script type="text/javascript">
		var src = 0;

		function loadtoast(msg) {
			$("#myToast").showToast({
				message: msg,
				timeout: 2500
			});

		}//loadtoast

		function addUser() {
			var data = {
				'name' : document.getElementsByName('fullname')[0].value,
				'username' : document.getElementsByName('username')[0].value,
				'status' : 1,
				'admintype' : $("input[name='admintype']:checked").val(),
				'password' : document.getElementsByName('password')[0].value,
				'source' : 0,
				'_token' : '{{ Session::token() }}'
			};

			$.ajax({
				type: "POST",
				url: "{{url('register')}}",
				data: data,
			   	success : function() {
					loadtoast('Saved');
					
			   		
			   	}//success : function() {
			});

		console.log(data);

			/*setTimeout(function(){
				location.reload();
			}, 2600);*/
		}//function addUser() {
	</script>

@stop