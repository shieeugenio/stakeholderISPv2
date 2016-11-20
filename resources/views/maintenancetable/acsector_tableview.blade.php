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
						    @foreach ($stmt as $sec) 
						    <form method="POST" action="edit_acsectors">
							<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}">
							<input type="hidden" name="acsectorID" value="{{$sec->ID}}">
						    	<tr>
						       		<td id="{{$sec->ID}}" onclick="Row_Click(this.id);">
						       			<center>{{$sec->ID}}</center>
						       		</td>
						    		<td id="{{$sec->sectorname}}" onclick="Row_Click(this.id);">
						    			<CENTER>{{$sec->sectorname}}</CENTER>
						    		</td>
						    		<td id="{{$sec->desc}}" onclick="Row_Click(this.id);">
						    		<center>{{$sec->desc}}</center></td>
						    	</tr>  
						    </form>	                             
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

					@foreach($sector as $acsecID)
					<form action="edit_acsectors" method="post" >
					<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}">
							
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
							<input name="acsectorID" type="hidden">					

							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
								  <input type="text" name="acsectorName"  placeholder="e.g Name" value="{{$acsecID->sectorname}}">
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="field">
									<textarea  name = "Desc" class = "areastyle" rows = "4" placeholder="Type here..." value="{{$acsecID->desc}}"></textarea>
								</div>
							</div>												

							<div class = "twelve wide column bspacing2">
								<center>
								<button class="ui tiny button savebtnstyle"
								type="submit" 
			     				name="btn_Edit" value="Edit" 
	     						onclick="return confirm('This record will saved!');">
									Save
								</button>

								<button class="ui tiny button" type="submit" 
								name="btn_Discard" value="Delete" onclick="alert('No Deleteion of Item')" >
									Cancel
								</button>					
								</center>
							</div>								
						</div>
								
					</form>
					@endforeach
					
				</div>
			</div>
			
			
		</div>
		
	</div>

	<script type="text/javascript">
		$('#m4').attr('class', 'item active');

	</script>

	<script>
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

	</script>

@stop