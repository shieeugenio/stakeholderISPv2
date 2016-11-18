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
						    		<tr onclick = "loaddata({{$citem->ID}})">
							    		<td><center>{{$citem->ID}}</center></td>
							    		<td><center>{{$citem->categoryname}}</center></td>
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

					
					<form action = "javascript:controlaction()" method="POST">
							
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
												onclick = "return confirm('Save Record?')">

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
		$('#m1').attr('class', 'item active');
		var flag = 0;

		function controlaction() {

			if(flag == 1) {
				editData();

			} else if(flag == 0) {
				addData();

			}//if(flag == 1) {
		}//function controlaction() {

		function resetflag() {
			flag = 0;

		}//function resetflag() {

		function loaddata(id) {

			flag = 1;

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
				'name' : document.getElementsByName("categname")[0].value,
				'submit': document.getElementsByName("submit")[0].value,
				'_token' : '{{ Session::token() }}'
			};
			$.ajax({
				type: "POST",
				url: "{{url('confirm')}}",
				data: data,
			   	dataType: "JSON",
			   	success : function() {
			   		flag = 0;


			   	}
			});

		}//function addData(){

		function editData() {
			var data = {
				'id' : document.getElementsByName('categid')[0].value,
				'name' : document.getElementsByName("categname")[0].value,
				'_token' : '{{ Session::token() }}'
			};
			$.ajax({
				type: "POST",
				url: "{{url('Maintenance/editCommit')}}",
				data: data,
			   	dataType: "JSON",
			   	success : function() {
			   		flag = 1;


			   	}//success : function() {
			});


		}//
	</script>

@stop