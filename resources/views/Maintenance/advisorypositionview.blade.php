@extends('welcome')

@section('content')

	@foreach ($sql as ID)
	
		<form method="POST" action="acpositionedit">
		<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}">
		ID:<input type="text" id="ID" value="" disabled/>
		Advisory Position:<input type="text" name="acpositionname" value=""/>

		<input type="submit" name="btn_Edit" />
		<input type="submit" name="btn_Create" >/>
		</form>

 	
	@end foreach


@stop