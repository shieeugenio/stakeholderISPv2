@extends('module.maintenance')

@section('mtablesection')
	<div class = "acccon">
		<div class = "ui grid">

			<div class = "six wide column">
				<div class = "formpane">
					<div class = "mhead">
						<div id="myToast" class="toast-popup"></div>
						<i class="write square big icon"></i>
					</div>

					
					<form class = "ui form" id = "form" action="javascript:CRUD(0,document.getElementById('dualbutton').value)">
							
						<div class = "labelpane">

							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Name</label>
								<span class = "asterisk">*</span>		
							</div>


							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Description</label>	
							</div>
									
								
						</div>
						<div class = "fieldpane">
							<input type="hidden" id="ID" value=""/>

							<div class = "twelve wide column bspacing2">
								<div class="ui input field formfield">
									<input type="text" name="positionname" value = "" placeholder="e.g. Deputy Director"/>
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
												type="submit"
												class="ui tiny button submit savebtnstyle"
												value = '1';
												>

									Save
								</button>
								<button type = "reset" onclick = "if(confirm('Cancel?')) { resetflag('Cancelled!')}" class="ui tiny button">
									Cancel

								</button>
							</div>

								
						</div>
								
					</form>
					
				</div>
			</div>

			<div class = "ten wide column">
				<div class = "tablepane">
					<div class = "mtitle">PNP Position
					</div>

					<div class = "tablecon">
						<table id="datatable" class="ui celled table" cellspacing="0" width="100%">
						    <thead>
						    	<tr>
						            <th><center>Name</center></th>
						            <th><center>Description</center></th> 
						        </tr>	
						    </thead>
						                   
						    <tbody>
						    	@foreach ($positions as $position)
						    	<tr class = "trow" onclick="CRUD({{$position->ID}},2)" id = "{{$position->ID}}">
						    		<td><center>{{$position->positionname}}</center></td>
						    		<td><center>{{$position->desc}}</center></td>
						    	</tr>
						    	@endforeach
						    </tbody>

						</table>
						
					</div>
					
				</div>
			</div>
			
			
		</div>
		
	</div>

	<script type="text/javascript">
		$('#m9').attr('class', 'item active');

		function resetflag(msg)
		{
			document.getElementById('dualbutton').value = 1;
			
			$("#myToast").showToast({
				message: msg,
				timeout: 2500
			});
		}

		function CRUD(id,func)
		{

			
			var data;
			if(func == 1)
			{
				if(confirm('Save?')) {
					data = {
								'ppname' : document.getElementsByName('positionname')[0].value,
								'ppdesc' : document.getElementsByName('description')[0].value,
								'callId' : 1,
								'submit' : document.getElementsByName('submit')[0].value,
								'_token' : '{{ Session::token()}}'
						   };

					exec(data, func);

				}//if(confirm('Save?')) {

			}

			if(func == 2)
			{
				data = {
						'id' : id,
						'callId' : 2,
						'_token' : '{{ Session::token()}}'
						};
						   
				document.getElementById('dualbutton').value = 3;
				exec(data, func);

			}

			if(func == 3)
			{
				if(confirm('Save?')) {
					data = {
								'id' : document.getElementById('ID').value,
								'ppname' : document.getElementsByName('positionname')[0].value,
								'ppdesc' : document.getElementsByName('description')[0].value,
								'callId' : 3,
								'submit' : document.getElementsByName('submit')[0].value,
								'_token' : '{{ Session::token()}}'
						   };
					exec(data, func);

				}//if(confirm('Save?')) {
			}

		}

		function exec(data, func) {
			$.ajax({

					type: "POST",
					url : "{{url('maintenance/policepositioncrud')}}",
					data: data,
					datatype : "JSON",
					success: function(data){

						if( func == 1 || func == 3)
						{
							if(func == 1) {
								msg = "Saved!";
							} else {
								msg = "Updated!";
							}//if(func == 1) {

							resetflag(msg);
							setTimeout(function(){
								location.reload();
							}, 2600);
						}

						else
						{
							$('#' + data['ID']).attr('class', 'activerow');
							$('tr').not("[id = '" + data['ID'] + "']").removeAttr('class');

							document.getElementById('ID').value = data['ID'];
							document.getElementsByName('positionname')[0].value = data['positionname'];
							document.getElementsByName('description')[0].value = data['desc'];
							
							console.log(data);
						}

					}

				});
		}//

	</script>

@stop