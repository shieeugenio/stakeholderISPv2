<!DOCTYPE html>
<head>
<title>Advisory Council</title>
</head>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/semantic.css')}}">
<script type="text/javascript" src="{{ URL::asset('js/jquery-2.1.4.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/semantic.js') }}"></script>

</head>
<body>
	<form action="/add" method="POST">
		<fieldset>
			<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" type="text">
				<label for='acpositionid'>Position ID </label>
					<select name="position">
						@foreach($positions as $position => $key)
						<option value='{{$key->ID}}'>
							{{$key->acpositionname}}
						</option>
						@endforeach
					</select></br><br>
				
				<label for='acofficename'> Office Name </label>
				<input type='text' value='' name='acofficename' required placeholder="Office Name" maxlength="20" pattern = '[A-Z a-z]+'/>

				<label for='acofficeadd'> Office Address </label>
				<input type='text' value='' name='acofficeadd' required placeholder="Office Addres" maxlength="20" pattern = '[A-Z a-z]+'/></br><br>

				<label for='accategoryid'>Category </label>
					<select name="category" id="cat" onchange="catChange()">
						<option disabled selected>Category</option>
						@foreach($cat as $key)
							<option value='{{$key->ID}}'>
								{{$key->categoryname}}
							</option>
						@endforeach

					</select>

					
				<label for='acsubcategoryid'>Sub-Category </label>
					<select name="subcat" id="sub" onchange="subcat()">
								
							@foreach($sub as $key)
							<option value='{{$key->ID}}'>
								{{$key->subcategoryname}}
							</option>
						@endforeach
					</select></br><br>

			</br></br>


					<label>AC Sectors</label>
					<select id="multipleSelect" multiple class="ui selection dropdown" onchange="sectoradd(this.id)" name="sector">
							@foreach($ac as $id => $key)
							<option value='{{$key->ID}}'>
								{{$key->sectorname}}
							</option>
							@endforeach
						
					</select></br><br>

					<button type="submit" name="submit">Save</button>


		</fieldset>
	</form>

<table>
			<thead>
				<tr>
					<th>
						Advisory Council Name
					</th>
					<th>
						Advisory Council Address
					</th>
					<th>
						Advisory Position
					</th>
					<th>
						Category
					</th>
					<th>
						SubCategory
					</th>
				</tr>
			</thead>
				<tbody>
					@foreach($council as $key => $res)
					<tr>
						<td>{{$res->officename}}</td>
						<td>{{$res->officeaddress}}</td>
						<td>{{$res->advisoryposition->acpositionname}}</td>
						<!-- <td>{{$res->acsubcategory->subcategoryname}}</td> -->
						<td></td>
						<td>{{$res->acsubcategory->subcategoryname}}</td>
						<td><a href="{{URL::to('transac/' .$res->ID. '/edit')}}" value="edit">EDIT</a></td>
					</tr>
					@endforeach
				</tbody>
		<table>
	

</body>
<script type="text/javascript">

$("select[name='sector']").dropdown(); //refresh dropdown

	function resetflag(msg){

			document.getElementById('dualbutton').value = 1;

			$("#myToast").showToast({
				message: msg,
				timeout: 2500
			});
						
		}

function CRUD(id, func){

		var data;

		if(func == 1)
		{
			if(confirm('Save?')) {
				data = {
				'positioN' : document.getElementsByName('acsectorName')[0].value,
				'acofficenamE' : document.getElementsByName('acsectorCode')[0].value,
				'acofficeadD' : document.getElementsByName('Desc')[0].value,
				'categorY' : document.getElementsByName('category')[0].value,
				'subcaT' : document.getElementsByName('subcat')[0].value,
				'sectoR' : document.getElementsByName('sector')[0].value,
				'submit': document.getElementsByName("submit")[0].value,
				'callId' : 1,
				'_token' : '{{ Session::token() }}'
				};

				exec(data, func);
			}//if(confirm('Save?')) {
		}//add

		if(func == 2)
		{
			data = {
			'id' : id,
			'callId' : 2,
			'_token' : '{{ Session::token() }}'};
			document.getElementById('dualbutton').value = 3;

			exec(data, func);
			

		}//view

		if(func == 3)
		{
			if(confirm('Save?')) {
				data = {
					'positioN' : document.getElementsByName('acsectorName')[0].value,
					'acofficenamE' : document.getElementsByName('acsectorCode')[0].value,
					'acofficeadD' : document.getElementsByName('Desc')[0].value,
					'categorY' : document.getElementsByName('category')[0].value,
					'subcaT' : document.getElementsByName('subcat')[0].value,
					'sectoR' : document.getElementsByName('sector')[0].value,
					'submit': document.getElementsByName("submit")[0].value,
					'callId' : 3,
					'_token' : '{{ Session::token() }}'
				exec(data, func);

			}//if(confirm('Save?')) {
		}//update

			
	}

	function exec(data, func) {
		$.ajax({

			type: "POST",
			url: "{{url('transaction/acCRUD')}}",
			data: data,
			dataype: "JSON",
			success:function(data){
				if(  func == 1 || func == 3){ 
					
					if(func == 1) {
						msg = "Saved!";
					} else {
						msg = "Updated!";
					}//if(func == 1) {

					resetflag(msg);
					setTimeout(function(){
						location.reload();
					}, 2600);

				}//if func
				else {
					$('#' + data['ID']).attr('class', 'activerow');
					$('tr').not("[id = '" + data['ID'] + "']").removeAttr('class');

					document.getElementById('acsectorID').value = data['ID'];
					document.getElementsByName('acsectorCode')[0].value = data['sectorcode'];
					document.getElementsByName('acsectorName')[0].value = data['sectorname'];
					document.getElementsByName('Desc')[0].value = data['desc'];
				}
			} 

		});
	}//function exec() {




</script>
</html>