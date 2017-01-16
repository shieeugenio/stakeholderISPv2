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
				<label class = "formlabel">Quaternary Office
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
						<!--  @foreach ($office2 as $office2)
							<option value="{{$office2->id}}">{{$office2->UnitOfficeSecondaryName}}</option>
						@endforeach
						 -->
					</select>
									
				</div>
								
			</div>

			<div class = "twelve wide column bspacing2">
				<div class = "field">
					<select class="modified ui selection dropdown selectstyle2" name="office3" id = "select3">
						<option class = "disabled" value="disitem">Select One</option>			 
					<!-- 	@foreach ($office3 as $office3)
							<option value="{{$office3->id}}">{{$office3->UnitOfficeTertiaryName}}</option>
						@endforeach
						 -->					
					</select>
									
				</div>
								
			</div>

			<div class = "twelve wide column bspacing2">
				<div class="ui input field formfield">
					<input type="text" id="name" name="name" placeholder="e.g. Regional">
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
	<div class = "mtitle">Quaternary Unit/Office
						
	</div>

	<div class = "tablecon">
		<table id="datatable" class="ui celled table" cellspacing="0" width="100%">
		    <thead>
		    	<tr>
		            <th><center>Primary Office</center></th>
		            <th><center>Secondary Office</center></th>
		            <th><center>Tertiary Office</center></th>
		            <th><center>Quaternary Office</center></th>
						       
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
		$('.ui.dropdown').dropdown();

		var flag = 0;

		function removeOption(selectbox){

			for(i=selectbox.options.length;i>0;i--){
				selectbox.remove(i);
			}

		}


		function populate(func,id){

			if(func == 1){

				// $("select [id='select2'] option").not("[value='disitem']").remove();
				// $("select [id='select3'] option").not("[value='disitem']").remove();
				removeOption(document.getElementById('select2'));
				removeOption(document.getElementById('select3'));
				$('#select2').dropdown('restore defaults');
				$('#select3').dropdown('restore defaults');

				var data = {
					'id' : id,
					'callid' : 1,
					'_token' : '{{ Session::token() }}' 
				};
			}

			if(func == 2){
//				$("select [id='select3'] option").not("[value='disitem']").remove();
				removeOption(document.getElementById('select3'));
				$('#select3').dropdown('restore defaults');
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

		function validate(){

			if(document.getElementById('select2').options[0].selected == true){

					alert('Select Office');
					return;
				}
		}

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

			   		document.getElementsByName('ID')[0].value = data[0]['id'];
			   		document.getElementsByName('name')[0].value = data[0]['UnitOfficeQuaternaryName'];

			   		
			   		// $('#select2').val(data[2]['id']).change();
			   		//populate(flag,data[1]['id']);
			   		
			   		$('#select1').dropdown("set exactly", data[1]['id']); //office 1
			   		console.log(document.getElementById('select2').options);
			   		// $('#select2').dropdown("set selected", data[2]['id']);
			   		// //populate(flag+1,data[2]['id']);
			   		// $('#select3').dropdown("set selected", data[3]['id']);

			   		setTimeout(function(){
					    changeValue('#select2',data[2]['id']);
					},1500);
					
					setTimeout(function(){
				   		changeValue('#select3',data[3]['id']);
					},3500);
					// $('#select2').dropdown('refresh');
					// if (data[2]['id'])
					// setTimeout(function () {
					// $('#select2').dropdown("set selected", data[2]['id']);
					// }, 1);
			   		
			  //  		 //office 2
			  //  		$('#select3').dropdown('refresh');
					// if (data[3]['id'])
					// setTimeout(function () {
					// $('#select3').dropdown("set selected", data[3]['id']);
					// }, 1);

			   		//populate(2,data[2]['id']);
			   		//$('#select3').dropdown("set selected", data[3]['id']); // office 3


			   		
			  //  		for(var k=0, opt = document.getElementById('select1').options; k < opt.length ;++k)
			  //  		{
					// 		alert(opt, opt.length ,opt[k].value,k,opt[k].value,data[1]['id']);
					// 			if( opt[k].value == data[1]['id'])
					//    			{
					//    				document.getElementById('select1').options[k].selected = true; 
					//    			   	break;
					//    			}
							
					// }

			  //  		for(var k=0, opt = document.getElementById('select2').options; k < opt.length ;++k)
			  //  		{
					// 		console.log(document.getElementById('select1').options, opt.length ,opt[k].value,k);
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
					//validate();
			   		
			   	}//success : function() {
			});

		}//function loaddata() {

		function changeValue(dropdownID,value){
 			$('.ui.dropdown').has(dropdownID).dropdown('set selected',value);
		}

		function addData() {
			var data = {
				'name' : $('#name').val(),
				'office3' : $('#select3').val(),
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
