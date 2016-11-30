@extends('module.maintenance')

@section('mtablesection')
	<div class = "acccon">
		<div class = "ui grid">
			<div class = "ten wide column">
				<div class = "tablepane">
					<div class = "mtitle">Advisory Council Sector</div>

					<div class = "tablecon">
						<table id="datatable" class="ui celled table" cellspacing="0" width="100%">
						    <thead>
						    	<tr>
						            <th><center>Code</center></th>
						            <th><center>Name</center></th>
						            <th><center>Description</center></th> 
						        </tr>	
						    </thead>
						                   
						    <tbody>
						    @foreach ($sector as $sec) 
						       	<tr onclick = "CRUD({{$sec->ID}},2)" id = "{{$sec->ID}}">
						    		<td><center>{{$sec->sectorcode}}</center></td>
						    		<td><center>{{$sec->sectorname}}</center></td>
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
						<div id="myToast" class="toast-popup"></div>
						<i class="write square big icon"></i>
					</div>

					
					<form class = "ui form" id = "form" action="javascript:CRUD(0,document.getElementById('dualbutton').value)">	
					
						<div class = "labelpane">
						<div class = "twelve wide column bspacing">
								<label class = "formlabel">Code
									<span class = "asterisk">*</span>
								</label>
						</div>

						<div class = "twelve wide column bspacing">
								<label class = "formlabel">Name
									<span class = "asterisk">*</span>
								</label>
						</div>

						<div class = "twelve wide column bspacing">
							<label class = "formlabel">Description
							</label>
						</div>
													
								
						</div>

						
						<div class = "fieldpane">
							<input name="acsectorID" id="acsectorID" type="hidden" value="">					

							<div class = "twelve wide column bspacing2">
								<div class="ui input field formfield">
								  <input type="text" name="acsectorCode"  id="acsectorCode" placeholder="e.g. LGU">
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="ui input field formfield">
								  <input type="text" name="acsectorName"  id="acsectorName" placeholder="e.g. Local Government Unit">
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="field">
									<textarea id="Desc" name = "Desc" class = "areastyle" rows = "4" placeholder="Type here..."></textarea>
								</div>
							</div>												

							<div class = "twelve wide column bspacing2">
								<center>
								<button class="ui tiny button submit savebtnstyle"
									id="dualbutton"
									type="submit"
									name="submit" 
									value = '1'; 
		     					>
									
									Save
								</button>

								<button class="ui tiny button"  
								type = "reset" onclick = "if(confirm('Cancel?')) { resetflag('Cancelled!')}" >
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
				'secname' : document.getElementsByName('acsectorName')[0].value,
				'seccode' : document.getElementsByName('acsectorCode')[0].value,
				'secdesc' : document.getElementsByName('Desc')[0].value,
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
			if(confirm('Save?')) {
				data = {
					'id' : document.getElementById('acsectorID').value,
					'seccode' : document.getElementsByName('acsectorCode')[0].value,
					'secname' : document.getElementsByName('acsectorName')[0].value,
					'secdesc' : document.getElementsByName('Desc')[0].value,
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
			url: "{{url('maintenancetable/acsectorCRUD')}}",
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
					$('#' + data['ID']).attr('class', 'activerow');
					$('tr').not("[id = '" + data['ID'] + "']").removeAttr('class');

					document.getElementById('acsectorID').value = data['ID'];
					document.getElementsByName('acsectorCode')[0].value = data['sectorcode'];
					document.getElementsByName('acsectorName')[0].value = data['sectorname'];
					document.getElementsByName('Desc')[0].value = data['desc'];
				}
			} 

		});
	}//function exec() {

</script>
	
@stop