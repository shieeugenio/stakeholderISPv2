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
						    		<td><input name="acsectorID" type="number" readonly="true" value="{{$sec->ID}}" ></td>
						    		<td><input name="acsectorName" type="text" value="{{$sec->sectorname}}"></td>
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

					
					<form action="insert_acsectors" method="post" >
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
								  <input type="text" name="acsectorName"  placeholder="e.g Name">
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="field">
									<textarea  name = "Desc" class = "areastyle" rows = "4" placeholder="Type here..."></textarea>
								</div>
							</div>												

							<div class = "twelve wide column bspacing2">
								<center>
								<button class="ui tiny button savebtnstyle"
								type="submit" 
			     				name="btn_Save" 
			     				value="SAVE" 
	     						onclick="return confirm('This record will saved!');">
									Save
								</button>

								<button class="ui tiny button" type="submit" 
								value="DISCARD" 
								name="btn_Discard" >
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

	</script>

@stop