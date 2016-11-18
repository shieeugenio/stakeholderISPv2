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
						            <th><center>Category Code</center></th>
						            <th><center>Category Name</center></th>
						            <th><center>Description</center></th>

						        </tr>	
						    </thead>
						                   
						    <tbody>

						    	@foreach($category as $citem)
						    		<tr onclick = "loaddata({{$citem->ID}})" id = "{{$citem->ID}}">
							    		<td><center>{{$citem->accategorycode}}</center></td>
							    		<td><center>{{$citem->categoryname}}</center></td>
							    		<td><center>{{$citem->desc}}</center></td>

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

					
					<form class = "ui form" id = "form" action = "javascript:controlaction()">
							
						<div class = "labelpane">
									
							<!--<div class = "twelve wide column bspacing">
								<label class = "formlabel">Category ID
									<span class = "asterisk">*</span>

								</label>

							</div>-->

							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Category Code</label>
								<span class = "asterisk">*</span>
										
							</div>

							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Category Name</label>
								<span class = "asterisk">*</span>
										
							</div>

							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Description</label>
										
							</div>
									
								
						</div>

						<input type="hidden" value="" name="categid"/>
						<div class = "fieldpane">
							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
								  <input type="text" name = "categcode" pattern = "^(?=.*(\d|\w))[A-Za-z0-9 ]{1,10}" placeholder="e.g AC" required>
								</div>
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
								  <input type="text" name = "categname" pattern = "^(?=.*(\d|\w))[A-Za-z0-9 ]{5,35}" placeholder="e.g Name" required>
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
												onclick = "return confirm('Save Record?')">

									Save
								</button>
								<button type = "reset" onclick = "if(confirm('Cancel?')) { resetflag()}"class="ui tiny button">
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

		/**$('.ui.form')
			.form({
				fields: {
					categcode : ['empty', 'regExp[/^(?=.*(\d|\w))[A-Za-z0-9 ]{1,10}$/]]'],
					categname : ['empty', 'regExp[/^(?=.*(\d|\w))[A-Za-z0-9 ]{5,35}$/]]']
			    }
			  });

		function validateFields() {
			var code = document.getElementsByName('categcode')[0].value;
			var name = document.getElementsByName('categname')[0].value;
			var cpattern = new RegExp("^(?=.*(\d|\w))[A-Za-z0-9 ]{1,10}");
			var npattern = new RegExp("^(?=.*(\d|\w))[A-Za-z0-9 ]{5,35}");

			if(cpattern.test(code) ==  "true" && npattern.test(name) ==  "true") {
				$("name = 'submit'").attr('class', 'ui tiny button savebtnstyle');
				$("#ccode").attr('class','ui input formfield');
				$("#cname").attr('class','ui input formfield');

			} else {
				if(cpattern.test(code) == "false") {
					$("name = 'submit'").attr('class', 'ui tiny button savebtnstyle disabled');
					$("#ccode").attr('class','ui input formfield error');


				} else if(cpattern.test(code) ==  "true") {
					$("#ccode").attr('class','ui input formfield');

				}//if(cpattern.text(code) == "false") {

				if(npattern.test(name) == "false") {
					$("name = 'submit'").attr('class', 'ui tiny button savebtnstyle disabled');
					$("#cname").attr('class','ui input formfield error');

				} else if(npattern.test(name) == "true") {
					$("#cname").attr('class','ui input formfield');

				}//if(npattern.test(name) == "false") {

			}//if(cpattern.text(code) ==  "true" && npattern.text(code) ==  "true") {
		}//function validateFields() {**/

		$('#m1').attr('class', 'item active');
		var flag = 0;

		function controlaction() {
			console.log(flag);

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
			$('#' + id).attr('class', 'activerow');
			$('tr').not("[id = '" + id + "']").removeAttr('class');

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

			   		document.getElementsByName('categid')[0].value = data['ID'];
			   		document.getElementsByName('categname')[0].value = data['categoryname'];
			   		document.getElementsByName('categcode')[0].value = data['accategorycode'];
			   		document.getElementsByName('description')[0].value = data['desc'];

			   		console.log(data);

			   	}//success : function() {
			});


		}//function loaddata() {

		function addData() {
			var data = {
				'name' : document.getElementsByName("categname")[0].value,
				'code' : document.getElementsByName("categcode")[0].value,
				'desc' : document.getElementsByName("description")[0].value,
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

			   		$(document).ready(function(){
						$("#toast").showToast({
						    message: 'Saved!',
						    timeout: 2500
						});
					});


			   	}
			});

		}//function addData(){

		function editData() {
			var data = {
				'catID' : document.getElementsByName('categid')[0].value,
				'name' : document.getElementsByName("categname")[0].value,
				'code' : document.getElementsByName("categcode")[0].value,
				'desc' : document.getElementsByName("description")[0].value,
				'submit': document.getElementsByName("submit")[0].value,
				'_token' : '{{ Session::token() }}'
			};

			console.log(data)

			$.ajax({
				type: "POST",
				url: "{{url('Maintenance/editCommit')}}",
				data: data,
			   	dataType: "JSON",
			   	success : function() {
			   		flag = 0;


			   	}//success : function() {
			});


		}//
	</script>

@stop