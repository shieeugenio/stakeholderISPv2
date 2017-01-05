@extends('module.maintenance')

@section('mfillformsection')
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
				<label class = "formlabel">Description
				</label>
			</div>

							
		</div>	

		<input type="hidden" value="" name="subid"/>
			<div class = "fieldpane2">
				<div class = "twelve wide column bspacing2">
					<div class = "field">
						<select class="modified ui selection dropdown selectstyle2" name="office" id = "select">
							<option class = "disabled">Select One</option>
									  
								@foreach($offices as $sitem)

									<option value = '{{$sitem->ID}}'>{{$sitem->officename}}</option>

								@endforeach
									  	

						</select>
									
					</div>
								
				</div>

				<div class = "twelve wide column bspacing2">
					<div class="ui input field formfield">
						<input type="text" name="code" placeholder="e.g. PRO">
					</div>
				</div>
	
				<div class = "twelve wide column bspacing5">
					<div class="ui input field formfield">
						<input type="text" name="name" placeholder="e.g. Police Regional Office">
					</div>
				</div>

				<div class = "twelve wide column bspacing2">
					<div class="field">
						<textarea  id = "description" name = "desc" class = "areastyle" rows = "4" placeholder="Type here..."></textarea>
					</div>
				</div>
						
				<div class = "twelve wide column bspacing2">
					<div class="ui checkbox">
						<input type="checkbox" name="haster">
						<label class = "boollabel">Has Tertiary</label>
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
	<div class = "mtitle">Secondary Unit/Office</div>

	<div class = "tablecon">
		<table id="datatable" class="ui celled table" cellspacing="0" width="100%">
		    <thead>
		    	<tr>
		            <th><center>Primary Office</center></th>
		            <th><center>Secondary Office</center></th>
		            <th><center>Description</center></th>
		        </tr>	
		    </thead>
					                   
		    <tbody>
		    	@foreach($suboffices as $key)
		    		<tr class = "trow" onclick = "loaddata({{$key->ID}})" id = "{{$key->ID}}">
		    			<td>{{$key->policeoffice->officename}}</td>
			    			<td>{{$key->officename}}</td>
			    			<td>{{$key->desc}}</td>
			    			
			 	@endforeach

		    </tbody>

		</table>
						
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
			   		document.getElementsByName('desc')[0].value = data['desc'];

			   	}//success : function() {
			});


		}//function loaddata() {

		function addData() {
			var data = {
				'name' : document.getElementsByName("name")[0].value,
				'office' : document.getElementsByName("office")[0].value,
				'desc' : document.getElementsByName("desc")[0].value,
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
				'desc' : document.getElementsByName("desc")[0].value,
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