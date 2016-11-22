@extends('welcome')

@section('content')

		<form method="POST" action="acpositioninsert">
		<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}">
		ID:<input type="text" id="ID" value="" disabled/></br>
		Advisory Position:<input type="text" name="acpositionname" value=""/></br>
		Position Code:<input type="text" name="acpositioncode" value=""/></br>
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
