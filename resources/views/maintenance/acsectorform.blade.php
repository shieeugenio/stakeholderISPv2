<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<form action="insert_acsectors" method="post" >
		<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}">

		Sector ID:<input name="acsectorID" type="number" readonly="true"> 
		Sector Name: <input name="acsectorName" type="text"> 
		<input type="submit" 
	     				name="btn_Save" 
	     				value="SAVE" 
	     				onclick="return confirm('This record will saved!');">
				
				<input  type="submit" 
						value="DISCARD" 
						name="btn_Discard" >
	</form>

			

</body>
</html>
