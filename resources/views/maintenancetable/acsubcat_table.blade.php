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
						    		<th><center>Subcategory</center></th>
									<th><center>Category</center></th>
										            
						        </tr>	
						    </thead>
						                   
						    <tbody>
						    	<tr>
						    		<td></td>
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
								<label class = "formlabel">Sub Category
									<span class = "asterisk">*</span>

								</label>

							</div>

							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Category</label>
										
							</div>

																
								
						</div>

						<div class = "fieldpane">
							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
								  <input type="text" placeholder="e.g Regional">
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<select class="browser-default">
								  <option value="- Select Category -" >- Select Category -</option>
								  <option value="volvo">Fuss</option>
								  <option value="saab">Deym</option>
								  
								</select>
							</div>
							

							<div class = "twelve wide column bspacing2">
								<center><button class="ui tiny button savebtnstyle" type="submit" name="submit" value="add">
								

									Save
								</button>
								<button class="ui tiny button">
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
		$('#m2').attr('class', 'item active');

	</script>

@stop