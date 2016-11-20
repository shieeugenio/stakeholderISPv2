@extends('module.maintenance')

@section('mtablesection')
	<div class = "acccon">
		<div class = "ui grid">
			<div class = "ten wide column">
				<div class = "tablepane">
					<div class = "mtitle">Advisory Council Category
						<!--<div class = "ui icon button addbtn" title = "add">
							<i class="plus icon topmargin"></i>
										
						</div>-->
					</div>

					<div class = "tablecon">
						<table id="datatable" class="ui celled table" cellspacing="0" width="100%">
						    <thead>
						    	<tr>
						            <th><center>ID</center></th>
						            <th><center>Sector Name</center></th> 
						            <th><center>Description</center></th> 
						        </tr>	
						    </thead>
						                   
						    <tbody>
						    @foreach ($sector as $sec) 
						       	<tr onclick = "CRUD({{$sec->ID}},2)" id = "{{$sec->ID}}">
						       		<td><center>{{$sec->ID}}</center></td>
						    		<td><CENTER>{{$sec->sectorname}}</CENTER></td>
						    		<td><center>{{$sec->desc}}</center></td>
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

					
					<form action="javascript:CRUD(0,document.getElementById('dualbutton').value)">	
					
							
						<div class = "labelpane">
						<div class = "twelve wide column bspacing">
								<label class = "formlabel">Sector Name
									<span class = "asterisk">*</span>
								</label>
						</div>

						<div class = "twelve wide column bspacing">
							<label class = "formlabel">Description
								<span class = "asterisk">*</span>
							</label>
						</div>
													
								
						</div>

						
						<div class = "fieldpane">
							<input name="acsectorID" id="acsectorID" type="hidden" value="">					

							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
								  <input type="text" name="acsectorName"  id="acsectorName" placeholder="e.g Sector Name" pattern = "^(?=.*(\d|\w))[A-Za-z0-9 ]{1,10}">
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="field">
									<textarea id="Desc" name = "Desc" class = "areastyle" rows = "4" placeholder="Type here..."></textarea>
								</div>
							</div>												

							<div class = "twelve wide column bspacing2">
								<center>
								<button class="ui tiny button savebtnstyle"
								id="dualbutton"
								name="submit" 
								value = '1'; 
	     						onclick="return confirm('This record will saved!');">
									Save
								</button>

								<button class="ui tiny button" type="submit" 
								type = "reset" onclick = "resetflag()" >
									Cancel
								</button>					
								</center>
							</div>								
						</div>
								
					</form>
					
				</div>
			</div>
			
			
		</div>
		
	</div>


	<script type="text/javascript">
		$('#m4').attr('class', 'item active');

	function resetflag(){

	document.getElementById('dualbutton').value = 1;
	document.getElementById('acsectorID')[0].value = "";
	document.getElementsByName('acsectorName')[0].value = "";
	document.getElementsByName('Desc')[0].value = "";
	
}

function CRUD(id, func){

	var data;

	if(func == 1)
	{
		
		data = {
		'secname' : document.getElementsByName('acsectorName')[0].value,
		'secdesc' : document.getElementsByName('Desc')[0].value,
		'submit': document.getElementsByName("submit")[0].value,
		'callId' : 1,
		'_token' : '{{ Session::token() }}'
		};
	}//add

	if(func == 2)
	{
		data = {
		'id' : id,
		'callId' : 2,
		'_token' : '{{ Session::token() }}'};
		document.getElementById('dualbutton').value = 3;
	}//update

	if(func == 3)
	{
		data = {
		'id' : document.getElementById('acsectorID').value,
		'secname' : document.getElementsByName('acsectorName')[0].value,
		'secdesc' : document.getElementsByName('Desc')[0].value,
		'submit': document.getElementsByName("submit")[0].value,
		'callId' : 3,
		'_token' : '{{ Session::token() }}'
		};
	}

	
	$.ajax({

		type: "POST",
		url: "{{url('maintenancetable/acsectorCRUD')}}",
		data: data,
		dataype: "JSON",
		success:function(data){
			if(  func == 1 || func == 3){ 
				alert("dsfds");
				document.getElementById('acsectorID').value = "";
				document.getElementsByName('acsectorName')[0].value = "";
				document.getElementsByName('Desc')[0].value = "";

				window.location.href = "{{url('maintenance/acsector')}}";

			}//if func
			else {
				document.getElementById('acsectorID').value = data['ID'];
				document.getElementsByName('acsectorName')[0].value = data['sectorname'];
				document.getElementsByName('Desc')[0].value = data['desc'];
			}
		} 

	});
			
}	

	</script>

<!--	<script type="text/javascript">
	function Row_Click(id) {

			var ID = id;			
			var dataString = "ID=" + ID;
			var token = document.getElementById('csrf-token').value;
			
				$.ajax({

					type: "post",
					headers: {'X-CSRF-TOKEN': token},
					url: "ajax_editacsector",
					data: dataString,
					datatype: 'JSON',
					cache: false,
					success: function(data){

						window.location.href = "ajax_session_acsector";
						
					}

				});

				return false;

		}//End Of Row

	</script> -->

	
@stop