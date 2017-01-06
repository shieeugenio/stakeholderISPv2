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
						<select class="modified ui selection dropdown selectstyle2" name="office" id = "select1">
							<option class = "disabled">Select One</option>
									  
									   <!-- POPULATE DROPDOWN OFFICE 1-->
									  	

						</select>
									
					</div>
								
				</div>

				<div class = "twelve wide column bspacing2">
					<div class = "field">
						<select class="modified ui selection dropdown selectstyle2" name="officE2" id = "officE2">
						<option value="- Select One -">- Select One -</option>

						@foreach($potwo as $rs1)
				        <option name='officE2' id='officE2' value="{{$rs1->id}}">{{$rs1->UnitOfficeSecondaryName}}</option>
						@endforeach
				    		
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
					<input type="checkbox" id='hasQuart' name='hasQuart'
					value='false' >
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
			       	<tr class = "trow" onclick = "CRUD({{$tri->id}},2)" id = "{{$tri->id}}">
			       		<td><center></center></td>
			       		<td><center>{{$tri->UnitOfficeSecondaryID}}</center></td>
			    		<td><center>{{$tri->UnitOfficeTertiaryName}}</center></td>
			    		<td><center></center></td>
			    	</tr>  
					                               
			   @endforeach 
						    	
		    </tbody>

		</table>
						
	</div>

	<script type="text/javascript">
	$('#m4').attr('class', 'item active');

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
				'hasquart' : document.getElementsByName('hasQuart')[0].value,
				'office2' : document.getElementsByName('officE2')[0].value,
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
					'office2' : document.getElementsByName('officE2')[0].value,
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

</script>


@stop