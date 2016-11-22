@extends('welcome')

@section('content')
		
		@foreach ($sql as $sql)
		<div>
		<form method="POST" action="acpositionupdate">
			<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}">
			ID:<input type="number" name="acpositionsid" value="{{$sql->ID}}" readonly="TRUE" /><br>
			Advisory Position:<input type="text" name="setpositionname" value="{{$sql->acpositionname}}"/><br>
			Position Code:<input type="text" name="setpositioncode" value="{{$sql->acpositioncode}}"/></br>
			Description:<input type="text" name="setdesc" value="{{$sql->desc}}"/></br>
			<input type="submit" name="btn_updateacposition" onclick="return confirm('Record will be saved!')" value="SAVE"/>
			<input type="submit" name="cancel" value="DISCARD"/>
		</form>
		</div>
		@endforeach
		
		<div>Position</div>
		
				<table border="1">
					<thead>
						<tr>
							<th>Position Name</th>
							<th>Position Code</th>
							<th>Desc</th>
							<th>Action</th>
						</tr>
					</thead>
					</tbody>
						@foreach ($positions as $positions)		
						<tr>
							<form method="POST" action="acpositionedit">
							<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}">
							
							<td> 
							<label style="color:red; font-weight: bold;;">{{ $positions->acpositionname}}</label> 
							<input type="hidden" name="acpositionid" value="{{$positions->ID}}"/>
							</td>

							<td>
								<label style="color:red; font-weight: bold;;">{{ $positions->acpositioncode}}</label>					
							</td>

							<td>
								<label style="color:red; font-weight: bold;;">{{ $positions->desc}}</label>					
							</td>


							<td>
							<input type="submit" name="editacposition" value="Edit"/>
							<input type="submit" name="deleteacposition" value="Delete" onclick="alert('No Deleteion of Item')"/>
							</td>

							</form>
						</tr>
						@endforeach
					</tbody>
				</table>

@stop