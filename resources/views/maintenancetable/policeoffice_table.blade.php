@extends('module.maintenance')

@section('mfillformsection')
	<form class = "ui form" id = "form" action = "javascript:controlaction()" onsubmit="validationCheckbox(this)">
							
		<div class = "labelpane">
								
			<div class = "twelve wide column bspacing">
				<label class = "formlabel">Name
					<span class = "asterisk">*</span>
				</label>
			</div>					

			<div class = "twelve wide column bspacing10">
				<label class = "formlabel">Description</label>

			</div>
								
		</div>

		<input type="hidden" value="" name="officeid"/>
		<div class = "fieldpane">

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
				<div class="ui checkbox">
					<input type="checkbox" name="hassec"  id="hasfield">
					<label class = "boollabel">Has Secondary</label>
				</div>
			</div> <br>

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

@endsection

@section('mtablesection')
	<div class = "mtitle">Primary Unit/Office</div>

	<div class = "tablecon">
		<table id="datatable" class="ui celled table" cellspacing="0" width="100%">
		    <thead>
		    	<tr>
		            <th><center>Name</center></th>
		            <th><center>Has Field</center></th>
		        </tr>	
		    </thead>
						                   
		    <tbody>
		    	@for($ctr = 0 ; $ctr < sizeof($offices) ; $ctr++)
		    		<tr class = "trow" onclick = "loaddata({{$offices[$ctr]->id}})" id = "{{$offices[$ctr]->id}}">
			    		<td><center>{{$offices[$ctr]->UnitOfficeName}}</center></td>
			    		<td><center>{{$offices[$ctr]->UnitOfficeHasField}}</center></td>


			    	</tr>
				@endfor

			</tbody>

		</table>
						
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

			   		document.getElementsByName('officeid')[0].value = data['id'];
			   		document.getElementsByName('name')[0].value = data['UnitOfficeName'];
			   		document.getElementsByName('hassec')[0].value = data['UnitOfficeHasField'];

			   	}//success : function() {
			});


		}//function loaddata() {

		function addData() {
			var data = {
				'name' : document.getElementsByName("name")[0].value,
				'hassec' : document.getElementsByName("hassec")[0].value,
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
				'hassec' : document.getElementsByName("hassec")[0].value,
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

		function validationCheckbox(hascheck){
			if(hascheck.hassec.checked == true){
				document.getElementById('hasfield').value = "True"
			}
			else{
				document.getElementById('hasfield').value = "False"	
			}

		}

	// ADJUST BACK-END (CONTROLLER) REMOVE STAFF
	</script>

@stop