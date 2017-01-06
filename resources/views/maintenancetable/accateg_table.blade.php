@extends('module.maintenance')

@section('mfillformsection')
	<form class = "ui form" id = "form" action = "javascript:controlaction()">
							
		<div class = "labelpane">

			<div class = "twelve wide column bspacing">
				<label class = "formlabel">Name</label>
				<span class = "asterisk">*</span>
										
			</div>

			<div class = "twelve wide column bspacing">
				<label class = "formlabel">Description</label>
										
			</div>
		</div>


		<input type="hidden" value="" name="categid"/>
		<div class = "fieldpane">

			<div class = "twelve wide column bspacing2">
				<div class="ui input field formfield">
					<input type="text" name = "categname" placeholder="e.g. Regional">
				</div>
			</div>

			<div class = "twelve wide column bspacing2">
				<div class="field">
					<textarea  name = "description" class = "areastyle" rows = "4" placeholder="Type here..."></textarea>
				</div>
			</div>

			<div class = "twelve wide column bspacing2">
				<center><button type = "submit" name="submit" 
						class="ui tiny button submit savebtnstyle">
					Save
				</button>
		
				<button type = "reset" onclick = "if(confirm('Cancel?')) { resetflag('Cancelled!')}" class="ui tiny button">
						Cancel

				</button></center>
			</div>

								
		</div>
								
	</form>


@endsection

@section('mtablesection')
	<div class = "mtitle">Advisory Council Category</div>

	<div class = "tablecon">
		<table id="datatable" class="ui celled table" cellspacing="0" width="100%">
		    <thead>
		    	<tr>
		            <th><center>Name</center></th>
		            <th><center>Description</center></th>
		        </tr>	
		    </thead>
					                   
		    <tbody>

		    	@foreach($category as $citem)
		    		<tr class = "trow" onclick = "loaddata({{$citem->ID}})" id = "{{$citem->ID}}">
			    		<td><center>{{$citem->categoryname}}</center></td>
			    		<td><center>{{$citem->desc}}</center></td>
			    	</tr>
		    	@endforeach

		    </tbody>
		</table>						
	</div>

	<script type="text/javascript">

		$('#m1').attr('class', 'item active');
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
				url: "{{url('accategory/view')}}",
				data: data,
			   	dataType: "JSON",
			   	success : function(data) {

			   		document.getElementsByName('categid')[0].value = data['ID'];
			   		document.getElementsByName('categname')[0].value = data['categoryname'];
			   		document.getElementsByName('description')[0].value = data['desc'];

			   	}//success : function() {
			});


		}//function loaddata() {

		function addData() {
			var data = {
				'name' : document.getElementsByName("categname")[0].value,
				'desc' : document.getElementsByName("description")[0].value,
				'submit': document.getElementsByName("submit")[0].value,
				'_token' : '{{ Session::token() }}'
			};

			$.ajax({
				type: "POST",
				url: "{{url('accategory/add')}}",
				data: data,
			   	success : function(msg) {
			   		resetflag('Saved!');
			   	}
			});

			setTimeout(function(){
				location.reload();
			}, 2600);

		}//function addData(){

		function editData() {
			var data = {
				'catID' : document.getElementsByName('categid')[0].value,
				'name' : document.getElementsByName("categname")[0].value,
				'desc' : document.getElementsByName("description")[0].value,
				'submit': document.getElementsByName("submit")[0].value,
				'_token' : '{{ Session::token() }}'
			};

			$.ajax({
				type: "POST",
				url: "{{url('accategory/edit')}}",
				data: data,
			   	success : function() {
			   		resetflag("Updated!");
			   	}//success : function() {
			});

			setTimeout(function(){
				location.reload();
			}, 2600);


		}//function editData() {
	</script>

@stop