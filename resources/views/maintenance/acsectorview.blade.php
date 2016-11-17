<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	@foreach($stmt as $acsec)
	<form action="edit_acsectors" method="post" >
		<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}">
	Sector ID:<input name="acsectorID" type="number" value="{{$acsec->ID}}" readonly="true"> 
		Sector Name: <input name="acsectorName" type="text" value="{{$acsec->sectorname}}" readonly="true"> 
		<input type="submit" name="btn_Edit" value="EDIT" >
				
	</form>
	@endforeach

		
</body>
</html>

