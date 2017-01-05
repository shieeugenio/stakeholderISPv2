@extends('module.maintenance')

@section('mtablesection')
	<div class = "acccon">
		<div class = "ui grid">

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

							<div class = "twelve wide column bspacing10">
								<label class = "formlabel">Description
								</label>

							</div>

							<div class = "twelve wide column bspacing3">
								<label class = "formlabel">Has Secondary</label>								
							</div>
								
						</div>

						<input type="hidden" value="" name="officeid"/>
						<div class = "fieldpane">

							<div class = "twelve wide column bspacing2">
								<div class="ui input field formfield">
									<input type="text" name="code" placeholder="e.g. DST">
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="ui input field formfield">
									<input type="text" name="name" placeholder="e.g. D-Staff">
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
									<textarea class = "areastyle" name="desc" rows = "4" placeholder="Type here..."></textarea>
								</div>
							</div>
							
							<div class = "twelve wide column bspacing2">
								<div class="ui input field formfield">
									<input type="checkbox" name="throughput" checked="checked">
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

	// ADJUST BACK-END (CONTROLLER) REMOVE STAFF
	</script>

@stop