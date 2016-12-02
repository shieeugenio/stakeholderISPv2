@extends('baseform')

@section('maincontent')

	<div class = "homecon">
		<div class = "ui grid">
			<div class = "row">
				<div class = "nine wide column colheight">
					<div class="ui icon input big search">
						<i class="search icon"></i>
						<input type="text" placeholder="Search...">
					</div>
				</div>
			
				
			</div>

			<div class = "row">
				<hr>
				
				@yield('homesection')
				
			</div>

		</div>
		
	</div>


	<script type="text/javascript">
		$('#tab1').attr('class', 'mlink item active');

		function showacview() {
			document.getElementsByName('acview')[0].style.display = "block";
			document.getElementsByName('tpview')[0].style.display = "none";

		}//function showacview() {

		function showtpview() {
			document.getElementsByName('acview')[0].style.display = "none";
			document.getElementsByName('tpview')[0].style.display = "block";

		}//function showacview() {

	</script>
@stop