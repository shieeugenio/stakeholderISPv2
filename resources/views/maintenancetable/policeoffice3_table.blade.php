@extends('module.maintenance')

@section('mfillformsection')
	<form class = "ui form" id = "form" action="javascript:CRUD(0,document.getElementById('dualbutton').value)">
							
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
				<span class = "asterisk">*</span>
			</div>

			<div class = "twelve wide column bspacing">
				<label class = "formlabel">Description
				</label>
			</div>

		</div>	

		<input type="hidden" value="" name="ID" id='ID'/>

			<div class = "fieldpane2">
				<div class = "twelve wide column bspacing2">
					<div class = "field">
						<select class="modified ui selection dropdown selectstyle2" name="select_officE1" id = "officE1"
						onchange="Select_Office();">
							<option value='- Select One -'>- Select One -</option>

							@foreach($poOne as $rs1)
					        <option value="{{$rs1->id}}">{{$rs1->UnitOfficeName}}</option>
							@endforeach
							 

						</select>
									
					</div>
								
				</div>

				<div class = "twelve wide column bspacing2">
					<div class = "field">
						<select class="modified ui selection dropdown selectstyle2" name="select_officE2" id = "officE2" onchange="Select_Office2();" disabled>

						<option value='- Select One -' >- Select One -</option>
													    		
						</select>
									
					</div>
								
				</div>

				<div class = "twelve wide column bspacing2">
					<div class="ui input field formfield">
						<input type="text" name="terName" id='terName' placeholder="e.g. Regional">
					</div>
				</div>

				<div class = "twelve wide column bspacing2">
					<div class="field">
						<textarea  id = "description" name = "desc" class = "areastyle" rows = "4" placeholder="Type here..."></textarea>
					</div>
				</div>
							
							
				<div class = "twelve wide column bspacing2">
				<div class="ui checkbox">
					<input type="checkbox" id='hasQuart' name='hasQuart' >
					<label class = "boollabel">Has Quarternary</label>
				</div>
				</div> <br>


				<div class = "twelve wide column bspacing2">
				<center><button class="ui tiny button submit savebtnstyle"
							id="dualbutton"
							type="submit"
							name="submit" 
							value = '1'>
									
							Save
					</button>

					<button class="ui tiny button"  
							type = "reset" onclick = "if(confirm('Cancel?')) { resetflag('Cancelled!')}" >
							Cancel
					</button></center>
			</div>	
			</div>	
							
								
		</form>

@endsection
@section('mtablesection')
	<div class = "mtitle">Tertiary Unit/Office</div>

	<div class = "tablecon">
		<table id="datatable" class="ui celled table" cellspacing="0" width="100%">
		    <thead>
		    	<tr>
		            <th><center>Primary Office</center></th>
		            <th><center>Secondary Office</center></th>
		            <th><center>Tertiary Office</center></th>
		            <th><center>Description</center></th>
		        </tr>	
		    </thead>
					                   
		    <tbody>
		     @foreach ($pothree as $tri) 
			       	<tr class = "trow" onclick = "CRUD({{$tri->id}},2)" 
			       	id = "{{$tri->id}}">
			       		<td><center></center></td>
			       		<td id="{{$tri->id}}">
			       		<center>{{$tri->UnitOfficeSecondaryID}}</center></td>
			    		<td id="{{$tri->id}}">
			    		<center>{{$tri->UnitOfficeTertiaryName}}</center></td>
			    		<td><center></center></td>
			    	</tr>  
					                               
			   @endforeach 
						    	
		    </tbody>

		</table>
						
	</div>

	<script type="text/javascript">

	$('#m7').attr('class', 'item active');
		
	function resetflag(msg){

		document.getElementById('dualbutton').value = 1;

		$("#myToast").showToast({
			message: msg,
			timeout: 2500
		});
				
	}


	function CRUD(id, func){

		var data;

		if(func == 1)
		{
			if(confirm('Save?')) {

			data = {
				'tername' : document.getElementsByName('terName')[0].value,
				'hasquart' : $('#hasQuart').is(":checked"),  
				'office2' : document.getElementsByName('select_officE2')[0].value,
				'submit': document.getElementsByName("submit")[0].value,
				'callId' : 1,
				'_token' : '{{ Session::token() }}'
				};
				
				exec(data, func);
			}//if(confirm('Save?')) {
		}//add

		if(func == 2)
		{
			data = {
			'id' : id,
			'callId' : 2,
			'_token' : '{{ Session::token() }}'};
			document.getElementById('dualbutton').value = 3;

			exec(data, func);
			

		}//view

		if(func == 3)
		{
			if(confirm('Update?')) {
				data = {
					'id' : document.getElementById('ID').value,
					'tername' : document.getElementsByName('terName')[0].value,
					'hasquart' : document.getElementsByName('hasQuart')[0].value,
					'office2' : document.getElementsByName('select_ officE2')[0].value,
					'submit': document.getElementsByName("submit")[0].value,
					'callId' : 3,
					'_token' : '{{ Session::token() }}'
					};

				exec(data, func);

			}//if(confirm('Save?')) {
		}//update

			
	}

	function exec(data, func) {
		$.ajax({

			type: "POST",
			url: "{{url('maintenancetable/PO3CRUD')}}",
			data: data,
			dataype: "JSON",
			success:function(data){
				if(  func == 1 || func == 3){ 
					
					if(func == 1) {
						msg = "Saved!";
					} else {
						msg = "Updated!";
					}//if(func == 1) {

					resetflag(msg);
					setTimeout(function(){
						location.reload();
					}, 2600);

				}//if func
				else {
					$('#' + data['id']).attr('class', 'activerow');
					$('tr').not("[id = '" + data['id'] + "']").removeAttr('class');

		document.getElementById('ID').value = data['id'];
		document.getElementsByName('terName')[0].value = data['UnitOfficeTertiaryName'];
		document.getElementsByName('hasQuart')[0].value = data['UnitOfficeHasQuaternary'];
		document.getElementById('officE2').value = data['UnitOfficeSecondaryID'];
				}
			} 

		});
	}//function exec() {


	
function Select_Office() {

	var $unit_offices_ID = document.getElementById('officE1').value;
	var dataString = "id=" + $unit_offices_ID;
	var token = '{{ Session::token() }}';
	
		$.ajax({

			type: "post",
			headers: {'X-CSRF-TOKEN': token},
			url: "selectOffice",
			data: dataString,
			datatype: 'json',
			cache: false,
			success: function(data){

				var parse_data = JSON.parse(data);
				document.getElementsByName('select_officE2').setAttribute('disabled', 'false');
				document.getElementsByName('select_officE2').disabled = false;

				document.getElementById('officE2').innerHTML = "<option>- Select One -</option>";

				for (var i = 0; i < parse_data.length; i = i + 2) {
						
					var j = i + 1;

					document.getElementById('officE2').innerHTML += "<option value=" + parse_data[i] + ">"+ parse_data[j] + "</option>"; 

				}
				
			}

		});

		return false;
	}// end office 1

	function Select_Office2() {

	var SelOfficE2 = document.getElementById('officE2').value;

		var dataString = "id=" + SelOfficE2;

		var token = '{{ Session::token() }}';
		
			$.ajax({

				type: "post",
				headers: {'X-CSRF-TOKEN': token},
				url: "selectOfficeSec",
				data: dataString,
				datatype: 'json',
				cache: false,
				success: function(data){

					alert('success!!!');

					}
					
			});

			return false;
		
	}//end office TWO



</script>


@stop