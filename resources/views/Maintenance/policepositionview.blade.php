@extends('welcome')

@section('content')
 		
		
		<form method="POST" action="policepositioninsert">
		<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}">
		ID:<input type="number" id="ID" value="" disabled/>
		Police Position:<input type="text" name="policepositionname" value=""/>
		<input type="submit" name="storeposition"/>
		<input type="submit" name="cancel" value="CANCEL"/>
		</form>

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
							<form method="POST" action="policepositionedit">
							<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}">
							
							<td> 

							<label style="color:red; font-weight: bold;;">{{ $positions->positionname}}</label> 
							<input type="hidden" name="policepositionid" value="{{$positions->ID}}"/>
							</td>
							<td>
							<input type="submit" name="editpoliceposition" value="Edit"/>
							<input type="submit" name="deletepoliceposition" value="Delete" onclick="alert('No Deleteion of Item')"/>
							
							</td>
							</form>
						</tr>
						@endforeach
					</tbody>
				</table>
@stop