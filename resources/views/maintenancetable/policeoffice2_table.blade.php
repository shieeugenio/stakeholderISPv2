@extends('module.maintenance')

@section('mtablesection')
	<div class = "acccon">
		<div class = "ui grid">
			<div class = "ten wide column">
				<div class = "tablepane">
					<div class = "mtitle">Secondary Unit/Office
						<!--<div class = "ui icon button addbtn" title = "add">
							<i class="plus icon topmargin"></i>
										
						</div>-->
					</div>

					<div class = "tablecon">
						<table id="datatable" class="ui celled table" cellspacing="0" width="100%">
						    <thead>
						    	<tr>
						            <th><center>Primary Office</center></th>
						            <th><center>Secondary Office</center></th>
						            <th><center>Secondary OfficeCode</center></th>
						            <th><center>Description</center></th>
						            <th><center>Address</center></th> 
						            <th><center>Contact No.</center></th> 
						        </tr>	
						    </thead>
						                   
						    <tbody>
						    	<tr>
						    		<td></td>
						    		<td></td>
						    		<td></td>
						    		<td></td>
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
								<label class = "formlabel">Secondary Office Code
									<span class = "asterisk">*</span>
								</label>
							</div>

							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Description
									<span class = "asterisk">*</span>
								</label>
							</div>

							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Address</label>	
								<span class = "asterisk">*</span>
							</div>

							

							<div class = "twelve wide column bspacing4">
								<label class = "formlabel">Contact No.</label>
								<span class = "asterisk">*</span>
							</div>
						</div>	

						<div class = "fieldpane2">

							<div class = "twelve wide column bspacing2">
								<select class="ui selection dropdown selectstyle2" id = "select">
									  <option value="- Select Category -" >- Select Primary Office -</option>
									  <option value="volvo">Fuss</option>
									  <option value="saab">Deym</option>		
								</select>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
									<input type="text" name="name" placeholder="Sub Office Name">
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
									<input type="text" name="code" placeholder="Sub Office Code">
								</div>
							</div>
							
							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
									<input type="text" name="street" placeholder="Street">
								</div>
							</div>
							
							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
									<input type="text" name="barangay" placeholder="Barangay">
								</div>
							</div>				

						
							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
									<input type="text" name="city" placeholder="City">
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
									<input type="text" name="prov" placeholder="Province">
								</div>
							</div>		
						
							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
								  <input type='tel' value='' name='contact' required placeholder="+639..." pattern = '[0-9]+'/>
								</div>
							</div>


							<div class = "twelve wide column bspacing2">
								<center><button type="submit" value="submit" name="submit" class="ui tiny button savebtnstyle">

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
		$('#m6').attr('class', 'item active');

	</script>

@stop