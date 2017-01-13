@extends('module.maintenance')

@section('mfillformsection')
	<form class = "ui form" id = "form" action="javascript:loadCModal()">
							
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
					<span class = "asterisk">*</span>
				</label>
			</div>

			<div class = "twelve wide column bspacing">
				<label class = "formlabel">Quarternary Office
					<span class = "asterisk">*</span>
				</label>
			</div>

		</div>	

		<input type="hidden" value="" name="ID"/>
		<div class = "fieldpane2">

			<div class = "twelve wide column bspacing2">
				<div class = "field">
					<select onchange="populate(1,this.value)" class="modified ui selection dropdown selectstyle2" name="office" id = "select1">
						<option class = "disabled" value="disitem" selected>Select One</option>
						@foreach ( $office as $office )
							<option value="{{$office->id}}">{{$office->UnitOfficeName}}</option>
						@endforeach
									  
									  <!-- POPULATE DROPDOWN OFFICE 1-->
									  	

					</select>
									
				</div>
								
			</div>

			<div class = "twelve wide column bspacing2">
				<div class = "field">
					<select  onchange="populate(2,this.value)" class="modified ui selection dropdown selectstyle2" name="office2" id = "select2">
						<option class = "disabled" value="disitem">Select One</option>
									 

					</select>
									
				</div>
								
			</div>

			<div class = "twelve wide column bspacing2">
				<div class = "field">
					<select class="modified ui selection dropdown selectstyle2" name="office3" id = "select3">
						<option class = "disabled" value="disitem">Select One</option>			 

					</select>
									
				</div>
								
			</div>

			<div class = "twelve wide column bspacing5">
				<div class="ui input field formfield">
					<input type="text" id="name" name="name" placeholder="e.g. Regional">
				</div>
			</div>

			<div class = "twelve wide column bspacing2">
				<div class="field">
					<textarea  id = "description" name = "desc" class = "areastyle" rows = "4" placeholder="Type here..."></textarea>
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

@endsection

