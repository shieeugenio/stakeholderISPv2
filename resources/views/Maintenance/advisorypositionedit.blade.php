@extends('welcome')

@section('content')

		<form method="POST" action="acpositioninsert">
		<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}">
		ID:<input type="text" id="ID" value="{{$acpostion->ID}}" disabled/>
		Advisory Position:<input type="text" name="acpositionname" value="{{$acpostion->acpositionname}}"/>
		<input type="submit" name="updateacposition" value="Update"/>
		<input type="submit" name="Cancel" onclick="return back();" value="Discard"/>
		</form>

		<div>Position</div>
		@foreach ($positions as $positions)
			<div>
			@unless (empty('positions'))
				<li style="color:red; font-weight: bold;">{{ $positions->acpositionname}} 
				<input type="submit" name="editacposition" value="Edit"/>
				<input type="submit" name="deleteacposition" value="Delete"/>
				</li>
				
			@endunless
			</div>
		@endforeach
@stop