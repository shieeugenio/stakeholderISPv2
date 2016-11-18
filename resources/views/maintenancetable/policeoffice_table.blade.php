@extends('module.maintenance')

@section('mtablesection')
	<div class = "acccon">
		<div class = "ui grid">
			<div class = "ten wide column">
				<div class = "tablepane">
					<div class = "mtitle">Primary Unit/Office
						<!--<div class = "ui icon button addbtn" title = "add">
							<i class="plus icon topmargin"></i>
										
						</div>-->
					</div>

					<div class = "tablecon">
						<table id="datatable" class="ui celled table" cellspacing="0" width="100%">
						    <thead>
						    	<tr>
						            <th><center>Office Name</center></th>
						            <th><center>Address</center></th> 
						            <th><center>Contact No.</center></th> 
						        </tr>	
						    </thead>
						                   
						    <tbody>
						    	<tr>
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
							
						<div class = "labelpane">
									
							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Office Name
									<span class = "asterisk">*</span>
								</label>

							</div>

							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Address</label>
								<span class = "asterisk">*</span>										
							</div>


							<div class = "twelve wide column bspacing3">
								<label class = "formlabel">Contact No</label>
								<span class = "asterisk">*</span>		
							</div>
									
								
						</div>

						<div class = "fieldpane">
							<div class = "twelve wide column bspacing2">
								<select class="ui selection dropdown selectstyle" id = "select">
								  <option value="- Select Office NAME -" >- Select Office Name-</option>
								  <option value="volvo">Fuss</option>
								  <option value="saab">Deym</option>
								  
								</select>
								</div>
							
							<div class = "twelve wide column bspacing2">
								<div class="field">
									<textarea class = "areastyle" rows = "4" placeholder="Type here..."></textarea>
								</div>
							</div>
						
							
							
							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
								  <input type='tel' value='' name='contact' required placeholder="+639..." pattern = '[0-9]+'/>
								</div>
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
		$('#m5').attr('class', 'item active');

	</script>

@stop