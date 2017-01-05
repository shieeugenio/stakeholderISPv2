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

					
					<form class = "ui form" id = "form" action="javascript:controlaction()">
							
						<div class = "labelpane2">
									
							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Primary Office
									<span class = "asterisk">*</span>
								</label>
							</div>

							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Secondary Office
									<span class = "asterisk">*</span>
								</label>
							</div>


							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Tertiary Office
								</label>
							</div>

							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Description
								</label>
							</div>

							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Has Quarternary</label>								
							</div>

						</div>	

						<input type="hidden" value="" name="subid"/>
						<div class = "fieldpane2">

							<div class = "twelve wide column bspacing2">
								<div class = "field">
									<select class="modified ui selection dropdown selectstyle2" name="office" id = "select1">
									  <option class = "disabled">Select One</option>
									  
									   <!-- POPULATE DROPDOWN OFFICE 1-->
									  	

									</select>
									
								</div>
								
							</div>

							<div class = "twelve wide column bspacing2">
								<div class = "field">
									<select class="modified ui selection dropdown selectstyle2" name="office2" id = "select2">
									  <option class = "disabled">Select One</option>
									  <!-- POPULATE DROPDOWN OFFICE 2-->
									 

									</select>
									
								</div>
								
							</div>

							<div class = "twelve wide column bspacing5">
								<div class="ui input field formfield">
									<input type="text" name="name" placeholder="e.g. Regional">
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="field">
									<textarea  id = "description" name = "desc" class = "areastyle" rows = "4" placeholder="Type here..."></textarea>
								</div>
							</div>
							
							
							<div class = "twelve wide column bspacing2">
								<div class="ui input field formfield">
									<input type="checkbox" name="throughput" checked="checked">
								</div>
							</div>


							<div class = "twelve wide column bspacing2">
								<center><button type = "submit" name="submit" 
												class="ui tiny button submit savebtnstyle"
										>

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
					<div class = "mtitle">Secondary Unit/Office
						
					</div>

					<div class = "tablecon">
						<table id="datatable" class="ui celled table" cellspacing="0" width="100%">
						    <thead>
						    	<tr>
						            <th><center>Primary Office</center></th>
						            <th><center>Secondary Office</center></th>
						        	<th><center>Tertiary Office Code</center></th>
						            <th><center>Tertiary Office</center></th>
						            <th><center>Description</center></th>
						            <th><center>Address</center></th> 
						            <th><center>Contact No.</center></th> 
						        </tr>	
						    </thead>
						                   
						    <tbody>
						    	

						    </tbody>

						</table>
						
					</div>
					
				</div>
			</div>
			
			
		</div>
		
	</div>

	<script type="text/javascript">
		$('#m6').attr('class', 'item active');
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
				url: "{{url('maintenance/subpoliceview')}}",
				data: data,
			   	dataType: "JSON",
			   	success : function(data) {

			   		console.log(data);
			   		document.getElementsByName('subid')[0].value = data['ID'];
			   		$('#select1').dropdown('set selected', data['police_office_id']); //office 1
			   		$('#select2').dropdown('set selected', data['police_office_id']); // office 2

			   		document.getElementsByName('name')[0].value = data['officename'];
			   		document.getElementsByName('code')[0].value = data['policeofficecode2'];
			   		document.getElementsByName('desc')[0].value = data['desc'];
			   		document.getElementsByName('street')[0].value = data['street'];
			   		document.getElementsByName('barangay')[0].value = data['barangay'];
			   		document.getElementsByName('city')[0].value = data['city'];
			   		document.getElementsByName('prov')[0].value = data['province'];
			   		document.getElementsByName('contact')[0].value = data['contactno'];

			   	}//success : function() {
			});


		}//function loaddata() {

		function addData() {
			var data = {
				'name' : document.getElementsByName("name")[0].value,
				'office2' : document.getElementsByName("office2")[0].value,
				'code' : document.getElementsByName("code")[0].value,
				'desc' : document.getElementsByName("desc")[0].value,
				'street' : document.getElementsByName("street")[0].value,
				'barangay' : document.getElementsByName("barangay")[0].value,
				'city' : document.getElementsByName("city")[0].value,
				'province' : document.getElementsByName("prov")[0].value,
				'contact' : document.getElementsByName("contact")[0].value,
				'submit': document.getElementsByName("submit")[0].value,
				'_token' : '{{ Session::token() }}'
			};

			$.ajax({
				type: "POST",
				url: "{{url('confirmpolice')}}",
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
				'subID' : document.getElementsByName('subid')[0].value,
				'office2' : document.getElementsByName("office2")[0].value,
				'name' : document.getElementsByName("name")[0].value,
				'code' : document.getElementsByName("code")[0].value,
				'desc' : document.getElementsByName("desc")[0].value,
				'street' : document.getElementsByName("street")[0].value,
				'barangay' : document.getElementsByName("barangay")[0].value,
				'city' : document.getElementsByName("city")[0].value,
				'province' : document.getElementsByName("prov")[0].value,
				'contact' : document.getElementsByName("contact")[0].value,
				'submit': document.getElementsByName("submit")[0].value,
				'_token' : '{{ Session::token() }}'
			};

			$.ajax({
				type: "POST",
				url: "{{url('maintenance/editsubpolice')}}",
				data: data,
			   	success : function() {
			   		resetflag('Updated!');


			   	}//success : function() {
			});

			setTimeout(function(){
				location.reload();
			}, 2600);


		}//

	//POPULATE OFFICE 1 DROPDOWN
	//POPULATE OFFICE 2 DROPDOWN
	//REVISE $('#select2').dropdown('set selected', data['police_office_id']); LINE CHANGE DATA SOURCE
	//CONTROLLER

	
	</script>

@stop