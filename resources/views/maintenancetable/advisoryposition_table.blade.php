@extends('module.maintenance')

@section('mtablesection')
	<script type="text/javascript" src="{{ URL::asset('/js/acposition.js') }}"></script>
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
						    	<tr onclick = "" id = "">
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

					
					<form>
							
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
								  <input type="text" name = "acpositioncode" pattern = "^(?=.*(\d|\w))[A-Za-z0-9 ]{1,10}" placeholder="e.g AC" required>
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
								  <input type="text" name = "acpositionname" pattern = "^(?=.*(\d|\w))[A-Za-z0-9 ]{1,10}" placeholder="e.g AC" required>
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="field">
									<textarea  name = "description" class = "areastyle" rows = "4" placeholder="Type here..."></textarea>
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<center><button name="submit" 
												class="ui tiny button savebtnstyle"
												value = 1;
												onclick = "CRUD(0,this.value">

									Save
								</button>
								<button type = "reset" onclick = "resetflag()"class="ui tiny button">
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
		$('#m3').attr('class', 'item active');

		$.ajax({
			type: 'POST',
			url: 'acpositioninsert',
			data:'_token = <?php echo csrf_token() ?>',

			success:function(data){

			}


		});//ajax
	</script>

@stop