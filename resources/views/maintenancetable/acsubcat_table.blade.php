@extends('module.maintenance')

@section('mtablesection')
	<div class = "acccon">
		<div class = "ui grid">
			<div class = "ten wide column">
				<div class = "tablepane">
					<div class = "mtitle">Advisory Council Sub-category
						<!--<div class = "ui icon button addbtn" title = "add">
							<i class="plus icon topmargin"></i>
										
						</div>-->
					</div>

					<div class = "tablecon">
						<table id="datatable" class="ui celled table" cellspacing="0" width="100%">
						    <thead>
						    	<tr>
						    		<th><center>Code</center></th>
									<th><center>Subcategory</center></th>
									<th><center>Category</center></th>
									<th><center>Description</center></th>
										            
						        </tr>	
						    </thead>
						                   
						    <tbody>
						    	@foreach($subcat as $sitem)
									<tr onclick = "loaddata({{$sitem->ID}})" id = "{{$sitem->ID}}">
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
								<span class = "asterisk">*</span>		
							</div>

						</div>

						<div class = "fieldpane">
						<input type="hidden" value="" name="subid"/>
							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
								  <input type="text" name="sub_code" placeholder="e.g CPSM">
								</div>
							</div>
							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
								  <input type="text" name="sub_name" placeholder="e.g Name">
								</div>
							</div>
							<div class = "twelve wide column bspacing2">
								<select class="ui selection dropdown selectstyle" id = "select" name="category">
								  	@foreach($category as $key=>$value)
										<option value="{{$value->ID}}">
											{{$value->accategorycode}} - {{$value->categoryname}}
										</option>
									@endforeach
								  
								</select>
							</div>
							<div class = "twelve wide column bspacing2">
								<div class="ui input formfield">
								  <input type="text" name="description">
								</div>
							</div>
							

							<div class = "twelve wide column bspacing2">
								<center><button class="ui tiny button savebtnstyle" type="submit" name="submit" value="add">
								

									Save
								</button>
								<button type="reset" class="ui tiny button">
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
				url: "{{url('maintenance/subedit')}}",
				data: data,
			   	dataType: "JSON",
			   	success : function(data) {
			   		
			   		document.getElementsByName('subid')[0].value = data['ID'];
			   		document.getElementsByName('sub_name')[0].value = data['subcategoryname'];
			   		document.getElementsByName('sub_code')[0].value = data['acsubcategorycode'];
			   		document.getElementsByName('description')[0].value = data['desc'];
			   		document.getElementsByName('category')[0].value = data['categoryId'];

			   		console.log(data);

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
				url: "{{url('addcommit')}}",
				data: data,
			   	dataType: "JSON",
			   	success : function() {
			   		flag = 0;




			   	}
			});

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