@section('mtablesection')
	<div class = "mtitle">Quarternary Unit/Office
						
	</div>

	<div class = "tablecon">
		<table id="datatable" class="ui celled table" cellspacing="0" width="100%">
		    <thead>
		    	<tr>
		            <th><center>Primary Office</center></th>
		            <th><center>Secondary Office</center></th>
		            <th><center>Tertiary Office</center></th>
		            <th><center>Quarternary Office</center></th>
						       
				</tr>	
		    </thead>
		    @foreach ( $office4 as $offices)
		    	<tr onclick="loaddata({{$offices->id}})" id="{{$offices->id}}">
		    		
		    		
		    		<td><center>{{$offices->UnitOfficeName}}</center></td>
		    		<td><center>{{$offices->UnitOfficeSecondaryName}}</center></td>
		    		<td><center>{{$offices->UnitOfficeTertiaryName}}</center></td>
		    		<td><center>{{$offices->UnitOfficeQuaternaryName}}</center></td>
		    		
		    		
		    	</tr>
		    @endforeach                   
		    <tbody>
						    	

		    </tbody>
		</table>
					
	</div>

	<script type="text/javascript">
		$('#m6').attr('class', 'item active');
		var flag = 0;

		function populate(func,id){

			if(func == 1){

				$("select [id='select2'] option").not("[value='disitem']").remove();
				$("select [id='select3'] option").not("[value='disitem']").remove();

				var data = {
					'id' : id,
					'callid' : 1,
					'_token' : '{{ Session::token() }}' 
				};
			}

			if(func == 2){

				/*if(document.getElementById('select2').options[0].selected == true){
					return;
				} else{
					removeOption(document.getElementById('select3'));
				}//if*/
				$("select [id='select3'] option").not("[value='disitem']").remove();

				var data = {
					'id' : id,
					'callid' : 2,
					'_token' : '{{ Session::token() }}' 
				};
			}

			$.ajax({
				type: "POST",
				url: "{{url('maintenance/populate')}}",
				data: data,
				dataType: "JSON",
				success:function(data){
					if(func == 1){
						for(var i= 0 ; i < data.length; i++){
							populatedropdown(data[i]['id'], 'office2', data[i]['UnitOfficeSecondaryName']);
							

						}//for
						
					}//populate secondary

					if(func == 2){
						for(var i= 0 ; i < data.length; i++){
							populatedropdown(data[i]['id'], 'office3', data[i]['UnitOfficeTertiaryName']);
						}//for
						
					}//populate tertiary
				} //success : function
			});//ajax

		}//populatetertiary

		function controlaction() {
			
			if(flag == 1) {
					editData();

			} else if(flag == 0) {
				addData();

			}//if(flag == 1) {
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
			console.log(data);

			$.ajax({
				type: "POST",
				url: "{{url('maintenance/policefourview')}}",
				data: data,
				dataType: "JSON",
			   	success : function(data) {

			   		console.log(data);
			   		document.getElementsByName('ID')[0].value = data[0]['id'];
			   		document.getElementsByName('name')[0].value = data[0]['UnitOfficeQuaternaryName'];

			   		
			   		// $('#select2').val(data[2]['id']).change();
			   		populate(flag,data[1]['id']); //display secondary office
			   		populate(2,data[2]['id']);

					$('#select1').dropdown('set selected', data[1]['id']); //office 1
			   		
			   		//$('#select2').val(data[2]['id']).change();
			   		$('#select2').dropdown('set selected', data[2]['id']); //office 2
			   		console.log(document.getElementById('select2').options);
			   		//populate(2,data[2]['id']); // display tertiary office
			   		//$('#select3').val(data[3]['id']).change();
			   		$('#select3').dropdown('set selected', data[3]['id']); // office 3


			   		
			  //  		for(var k=0, opt = document.getElementById('select1').options; k < opt.length ;++k)
			  //  		{
					// 		console.log(opt, opt.length ,opt[k].value,k);
					// 			if( opt[k].value === data[1]['id'])
					//    			{
					//    				alert(opt[k].value);
					//    			   	document.getElementById('select1').options[k].selected = true; 
					//    			   	alert(opt[k].value);
					//    			   	break;
					//    			}
							
					// }

			  //  		for(var k=0, opt = document.getElementById('select2').options; k < opt.length ;++k)
			  //  		{
					// 		console.log(opt, opt.length ,opt[k].value,k);
					// 			if( opt[k].value == data[1]['id'])
					//    			{
					//    				alert(opt[k].value);
					//    			   	document.getElementById('select2').options[k].selected = true; 
					//    			   	break;
					//    			}
							
					// }

					// populate(flag,data[2]['id']); // display tertiary
			   		
					// for(var k=0, opt = document.getElementById('select3').options; k < opt.length ;++k)
			  //  		{
					// 		console.log(opt, opt.length ,opt[k].value,k);
					// 			if( opt[k].value == data[1]['id'])
					//    			{
					//    				alert(opt[k].value);
					//    			   	document.getElementById('select3').options[k].selected = true; 
					//    			   	break;
					//    			}
							
					// }

			   		console.log(document.getElementById('select2').selected);
			   		console.log(document.getElementById('select3').selected);
					
			   	}//success : function() {
			});

		}//function loaddata() {

		function addData() {
			var data = {
				'name' : $('#name').val(),
				'office3' : $('#select3').val(),
				'desc' : document.getElementsByName("desc")[0].value,
				'submit': document.getElementsByName("submit")[0].value,
				'_token' : '{{ Session::token() }}'
			};
			
			$.ajax({
				type: "POST",
				url: "{{url('maintenance/add')}}",
				data: data,
				dataType: "JSON",
			   	success : function() {
			   		resetflag('Saved!');

			   	}
			});

			setTimeout(function(){
				location.reload();
			}, 2600);
			

		}//function addData(){

		function editData() {

			//console.log($('#select3').val());
			var data = {
				'subID' : document.getElementsByName('ID')[0].value,
				'office3' : $('#select3').val(),
				'name' : document.getElementsByName("name")[0].value,
				'desc' : document.getElementsByName("desc")[0].value,
				'submit': document.getElementsByName("submit")[0].value,
				'_token' : '{{ Session::token() }}'
			};

			$.ajax({
				type: "POST",
				url: "{{url('maintenance/editpolicefour')}}",
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
	//POPULATE OFFICE 3 DROPDOWN
	//REVISE $('#select2').dropdown('set selected', data['police_office_id']); LINE CHANGE DATA SOURCE
	//REVISE $('#select3').dropdown('set selected', data['police_office_id']); LINE CHANGE DATA SOURCE
	//CONTROLLER


	</script>

@stop
