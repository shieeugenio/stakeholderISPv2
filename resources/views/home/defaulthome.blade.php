@extends('module.home')

@section('homesection')
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
								<label class="formlabel">% of AC: <span class = "labeldesc">%</span></label>
										
							</div>

							<div class ="twelve wide column  bspacing8">
								<label class="formlabel">No. of AC: <span class = "labeldesc"></span></label>
											
							</div>

							<div class ="twelve wide column  bspacing8">
								<label class="formlabel">% of PSMU: <span class = "labeldesc">%</span></label>
											
							</div>

							<div class ="twelve wide column  bspacing8">
								<label class="formlabel">No. of PSMU: <span class = "labeldesc"></span></label>
										
							</div>

							<div class ="twelve wide column  bspacing8">
								<label class="formlabel">% of TWG: <span class = "labeldesc">%</span></label>
											
							</div>

							<div class ="twelve wide column  bspacing8">
								<label class="formlabel">No. of TWG: <span class = "labeldesc"></span></label>
											
							</div>

							<br>

							<div class ="twelve wide column bspacing8">
								<label class="formlabel">Total No. of Adviser: <span class = "labeldesc"></span></label>
											
							</div>
										
						</div>
											
					</div>
								
				</div>
							
			</div>
								
						
		</div>
					
	</div>

	<div class = "twelve wide column">
		<div class = "hcontent">
			<div class="dcon">
				<div class = "tablepane">
					<div class = "mtitle">Recently Added</div>

					<div id = "cardlist" class = "ui doubling grid cardlist2">

					
							<div class = "five1 wide column colheight">
								<div class = "cardstyle" onclick = "loadModal()">
									<img class = "advphoto" src=""/>

									<div class = "advdata">
										<h5 class = "name"></h5>
										<p class = "p1">
											
										</p>
										
									</div>
								</div>

							</div>

					</div>


			
				</div>
		
			</div>
						
		</div>
					
	</div>


	

	<script type="text/javascript">
		function showacview() {
			document.getElementsByName('acview')[0].style.display = "block";
			document.getElementsByName('tpview')[0].style.display = "none";
			document.getElementById('tab3').style.display = "none";
			document.getElementById('trainingview').style.display ="none";

		}//function showacview() {

		function showtpview() {
			document.getElementsByName('acview')[0].style.display = "none";
			document.getElementsByName('tpview')[0].style.display = "block";
			document.getElementsByName('tab3').style.display = "block";
			document.getElementById('trainingview').style.display ="none";



		}//function showacview() {

		function loadModal(id) {

			var data = {
				'ID' :id,
				'_token' : '{{ Session::token() }}'
			};

			$.ajax({
				type: "POST",
				url: "{{url('modalView')}}",
				data: data,
				dataType: "json",
			   	success : function(recorddata) {
			   		console.log(recorddata);

			   		//Profile
			   		document.getElementsByName('name')[0].innerHTML = recorddata[0][0]['lname'] + ", " + recorddata[0][0]['fname'] + " " + recorddata[0][0]['mname'];
			   		document.getElementsByName('bdate')[0].innerHTML = recorddata[1];

			   		if(recorddata[0][0]['gender'] == 0) {
			   			document.getElementsByName('gender')[0].innerHTML = "Male";

			   		} else {
			   			document.getElementsByName('gender')[0].innerHTML = "Female";

			   		}//if(recorddata[0][0]['gender'] == 0) {

			   		document.getElementsByName('address')[0].innerHTML = recorddata[0][0]['street'] + " " + recorddata[0][0]['barangay']
			   															  + " " + recorddata[0][0]['city']  + " " + recorddata[0][0]['province'];

			   	}//success : function() {
			});

			$('#viewadv').modal('show');

		}//function loadModal() {

		/**
			Iisang modal lang yung sa ac saka twg/psmu

			pag AC yung ivuview na record yung showacview yung 
			gamitin para mapalitan yung advisory council tab.

			Otherwise showtpview

			Ito rin yung modal na gagamitin para sa adviser na blade.


			defaulthome.blade --> Admin Home Page
			defaultphome.blade --> Public Home Page



		**/

	</script>

@include('home.directory_modal')

@stop