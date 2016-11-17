@extends('welcome')

@section('content')
		
		@foreach ($sql as $sql)
		<div>
		<form method="POST" action="acpositionupdate">
			<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}">
			ID:<input type="number" name="acpositionsid" value="{{$sql->ID}}" readonly="TRUE" />
			Advisory Position:<input type="text" name="setpositionname" value="{{$sql->acpositionname}}"/>
			<input type="submit" name="btn_updateacposition" onclick="return confirm('Record will be saved!')" value="SAVE"/>
			<input type="submit" name="cancel" value="DISCARD"/>
		</form>
		</div>
		@endforeach
		
		<div>Position</div>
		
				<table border="1">
					<thead>
						<tr><div><th>Position Name</th></div>
						<div><th>Action</th></div>
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
							<input type="submit" name="editacposition" value="Edit"/>
							<input type="submit" name="deleteacposition" value="Delete" onclick="alert('No Deleteion of Item')"/>
							</td>

							</form>
						</tr>
						@endforeach
					</tbody>
				</table>

@stop