@extends('module.maintenance')

@section('mtablesection')
	<div class = "acccon">
		<div class = "ui grid">
			<div class = "ten wide column">
				<div class = "tablepane">
					<div class = "mtitle">Advisory Council Sub-category</div>

					<div class = "tablecon">
						<table id="datatable" class="ui celled table" cellspacing="0" width="100%">
						    <thead>
						    	<tr>
						    		<th><center>Code</center></th>
									<th><center>Sub-category</center></th>
									<th><center>Category</center></th>
									<th><center>Description</center></th>
										            
						        </tr>	
						    </thead>
						                   
						    <tbody>
						    	@foreach($subcat as $sitem)
									<tr class = "trow" onclick = "loaddata({{$sitem->ID}})" id = "{{$sitem->ID}}">
										<td>{{$sitem->acsubcategorycode}}</td>
										<td>{{$sitem->subcategoryname}}</td>
										<td>{{$sitem->category->categoryname}} ({{$sitem->category->accategorycode}})</td>
										<td>{{$sitem->desc}}</td>
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
						<div id="myToast" class="toast-popup"></div>
						<i class="write square big icon"></i>
					</div>

					
					<form class = "ui form" id = "form" action = "javascript:controlaction()">
							
						<div class = "labelpane">
									
							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Code
									<span class = "asterisk">*</span>

								</label>

							</div>

							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Sub Category</label>
								<span class = "asterisk">*</span>		
							</div>

							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Sub Category</label>
								<span class = "asterisk">*</span>		
							</div>

							<div class = "twelve wide column bspacing">
								<label class = "formlabel">Description</label>	
							</div>

						</div>

						<div class = "fieldpane">
							<input type="hidden" value="" name="subid"/>
							<div class = "twelve wide column bspacing2">
								<div class="ui input field formfield">
								  <input type="text" name="sub_code" placeholder="e.g. NME">
								</div>
							</div>
							<div class = "twelve wide column bspacing2">
								<div class="ui input field formfield">
								  <input type="text" name="sub_name" placeholder="e.g. Name">
								</div>
							</div>
							<div class = "twelve wide column bspacing2">
								<div class = "field">
									<select class="ui selection dropdown selectstyle" name="category" id = "select">
										<option class="disabled">Select One</option>
									  	@foreach($category as $key=>$value)
											<option value="{{$value->ID}}">
												{{$value->accategorycode}} - {{$value->categoryname}}
											</option>
										@endforeach
									  
									</select>
									
								</div>
								
							</div>

							<div class = "twelve wide column bspacing2">
								<div class="field">
									<textarea  name = "description" class = "areastyle" rows = "4" placeholder="Type here..."></textarea>
								</div>
							</div>
							

							<div class = "twelve wide column bspacing2">
								<center><button type = "submit" name="submit" 
												class="ui tiny button submit savebtnstyle"
												>

									Save
								</button>
								<button type = "reset" onclick = "if(confirm('Cancel?')) { resetflag('Cancelled!')}" class="ui tiny button">
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
		var flag = 0;

		function controlaction() {

			if(confirm('Save?')) {
				if(flag == 1) {
					editData();

				} else if(flag == 0) {
					addData();

				}//if(flag == 1) {
			}//if(confirm('Save?')) {
		}//function controlaction() {

		function resetflag(msg) {
			flag = 0;

			$("#myToast").showToast({
				message: msg,
				timeout: 2500
			});

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
				url: "{{url('acsubcategory/view')}}",
				data: data,
			   	dataType: "JSON",
			   	success : function(data) {
			   		
			   		document.getElementsByName('subid')[0].value = data['ID'];
			   		document.getElementsByName('sub_name')[0].value = data['subcategoryname'];
			   		document.getElementsByName('sub_code')[0].value = data['acsubcategorycode'];
			   		document.getElementsByName('description')[0].value = data['desc'];
			   		$('#select').dropdown('set selected', data['categoryId']);

			   	}//success : function() {
			});


		}//function loaddata() {

		function addData() {
			var data = {
				'subcat' : document.getElementsByName("sub_name")[0].value,
				'subcatcode' : document.getElementsByName("sub_code")[0].value,
				'category': document.getElementsByName("category")[0].value,
				'desc' : document.getElementsByName("description")[0].value,
				'submit': document.getElementsByName("submit")[0].value,
				'_token' : '{{ Session::token() }}'
			};

			$.ajax({
				type: "POST",
				url: "{{url('acsubcategory/add')}}",
				data: data,
			   	success : function() {
			   		resetflag("Saved!");
			   	}
			});

			setTimeout(function(){
				location.reload();
			}, 2600);

		}//function addData(){

		function editData() {
			var data = {
				'subcatID' : document.getElementsByName('subid')[0].value,
				'name' : document.getElementsByName("sub_name")[0].value,
				'subcatcode' : document.getElementsByName("sub_code")[0].value,
				'catID' : document.getElementsByName("category")[0].value,
				'desc' : document.getElementsByName("description")[0].value,
				'submit': document.getElementsByName("submit")[0].value,
				'_token' : '{{ Session::token() }}'
			};

			$.ajax({
				type: "POST",
				url: "{{url('acsubcategory/edit')}}",
				data: data,
			   	success : function() {
			   		resetflag('Updated');


			   	}//success : function() {
			});

			setTimeout(function(){
				location.reload();
			}, 2600);


		}//


	</script>

@stop