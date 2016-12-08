@extends('module.maintenance')

@section('mtablesection')
	<div class = "acccon">
		<div class = "ui grid">
			<div class = "ten wide column">
				<div class = "tablepane">
					<div class = "mtitle">Primary Unit/Office
					</div>

					<div class = "tablecon">
						<table id="datatable" class="ui celled table" cellspacing="0" width="100%">
						    <thead>
						    	<tr>
						            <th><center>Code</center></th>
						            <th><center>Name</center></th>
						            <th><center>Staff</center></th>
						            <th><center>Description</center></th>
						            <th><center>Address</center></th> 
						            <th><center>Contact No.</center></th> 
						        </tr>	
						    </thead>
						                   
						    <tbody>
						    	@for($ctr = 0 ; $ctr < sizeof($offices) ; $ctr++)
						    		<tr class = "trow" onclick = "loaddata({{$offices[$ctr]->ID}})" id = "{{$offices[$ctr]->ID}}">
							    		<td><center>{{$offices[$ctr]->policeofficecode}}</center></td>
							    		<td><center>{{$offices[$ctr]->officename}}</center></td>
							    		<td><center>{{$staffdesc[$ctr]}}</center></td>
							    		<td><center>{{$offices[$ctr]->desc}}</center></td>
							    		<td><center>{{$offices[$ctr]->police_address}}</center></td>
							    		<td><center>{{$offices[$ctr]->contactno}}</center></td>

							    	</tr>
						    	@endfor

						    </tbody>

						</table>
						
					</div>
					
				</div>
			</div>

			<div class = "six wide column">
				<div class = "formpane">
					<div class = "mhead">
						<div id="myToast" class="toast-popup"></div>
						<i class="write square big icon"></i>
					</div>

					
					<form class = "ui form" id = "form" action = "javascript:controlaction()">
							
						<div class = "labelpane">
							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Code
								</label>

							</div>
									
							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Name
									<span class = "asterisk">*</span>
								</label>

							</div>

							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Office Staff
									<span class = "asterisk">*</span>
								</label>

							</div>							

							<div class = "twelve wide column bspacing10">
								<label class = "formlabel">Description
								</label>

							</div>

							<div class = "twelve wide column bspacing3">
								<label class = "formlabel">Address</label>
								<span class = "asterisk">*</span>										
							</div>


							<div class = "twelve wide column bspacing3">
								<label class = "formlabel">Contact No.</label>
								<span class = "asterisk">*</span>		
							</div>
									
								
						</div>

						<input type="hidden" value="" name="officeid"/>
						<div class = "fieldpane">

							<div class = "twelve wide column bspacing2">
								<div class="ui input field formfield">
									<input type="text" name="code" placeholder="e.g. PRO">
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="ui input field formfield">
									<input type="text" name="name" placeholder="e.g. Police Regional Office">
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="ui radio">
									<input type="radio" name="staff" value="0" checked="" tabindex="0" class="hidden">
									<label>D-staff</label>
								</div>
								<div class="ui radio">
									<input type="radio" name="staff" value="1"  tabindex="0" class="hidden">
									<label>P-staff</label>
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
									<textarea class = "areastyle" name="desc" rows = "4" placeholder="Type here..."></textarea>
								</div>
							</div>
							
							<div class = "twelve wide column bspacing2">
								<div class="field">
									<textarea class = "areastyle" name="address" rows = "4" placeholder="Street Address, Barangay, City"></textarea>
								</div>
							</div>
						
							<div class = "twelve wide column bspacing2">
								<div class="ui input field formfield">
								  <input type='tel' value='' name='contact' placeholder="+639********"/>
								</div>
							</div>
						</div>

							<div class = "twelve wide column bspacing2">
								<center><button type = "submit" name="submit" 
												class="ui tiny button submit savebtnstyle">

									Save
								</button>
								<button type = "reset" onclick = "if(confirm('Cancel?')) { resetflag('Cancelled!')}" class="ui tiny button">
									Cancel

								</button></center>
							</div>

								
						</div>
								
					</form>
					
				</div>
			</div>
			
			
		</div>
		
	</div>

	<script type="text/javascript">
		$('#m5').attr('class', 'item active');
		var flag = 0;

		function controlaction() {

			if(confirm('Save?')) {
				if(flag == 1) {
					editData();

				} else if(flag == 0) {
					addData();

				}//if(flag == 1) {
			}//if(confirm('Save?')) {
		}//function controlaction() {

		function resetflag(msg) {
			flag = 0;

			$("#myToast").showToast({
				message: msg,
				timeout: 2500
			});

		}//function resetflag() {

		function loaddata(id) {

			flag = 1;
			$('#' + id).attr('class', 'activerow');
			$('tr').not("[id = '" + id + "']").removeAttr('class');

			var data = {
				'id' : id,
				'_token' : '{{ Session::token() }}'
			};

			$.ajax({
				type: "POST",
				url: "{{url('maintenance/editpoliceview')}}",
				data: data,
			   	dataType: "JSON",
			   	success : function(data) {

			   		document.getElementsByName('officeid')[0].value = data['ID'];
			   		document.getElementsByName('name')[0].value = data['officename'];
			   		document.getElementsByName('code')[0].value = data['policeofficecode'];
			   		$("input[name='staff'][value='" + data['policestaff'] + "']").prop("checked", 'true');
			   		document.getElementsByName('desc')[0].value = data['desc'];
			   		document.getElementsByName('address')[0].value = data['police_address'];
			   		document.getElementsByName('contact')[0].value = data['contactno'];

			   	}//success : function() {
			});


		}//function loaddata() {

		function addData() {
			var data = {
				'name' : document.getElementsByName("name")[0].value,
				'code' : document.getElementsByName("code")[0].value,
				'staff' : $("input[name='staff']:checked").val(),
				'desc' : document.getElementsByName("desc")[0].value,
				'add' : document.getElementsByName("address")[0].value,
				'contact' : document.getElementsByName("contact")[0].value,
				'submit': document.getElementsByName("submit")[0].value,
				'_token' : '{{ Session::token() }}'
			};

			$.ajax({
				type: "POST",
				url: "{{url('buttonsPoliceOffice')}}",
				data: data,
			   	success : function() {

			   		resetflag('Saved!');
			   	}
			});

			setTimeout(function(){
				location.reload();
			}, 2600);

		}//function addData(){

		function editData() {
			var data = {
				'policeID' : document.getElementsByName('officeid')[0].value,
				'name' : document.getElementsByName("name")[0].value,
				'code' : document.getElementsByName("code")[0].value,
				'staff' : $("input[name='staff']:checked").val(),
				'desc' : document.getElementsByName("desc")[0].value,
				'add' : document.getElementsByName("address")[0].value,
				'contact' : document.getElementsByName("contact")[0].value,
				'submit': document.getElementsByName("submit")[0].value,
				'_token' : '{{ Session::token() }}'
			};

			$.ajax({
				type: "POST",
				url: "{{url('maintenance/editpolice')}}",
				data: data,
			   	success : function() {
			   		resetflag('Updated!');

			   	}//success : function() {
			});

			setTimeout(function(){
				location.reload();
			}, 2600);


		}//

	</script>

@stop