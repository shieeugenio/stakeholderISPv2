@extends('welcome')

@section('content')

	<div>
		
		<form method="POST" action="acpositionupdate">
		<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}">
		ID:<input type="text" id="ID" value="" disabled/>
		Advisory Position:<input type="text" name="acpositionname" value=""/>
		<input type="submit" name="storeposition"/>
		</form>
	</div>

@stop