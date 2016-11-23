@extends('module.maintenance')

@section('mtablesection')
	<div class = "acccon">
		<div class = "ui grid">
			<div class = "ten wide column">
				<div class = "tablepane">
					<div class = "mtitle">Primary Unit/Office
						<!--<div class = "ui icon button addbtn" title = "add">
							<i class="plus icon topmargin"></i>
										
						</div>-->
					</div>

					<div class = "tablecon">
						<table id="datatable" class="ui celled table" cellspacing="0" width="100%">
						    <thead>
						    	<tr>
						            <th><center>Office Name</center></th>
						            <th><center>Office Code</center></th>
						            <th><center>Description</center></th>
						            <th><center>Address</center></th> 
						            <th><center>Contact No.</center></th> 
						        </tr>	
						    </thead>
						                   
						    <tbody>
						    	@foreach($offices as $citem)
						    		<tr onclick = "loaddata({{$citem->ID}})" id = "{{$citem->ID}}">
							    		<td><center>{{$citem->officename}}</center></td>
							    		<td><center>{{$citem->policeofficecode}}</center></td>
							    		<td><center>{{$citem->desc}}</center></td>
							    		<td><center>{{$citem->police_address}}</center></td>
							    		<td><center>{{$citem->contactno}}</center></td>

							    	</tr>
						    	@endforeach

						    </tbody>

						</table>
						
					</div>
					
				</div>
			</div>

			<div class = "six wide column">
				<div class = "formpane">
					<div class = "mhead">
						<i class="write square big icon"></i>
					</div>

					
					<form class = "ui form" id = "form" action = "javascript:controlaction()">
							
						<div class = "labelpane">
									
							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Office Name
									<span class = "asterisk">*</span>
								</label>

							</div>

							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Office Code
									<span class = "asterisk">*</span>
								</label>

							</div>

							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Office Staff
									<span class = "asterisk">*</span>
								</label>

							</div>							

							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Description
								</label>

							</div>

							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Address</label>
								<span class = "asterisk">*</span>										
							</div>


							<div class = "twelve wide column bspacing3">
								<label class = "formlabel">Contact No</label>
								<span class = "asterisk">*</span>		
							</div>
									
								
						</div>

						<input type="hidden" value="" name="officeid"/>
						<div class = "fieldpane">
							<div class = "twelve wide column bspacing2">
								<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
									<input type="text" name="name" placeholder="Office Name">
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
									<input type="text" name="code" placeholder="Office Code">
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="ui radio">
									<input type="radio" name="staff" value="D-staff" checked="" tabindex="0" class="hidden">
									<label>D-staff</label>
								</div>
								<div class="ui radio">
									<input type="radio" name="staff" value="P-staff"  tabindex="0" class="hidden">
									<label>P-staff</label>
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
									<input type="text" name="desc" placeholder="Description">
								</div>
							</div>
							
							<div class = "twelve wide column bspacing2">
								<div class="field">
									<textarea class = "areastyle" name="address" rows = "4" placeholder="Type here..."></textarea>
								</div>
							</div>
						
							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
								  <input type='tel' value='' name='contact' required placeholder="+639..." pattern = '[0-9]+'/>
								</div>
							</div>
						</div>

							<div class = "twelve wide column bspacing2">
								<center><button type="submit" value="submit" name="submit" class="ui tiny button savebtnstyle">

									Save
								</button>
								<button type="reset" onclick="resetflag()" class="ui tiny button">
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
			console.log(flag);

			if(flag == 1) {
				editData();

			} else if(flag == 0) {
				addData();

			}//if(flag == 1) {
		}//function controlaction() {

		function resetflag() {
			flag = 0;

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

			   		console.log(data);

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
			   	dataType: "JSON",
			   	success : function() {
			   		flag = 0;

			   		$(document).ready(function(){
						$("#toast").showToast({
						    message: 'Saved!',
						    timeout: 2500
						});
					});


			   	}
			});

		}//function addData(){

		function editData() {
			var data = {
				'policeID' : document.getElementsByName('categid')[0].value,
				'name' : document.getElementsByName("categname")[0].value,
				'code' : document.getElementsByName("categcode")[0].value,
				'desc' : document.getElementsByName("description")[0].value,
				'add' : document.getElementsByName("address")[0].value,
				'contact' : document.getElementsByName("contact")[0].value,
				'submit': document.getElementsByName("submit")[0].value,
				'_token' : '{{ Session::token() }}'
			};

			console.log(data)

			$.ajax({
				type: "POST",
				url: "{{url('maintenance/editpolice')}}",
				data: data,
			   	dataType: "JSON",
			   	success : function() {
			   		flag = 0;


			   	}//success : function() {
			});


		}//

	</script>

@stop