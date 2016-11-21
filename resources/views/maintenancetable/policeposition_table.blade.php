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
						            <th><center>Position Code</center></th>
						            <th><center>Position Name</center></th>
						            <th><center>Description</center></th> 
						        </tr>	
						    </thead>
						                   
						    <tbody>
						    	@foreach ($positions as $position)
						    	<tr onclick="CRUD({{$position->ID}},2)" id = "{{$position->ID}}">
						    		<td><center>{{$position->policepositioncode}}</center></td>
						    		<td><center>{{$position->positionname}}</center></td>
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
								<label class = "formlabel">Position Code
									<span class = "asterisk">*</span>

								</label>

							</div>

							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Position Name</label>
								<span class = "asterisk">*</span>		
							</div>


							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Description</label>
								<span class = "asterisk">*</span>		
							</div>
									
								
						</div>
						<div class = "fieldpane">
								  <input type="hidden" id="ID" value=""/>
							

						<div class = "fieldpane">
							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
								  <input type="text" name="positioncode" value="" />
								</div>
							</div>
							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
									<input type="text" name="positionname" value=""/>
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="field">
									<textarea  id = "description" name = "description" class = "areastyle" rows = "4" placeholder="Type here..."></textarea>
								</div>
							</div>



							<div class = "twelve wide column bspacing2">
								<button id="dualbutton"
												name="submit" 
												class="ui tiny button savebtnstyle"
												value = '1';
												>

									Save
								</button>
								<button type = "reset" onclick = "resetflag()" class="ui tiny button">
									Cancel

								</button>
							</div>

								
						</div>
								
					</form>
					
				</div>
			</div>
			
			
		</div>
		
	</div>

	<script type="text/javascript">
		$('#m7').attr('class', 'item active');

		function resetflag()
		{
			document.getElementById('dualbutton').value = 1;
			document.getElementById('ID').value = "";
			document.getElementsByName('positionname')[0].value = "";
			document.getElementsByName('positioncode')[0].value = "";
			document.getElementsByName('description')[0].value = "";
		}

		function CRUD(id,func)
		{
			var data;
			if(func == 1)
			{
				data = {
							'ppname' : document.getElementsByName('positionname')[0].value,
							'ppcode' : document.getElementsByName('positioncode')[0].value,
							'ppdesc' : document.getElementsByName('description')[0].value,
							'callId' : 1,
							'submit' : document.getElementsByName('submit')[0].value,
							'_token' : '{{ Session::token()}}'
					   };
			}

			if(func == 2)
			{
				data = {
							'id' : id,
							'callId' : 2,
							'_token' : '{{ Session::token()}}'
					   };
					   
				document.getElementById('dualbutton').value = 3;
			}

			if(func == 3)
			{
				data = {
							'id' : document.getElementById('ID').value,
							'ppname' : document.getElementsByName('positionname')[0].value,
							'ppcode' : document.getElementsByName('positioncode')[0].value,
							'ppdesc' : document.getElementsByName('description')[0].value,
							'callId' : 3,
							'submit' : document.getElementsByName('submit')[0].value,
							'_token' : '{{ Session::token()}}'
					   };	
			}

		

		$.ajax({

			type: "POST",
			url : "{{url('maintenancetable/policepositioncrud')}}",
			data: data,
			datatype : "JSON",
			success: function(data){

				if( func == 1 || func == 3)
				{
					document.getElementById('ID').value = "";
					document.getElementsByName('positionname')[0].value = "";
					document.getElementsByName('positioncode')[0].value = "";
					document.getElementsByName('description')[0].value = "";
				
					window.location.href = "{{url('maintenance/policeposition')}}";
				}

				else
				{
					document.getElementById('ID').value = data['ID'];
					document.getElementsByName('positionname')[0].value = data['positionname'];
					document.getElementsByName('positioncode')[0].value = data['policepositioncode'];
					document.getElementsByName('description')[0].value = data['desc'];
					
					console.log(data);
				}

			}

		});

	}

	</script>

@stop