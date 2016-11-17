<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
@foreach($stmt as $acsec)
	<form action="update_acsectors" method="post" >
		<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}">

		Sector ID:<input name="acsectorID" type="number" VALUE="{{$acsec->ID}}" readonly="true"> 
		Sector Name: <input name="acsectorName"  VALUE="{{$acsec->sectorname}}" type="text" > 
		<input type="submit" 
	     				name="btn_Save" 
	     				value="SAVE" 
	     				onclick="return confirm('This record will saved!');">
				
				<input  type="submit" 
						value="DISCARD" 
						name="btn_Discard" >
	</form>
	@endforeach

</body>
</html>
