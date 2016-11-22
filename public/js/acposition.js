$('#m3').attr('class', 'item active');

function resetflag(){

	document.getElementById('dualbutton').value = 1;
	document.getElementById('ID')[0].value = "";
	document.getElementsByName('acpositionname')[0].value = "";
	document.getElementsByName('acpositioncode')[0].value = "";
	document.getElementsByName('description')[0].value = "";
}

function CRUD(id, func){

	var data;

	if(func == 1)
	{
		
		data = {
		'acpname' : document.getElementsByName('acpositionname')[0].value,
		'acpcode' : document.getElementsByName('acpositioncode')[0].value,
		'acpdesc' : document.getElementsByName('description')[0].value,
		'submit': document.getElementsByName("submit")[0].value,
		'callId' : 1,
		'_token' : '{{ Session::token() }}'
		};
	}//add

	if(func == 2)
	{
		data = {
		'id' : id,
		'callId' : 2,
		'_token' : '{{ Session::token() }}'};
		document.getElementById('dualbutton').value = 3;
	}//update

	if(func == 3)
	{
		data = {
		'id' : document.getElementById('ID').value,
		'acpname' : document.getElementsByName('acpositionname')[0].value,
		'acpcode' : document.getElementsByName('acpositioncode')[0].value,
		'acpdesc' : document.getElementsByName('description')[0].value,
		'submit': document.getElementsByName("submit")[0].value,
		'callId' : 3,
		'_token' : '{{ Session::token() }}'
		};
	}

	
	$.ajax({

		type: "POST",
		url: "{{url('maintenancetable/acpositioncrud')}}",
		data: data,
		dataype: "JSON",
		success:function(data){
			if(  func == 1 || func == 3){ 
				document.getElementById('ID').value = "";
				document.getElementsByName('acpositionname')[0].value = "";
				document.getElementsByName('acpositioncode')[0].value = "";
				document.getElementsByName('description')[0].value = "";

				window.location.href = "{{url('maintenancetable/advisoryposition_table')}}";

			}//if func
			else {
				document.getElementById('ID').value = data['ID'];
				document.getElementsByName('acpositionname')[0].value = data['acpositionname'];
				document.getElementsByName('acpositioncode')[0].value = data['acpositioncode'];
				document.getElementsByName('description')[0].value = data['desc'];
			}
		} 

	});
			
}
