@extends('module.maintenance')

@section('mtablesection')
	<!--<script type="text/javascript" src="{{ URL::asset('/js/acposition.js') }}"></script>-->
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
						            <th><center>Position Name</center></th>
						            <th><center>Position Code</center></th>
						            <th><center>Description</center></th> 
						        </tr>	
						    </thead>
						                   
						    <tbody>
						    	@foreach ( $positions as $position)
						    	<tr onclick = "CRUD({{$position->ID}},2)" id = "{{$position->ID}}">
							    	<td><center>{{$position->acpositionname}}</center></td>
							    	<td><center>{{$position->acpositioncode}}</center></td>
							    	<td><center>{{$position->desc}}</center></td>
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
								<label class = "formlabel">Position Code</label>
								<span class = "asterisk">*</span>
										
							</div>

							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Position Name</label>
								<span class = "asterisk">*</span>
										
							</div>

							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Description</label>
										
							</div>
								
						</div>

						<div class = "fieldpane">
								  <input type="hidden" id="ID" value=""/>
							<div class = "fieldpane">
							
							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
								  <input type="text" id="acpositioncode" name = "acpositioncode" pattern = "^(?=.*(\d|\w))[A-Za-z0-9 ]{1,10}" placeholder="e.g AC" required>
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
								  <input type="text" id = "acpositionname" name = "acpositionname" pattern = "^(?=.*(\d|\w))[A-Za-z0-9 ]{1,10}" placeholder="e.g AC" required>
								</div>
							</div>


							<div class = "twelve wide column bspacing2">
								<div class="field">
									<textarea  id = "description" name = "description" class = "areastyle" rows = "4" placeholder="Type here..."></textarea>
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<center><button id="dualbutton"
												name="submit" 
												class="ui tiny button savebtnstyle"
												value = '1';
												>

									Save
								</button>
								<button type = "reset" onclick = "resetflag()" class="ui tiny button">
									Cancel

								</button></center>
							</div>
								
						</div>
								
					
				</div>
			</div>
			
			</form>
		</div>
		
	</div>

<script type="text/javascript">
		
$('#m3').attr('class', 'item active');

function resetflag(){

	document.getElementById('dualbutton').value = 1;
	document.getElementById('ID').value = "";
	document.getElementsByName('acpositionname')[0].value = "";
	document.getElementsByName('acpositioncode')[0].value = "";
	document.getElementsByName('description')[0].value = "";
}

function CRUD(id, func){

	var data;

	if(func == 1)
	{
		
		data = {
		'acpname' : document.getElementsByName('acpositionname')[0].value,
		'acpcode' : document.getElementsByName('acpositioncode')[0].value,
		'acpdesc' : document.getElementsByName('description')[0].value,
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
		'id' : document.getElementById('ID').value,
		'acpname' : document.getElementsByName('acpositionname')[0].value,
		'acpcode' : document.getElementsByName('acpositioncode')[0].value,
		'acpdesc' : document.getElementsByName('description')[0].value,
		'submit': document.getElementsByName("submit")[0].value,
		'callId' : 3,
		'_token' : '{{ Session::token() }}'
		};
	}

	
	$.ajax({

		type: "POST",
		url: "{{url('maintenance/acpositioncrud')}}",
		data: data,
		dataype: "JSON",
		success:function(data){
			if(  func == 1 || func == 3){ 
				document.getElementById('ID').value = "";
				document.getElementsByName('acpositionname')[0].value = "";
				document.getElementsByName('acpositioncode')[0].value = "";
				document.getElementsByName('description')[0].value = "";

				window.location.href = "{{url('maintenance/advisoryposition')}}";

			}//if func
			else {
				document.getElementById('ID').value = data['ID'];
				document.getElementsByName('acpositionname')[0].value = data['acpositionname'];
				document.getElementsByName('acpositioncode')[0].value = data['acpositioncode'];
				document.getElementsByName('description')[0].value = data['desc'];
			}
		} 

	});
			
}
	</script>

@stop