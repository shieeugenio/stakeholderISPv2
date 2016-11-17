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
						            <th><center>Category ID</center></th>
						            <th><center>Category Name</center></th> 
						        </tr>	
						    </thead>
						                   
						    <tbody>

						    	@foreach($category as $citem)
						    		<tr onclick = "loaddata(1, {{$citem->ID}})">
							    		<td>{{$citem->ID}}</td>
							    		<td>{{$citem->categoryname}}</td>
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
									
							<!--<div class = "twelve wide column bspacing">
								<label class = "formlabel">Category ID
									<span class = "asterisk">*</span>

								</label>

							</div>-->

							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Category Name</label>
								<span class = "asterisk">*</span>
										
							</div>
									
								
						</div>

						<input type="hidden" value="" name="categid"/>
						<div class = "fieldpane">
							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
								  <input type="text" name = "categname" pattern = "^(?=.*(\d|\w))[A-Za-z0-9 ]{5,35}" placeholder="e.g Name" required>
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<center><button name="submit" 
												class="ui tiny button savebtnstyle"
												onclick = "if (confirm('Save Record?')) { }">

									Save
								</button>
								<button class="ui tiny button" type = "res">
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
		$('#m1').attr('class', 'item active');
		var flag = 0;

		function loaddata(action, id) {

			var data = {
				'id' : id,
				'_token' : '{{ Session::token() }}'
			};

			$.ajax({
				type: "POST",
				url: "{{url('Maintenance/edit')}}",
				data: data,
			   	dataType: "JSON",
			   	success : function(data) {


			   		console.log(data);


			   	}//success : function() {
			});


		}//function loaddata() {

		function addData() {
			var data = {
				'name' : document.getElementsByName("categname")[0],
				'_token' : '{{ Session::token() }}'
			};
			$.ajax({
				type: "POST",
				url: "{{url('confirm')}}",
				data: data,
			   	dataType: "JSON",
			   	success : function() {


			   	}//success : function() {
			});

		}//function addData(){

		function editData() {
			var data = {
				'id' : document.getElementsByName('categid')[0];
				'name' : document.getElementsByName("categname")[0],
				'_token' : '{{ Session::token() }}'
			};
			$.ajax({
				type: "POST",
				url: "{{url('Maintenance/editCommit')}}",
				data: data,
			   	dataType: "JSON",
			   	success : function() {


			   	}//success : function() {
			});


		}//
	</script>

@stop