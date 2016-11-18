function CRUD(id, func){

	var acpname;
	var acpcode;
	var acpdesc;

	if(func == 1)
	{

		callId = 1
		acpname = document.getElementByName('acpositionname').value;
		acpcode = document.getElementByName('acpositioncode').value;
		acpdesc = document.getElementByName('acpositiondesc').value;
	}//add

	if(func == 2)
	{
		callId = 2
	}//edit

	
	if(func == 3){
		callId = 3
		id = document.getElementById('ID')
		acpname = document.getElementByName('acpositionname').value;
		acpcode = document.getElementByName('acpositioncode').value;
		acpdesc = document.getElementByName('acpositiondesc').value;
	}//update

	var xmlhttp1 = new XMLHttpRequest();
	xmlhttp1.onreadystatechange = function(){
		if(this.readystate == 4 && this.status == 200){

			if(func == 1 || func == 3){

				alert( this.responseText);

				document.getElementByName('acpositionname')="";
				document.getElementByName('acpositioncode')="";
				document.getElementByName('acpositiondesc')="";

				window.location.href = 'index_acposition';
			}//if

			else {

				var responseArray = this.responseText.split('/');

				document.getElementByName('acpositionname').value =responseArray[2];
				document.getElementByName('acpositioncode').value=responseArray[1];
				document.getElementByName('acpositiondesc').value=responseArray[3];
			}
		}// if ready state
	};//onready function

	xmlhttp1.open("POST", "acpositioncrud", true);
	xmlhttp1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp1.send("id="+ id + " &acpositionname=" + acpname + "&acpositioncode=" + acpcode + "&desc=" + acpdesc +" &callId=" + callId); 


}