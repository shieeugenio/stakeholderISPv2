@extends('module.maintenance')

@section('mtablesection')
	<div class = "acccon">
		<div class = "ui grid">
			<div class = "ten wide column">
				<div class = "tablepane">
					<div class = "mtitle">Secondary Unit/Office
						
					</div>

					<div class = "tablecon">
						<table id="datatable" class="ui celled table" cellspacing="0" width="100%">
						    <thead>
						    	<tr>
						            <th><center>Primary Office</center></th>
						            <th><center>Secondary Office Code</center></th>
						            <th><center>Secondary Office</center></th>
						            <th><center>Description</center></th>
						            <th><center>Address</center></th> 
						            <th><center>Contact No.</center></th> 
						        </tr>	
						    </thead>
						                   
						    <tbody>
						    	@foreach($suboffices as $key)
						    		<tr class = "trow" onclick = "loaddata({{$key->ID}})" id = "{{$key->ID}}">
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
								<label class = "formlabel">Secondary Office Code
									<span class = "asterisk">*</span>
								</label>
							</div>

							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Secondary Office
									<span class = "asterisk">*</span>
								</label>
							</div>

							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Description
								</label>
							</div>

							<div class = "twelve wide column bspacing6">
								<label class = "formlabel">Address</label>	
								<span class = "asterisk">*</span>
							</div>

							

							<div class = "twelve wide column bspacing7">
								<label class = "formlabel">Contact No.</label>
								<span class = "asterisk">*</span>
							</div>
						</div>	

						<input type="hidden" value="" name="subid"/>
						<div class = "fieldpane2">

							<div class = "twelve wide column bspacing2">
								<div class = "field">
									<select class="modified ui selection dropdown selectstyle2" name="office" id = "select">
									  <option class = "disabled">Select One</option>
									  
									  @foreach($offices as $sitem)

									  	<option value = '{{$sitem->ID}}'>{{$sitem->officename}} ({{$sitem->policeofficecode2}})</option>

									  @endforeach
									  	

									</select>
									
								</div>
								
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="ui input field formfield">
									<input type="text" name="code" placeholder="e.g. REG">
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
									<input type="text" name="street" placeholder="Street">
								</div>
							</div>
							
							<div class = "twelve wide column bspacing2">
								<div class="ui input field formfield">
									<input type="text" name="barangay" placeholder="Barangay">
								</div>
							</div>				

						
							<div class = "twelve wide column bspacing2">
								<div class="ui input field formfield">
									<input type="text" name="city" placeholder="City">
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="ui input field formfield">
									<input type="text" name="prov" placeholder="Province">
								</div>
							</div>		
						
							<div class = "twelve wide column bspacing2">
								<div class="ui input field formfield">
								  <input type='tel' value='' name='contact' placeholder="+639*********"/>
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
			   		$('#select').dropdown('set selected', data['police_office_id']);
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
				'office' : document.getElementsByName("office")[0].value,
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
				'office' : document.getElementsByName("office")[0].value,
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

	</script>

@stop