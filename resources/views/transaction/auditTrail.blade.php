<!DOCTYPE html>
<html>
<head>
	<title>AuditTrail sample</title>
</head>
<body>

<div>
<script type="text/javascript">
	function haha(){
		alert('no');
	}
	</script>

	<form action="AuditTrailFilter" onsubmit="haha()" method="POST">
		<input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" type="text">
		<label>Name</label>
		<input type="text" name="n">
		<label>Date</label>
		<input type="date" name="d">
		<label>type</label>
		<select name="t">
			<option>SELECT ONE</option>
			<option value="1">Super Admin</option>
			<option value="0">Admin</option>
		</select>
		<input type="submit" name="submit">

	</form>
<table border="5">
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>User Type</td>
			<td>Description</td>
			<td>date</td>
		</tr>
	</thead>
	<tbody id="data">

	
	@foreach($audit as $key => $val)
	<tr>
	<td>{{$val->id}}</td>
	<td>{{ $val->name }}</td>
	@if($val->admintype == 1)
		<td>Super Admin</td>
	@else
		<td>Admin</td>
	@endif
	<td>{{$val->description}}</td>
	<td>{{$val->date_time}}</td>
	</tr>
	@endforeach
	
	</tbody>


</table>
</div>
</body>
</html>