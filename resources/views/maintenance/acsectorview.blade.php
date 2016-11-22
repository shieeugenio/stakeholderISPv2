<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<form action="insert_acsectors" method="post" >
		<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}">

		Sector ID:<input name="acsectorID" type="number" readonly="true"></br> 
		Sector Name: <input name="acsectorName" type="text"> </br>
		Sector Code:<input type="text" name="sectorcode" value=""/></br>
		Description:<input type="text" name="desc" value=""/></br>
		<input type="submit" 
	     				name="btn_Save" 
	     				value="SAVE" 
	     				onclick="return confirm('This record will saved!');">
				
				<input  type="submit" 
						value="DISCARD" 
						name="btn_Discard" >
	</form>

	<div>SECTOR</div>
		<table border="1">
					<thead>
						<tr>
							<th>Sector Name</th>
							<th>Sector Code</th>
							<th>Desc</th>
							<th>Action</th>
						</tr>
					</thead>
					</tbody>
						@foreach ($sector as $sector)		
						<tr>
							<form method="POST" action="edit_acsectors">
							<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}">
							
							<td> 
							<label style="color:red; font-weight: bold;;">{{ $sector->sectorname}}</label> 
							<input type="hidden" name="acsectorid" value="{{$sector->ID}}"/>
							</td>

							<td>
								<label style="color:red; font-weight: bold;;">{{ $sector->sectorcode}}</label>					
							</td>

							<td>
								<label style="color:red; font-weight: bold;;">{{ $sector->desc}}</label>					
							</td>

							<td>
							<input type="submit" name="btn_Edit" value="Edit"/>
							<input type="submit" name="btn_Discard" value="Cancel" onclick="alert('Cancel')"/>
							</td>

							</form>
						</tr>
						@endforeach
					</tbody>
				</table>			

</body>
</html>
