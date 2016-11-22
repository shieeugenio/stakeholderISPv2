@extends('welcome')

@section('content')
 		
		
		<form method="POST" action="policepositioninsert">
		<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}">
		ID:<input type="text" id="ID" value="" disabled/></br>
		Police Position:<input type="text" name="positionname" value=""/></br>
		Position Code:<input type="text" name="positioncode" value=""/></br>
		Description:<input type="text" name="desc" value=""/></br>
		<input type="submit" name="storeposition"/>
		<input type="submit" name="cancel" value="Cancel"/>
		</form>

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
							<form method="POST" action="policepositionedit">
							<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}">
							
							<td> 
							<label style="color:red; font-weight: bold;;">{{ $positions->positionname}}</label> 
							<input type="hidden" name="policepositionid" value="{{$positions->ID}}"/>
							</td>

							<td>
								<label style="color:red; font-weight: bold;;">{{ $positions->policepositioncode}}</label>					
							</td>

							<td>
								<label style="color:red; font-weight: bold;;">{{ $positions->desc}}</label>					
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