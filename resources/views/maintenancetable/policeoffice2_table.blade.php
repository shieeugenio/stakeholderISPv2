@extends('module.maintenance')

@section('mtablesection')
	<div class = "acccon">
		<div class = "ui grid">
			<div class = "ten wide column">
				<div class = "tablepane">
					<div class = "mtitle">Secondary Unit/Office
						<!--<div class = "ui icon button addbtn" title = "add">
							<i class="plus icon topmargin"></i>
										
						</div>-->
					</div>

					<div class = "tablecon">
						<table id="datatable" class="ui celled table" cellspacing="0" width="100%">
						    <thead>
						    	<tr>
						            <th><center>Primary Office</center></th>
						            <th><center>Secondary Office</center></th>
						            <th><center>Secondary OfficeCode</center></th>
						            <th><center>Description</center></th>
						            <th><center>Address</center></th> 
						            <th><center>Contact No.</center></th> 
						        </tr>	
						    </thead>
						                   
						    <tbody>
						    	@foreach($suboffices as $key)
						    		<tr>
						    			<td>{{$key->policeoffice->policeofficecode}}: {{$key->policeoffice->officename}}</td>
						    			<td>{{$key->officename}}</td>
						    			<td>{{$key->policeofficecode2}}</td>
						    			<td>{{$key->desc}}</td>
						    			<td>{{$key->street}}, {{$key->barangay}}, {{$key->city}}, {{$key->province}}</td>
						    			<td>{{$key->contactno}}</td>
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
								<label class = "formlabel">Sub Code
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

							

							<div class = "twelve wide column bspacing4">
								<label class = "formlabel">Contact No.</label>
								<span class = "asterisk">*</span>
							</div>
						</div>	

						<input type="hidden" value="" name="subid"/>
						<div class = "fieldpane2">

							<div class = "twelve wide column bspacing2">
								<select class="ui selection dropdown selectstyle2" name="office" id = "select">
									  <option value="- Select Category -" >- Select Primary Office -</option>
									  
									  <option value="saab">Deym</option>		

								</select>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
									<input type="text" name="name" placeholder="Sub Office Name">
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
									<input type="text" name="code" placeholder="Sub Office Code">
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
									<input type="text" name="desc" placeholder="Type here..">
								</div>
							</div>
							
							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
									<input type="text" name="street" placeholder="Street">
								</div>
							</div>
							
							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
									<input type="text" name="barangay" placeholder="Barangay">
								</div>
							</div>				

						
							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
									<input type="text" name="city" placeholder="City">
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
									<input type="text" name="prov" placeholder="Province">
								</div>
							</div>		
						
							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
								  <input type='tel' value='' name='contact' required placeholder="+639..." pattern = '[0-9]+'/>
								</div>
							</div>


							<div class = "twelve wide column bspacing2">
								<center><button type="submit" value="submit" name="submit" class="ui tiny button savebtnstyle">

									Save
								</button>
								<button class="ui tiny button">
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
		$('#m6').attr('class', 'item active');
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
				url: "{{url('maintenance/subpoliceview')}}",
				data: data,
			   	dataType: "JSON",
			   	success : function(data) {

			   		document.getElementsByName('subid')[0].value = data['ID'];
			   		document.getElementsByName('office')[0].value = data['police_office_id'];
			   		document.getElementsByName('name')[0].value = data['officename'];
			   		document.getElementsByName('code')[0].value = data['policeofficecode2'];
			   		document.getElementsByName('desc')[0].value = data['desc'];
			   		document.getElementsByName('street')[0].value = data['street'];
			   		document.getElementsByName('barangay')[0].value = data['barangay'];
			   		document.getElementsByName('city')[0].value = data['city'];
			   		document.getElementsByName('prov')[0].value = data['province'];
			   		document.getElementsByName('contact')[0].value = data['contactno'];

			   		console.log(data);

			   	}//success : function() {
			});


		}//function loaddata() {

		function addData() {
			var data = {
				'name' : document.getElementsByName("categname")[0].value,
				'code' : document.getElementsByName("categcode")[0].value,
				'desc' : document.getElementsByName("description")[0].value,
				'submit': document.getElementsByName("submit")[0].value,
				'_token' : '{{ Session::token() }}'
			};

			$.ajax({
				type: "POST",
				url: "{{url('confirm')}}",
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
				'catID' : document.getElementsByName('categid')[0].value,
				'name' : document.getElementsByName("categname")[0].value,
				'code' : document.getElementsByName("categcode")[0].value,
				'desc' : document.getElementsByName("description")[0].value,
				'submit': document.getElementsByName("submit")[0].value,
				'_token' : '{{ Session::token() }}'
			};

			console.log(data)

			$.ajax({
				type: "POST",
				url: "{{url('Maintenance/editCommit')}}",
				data: data,
			   	dataType: "JSON",
			   	success : function() {
			   		flag = 0;


			   	}//success : function() {
			});


		}//

	</script>

@stop