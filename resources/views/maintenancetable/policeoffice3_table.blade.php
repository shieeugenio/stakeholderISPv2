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

			
		</div>	

		<input type="hidden" value="" name="ID" id='ID'/>

			<div class = "fieldpane2">
				<div class = "twelve wide column bspacing2">
					<div class = "field">
						<select class="modified ui selection dropdown selectstyle2" name="select_officE1" id = "officE1"
						onchange="Select_Office(1,this.value)">
							<option value='- Select One -' selected>- Select One -</option>

							@foreach($poOne as $rs1)
					        <option value="{{$rs1->id}}">{{$rs1->UnitOfficeName}}</option>
							@endforeach												 

						</select>
									
					</div>
								
				</div>

				<div class = "twelve wide column bspacing2">
					<div class = "field">
						<select class="modified ui selection dropdown selectstyle2" name="select_officE2" id = "officE2" >
							
						<option selected='selected'>- Select One -</option>

						</select>
									
					</div>
								
				</div>

				<div class = "twelve wide column bspacing2">
					<div class="ui input field formfield">
						<input type="text" name="terName" id='terName' placeholder="e.g. Regional">
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
		        </tr>	
		    </thead>
					                   
		    <tbody>
		     @foreach ($pothree as $tri) 
			    <tr onclick = "loaddata({{$tri->id}})"  id = "{{$tri->id}}">
			       		<td><center>{{$tri->UnitOfficeName}}</center></td>
			       		<td><center>{{$tri->UnitOfficeSecondaryName}}</center></td>
			    		<td><center>{{$tri->UnitOfficeTertiaryName}}</center></td>
			    	</tr>  
					                               
			   @endforeach 
						    	
		    </tbody>

		</table>
						
	</div>

	<script type="text/javascript">

	$('#m7').attr('class', 'item active');
	var flag = 0;
		
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
				'office2' : $('#officE2').val(),
				'submit': document.getElementsByName("submit")[0].value,
				'callId' : 1,
				'_token' : '{{ Session::token() }}'
				};
				
				exec(data, func);
			}//if(confirm('Save?')) {
		}//add

		

		if(func == 3)
		{
			if(confirm('Update?')) {
				data = {
					'id' : document.getElementById('ID').value,
					'tername' : document.getElementsByName('terName')[0].value,
					'hasquart' : document.getElementsByName('hasQuart')[0].value,
					'office2' : $('#officE2').val(),
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

	function removeOption(selectbox){

			for(i=selectbox.options.length;i>0;i--){
				selectbox.remove(i);
			}
		}


	function Select_Office(func,id){

			removeOption(document.getElementById('officE2'));

				var data = {
					'id' : id,
					'callid' : 1,
					'_token' : '{{ Session::token() }}' 
				};
			
		
			$.ajax({
				type: "POST",
				url: "{{url('maintenance/selOffice')}}",
				data: data,
				dataType: "JSON",
				success:function(data){
					//console.log(data[0]['id']);

						
						selectbox = document.getElementById('officE2');
						for(var i =data.length-1;i>=0;i--){
							selectbox.options[i+1] = new Option(data[i]['UnitOfficeSecondaryName'],data[i]['id']);
						}//END FOR LOOP

					console.log(data);
				} //success : function
			});//ajax

		}//end


		function loaddata(id) {

			flag = 1;
			$('#' + id).attr('class', 'activerow');
			$('tr').not("[id = '" + id + "']").removeAttr('class');

			var data = {
				'id' : id,
				'_token' : '{{ Session::token() }}'
			};
			document.getElementById('dualbutton').value = 3;
			

			$.ajax({
				type: "POST",
				url: "{{url('maintenancetable/retrieveData')}}",
				data: data,
				dataType: "JSON",
			   	success : function(data) {

			   		document.getElementsByName('ID')[0].value = data[0]['id'];
			   		document.getElementsByName('terName')[0].value = data[0]['UnitOfficeTertiaryName'];   	
			   		document.getElementsByName('select_officE2')[0].value = data[0]['UnitOfficeSecondaryID'];
			   		alert($('#officE2').val());
			   			
					   		if (data[0]['UnitOfficeHasQuaternary'] == 'true')
							{								
							    document.getElementById('hasQuart').checked = true;
							  }
								else
								{
							    	$( "#hasQuart").prop('checked', false);
								  }
			   		// var dat =  $('#officE2').val();
			   		// var haha = document.getElementById('officE2').value = dat;
    				// document.getElementById("officE2").innerHTML = dat;
    				
			   		// alert(haha);
			   		// console.log(document.getElementById("officE2").options);
			   		
			   		Select_Office(flag,data[1]['id']); //display secondary office
					$('#officE1').dropdown('set selected', data[1]['id']); //office 1
			   		$('#officE2').dropdown('set selected', data[2]['id']); //office 2

			   	}//success : function() {
			});

		}//function loaddata() {


///Shie - tinanggal ko na yung description na field sa table at input
</script>


@stop

