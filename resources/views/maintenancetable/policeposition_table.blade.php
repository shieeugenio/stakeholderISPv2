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
						            <th><center>Position Name</center></th> 
						        </tr>	
						    </thead>
						                   
						    <tbody>
						    	<tr>
						    		<td><input type="hidden" name="policepositionid" value=""/></td>
						    		<td></td>
						    	</tr>


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

					
					<form>
							
						<div class = "labelpane">
									
							<div class = "twelve wide column bspacing">
								<label class = "formlabel">ID
									<span class = "asterisk">*</span>

								</label>

							</div>

							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Police Position</label>
								<span class = "asterisk">*</span>		
							</div>
									
								
						</div>

						<div class = "fieldpane">
							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
								  <input type="text" id="ID" value="" disabled/>
								</div>
							</div>
							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
									<input type="text" name="positionname" value=""/>
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<center><button  type="submit" name="storeposition" class="ui tiny button savebtnstyle">

									Save
								</button>
								<button  type="submit" name="cancel" value="Cancel" class="ui tiny button">
									Cancel

								</button></center>
							</div>

								
						</div>
								
					</form>
					
				</div>
			</div>
			
			
		</div>
		
	</div>

	<script type="text/javascript">
		$('#m7').attr('class', 'item active');

	</script>

@stop