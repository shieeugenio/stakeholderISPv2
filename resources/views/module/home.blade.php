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
				<div class = "four wide column">
					<div class = "ui segment summcon" id="summary">
						<div class = "ui rail">
							<div class = "ui sticky">
								<div class="ui container">
									<div class = "summhead">
										<i class = "pie chart medium icon"></i>
										Summary
									</div>

									<div class = "summcontent">
										<div class ="twelve wide column  bspacing8">
											<label class="formlabel">% of AC: <span class = "labeldesc">10</span></label>
											
										</div>

										<div class ="twelve wide column  bspacing8">
											<label class="formlabel">No. of AC: <span class = "labeldesc">10</span></label>
											
										</div>

										<div class ="twelve wide column  bspacing8">
											<label class="formlabel">% of PSMU: <span class = "labeldesc">10</span></label>
											
										</div>

										<div class ="twelve wide column  bspacing8">
											<label class="formlabel">No. of PSMU: <span class = "labeldesc">10</span></label>
											
										</div>

										<div class ="twelve wide column  bspacing8">
											<label class="formlabel">% of TWG: <span class = "labeldesc">10</span></label>
											
										</div>

										<div class ="twelve wide column  bspacing8">
											<label class="formlabel">No. of TWG: <span class = "labeldesc">10</span></label>
											
										</div>

										<div class ="twelve wide column  bspacing8">
											<label class="formlabel">No. of Recently Added: <span class = "labeldesc">10</span></label>
											
										</div>

										<div class ="twelve wide column bspacing8">
											<label class="formlabel">Total No. of Adviser: <span class = "labeldesc">10</span></label>
											
										</div>
										
									</div>
											
								</div>
								
							</div>
							
						</div>
								
						
					</div>
					
				</div>

				<div class = "twelve wide column">
					<div class = "hcontent">
						@yield('homesection')
					</div>
					
				</div>
				
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