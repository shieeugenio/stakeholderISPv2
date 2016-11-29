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

	<div class = "modal">
		<div id = "viewadv" class = "ui modal">
	        <div class = "header mtitle">
	            Eugenio, Shiela Mae F.

	            <div class = "ui icon addbtn button tiny" title = "edit">
					<i class="edit icon topmargin"></i>
							
				</div>
	        </div>

	        <div class = "modelcontent">
		        <div class="ui top attached tabular menu rightrow">
					<div class="item active" id = "tab1" data-tab="basicinfo">
						Profile
					</div>
					<div class="item" id = "tab2"  data-tab="work">
					    Advisory Council
					</div>
					<div class="item" id = "tab3" data-tab = "train">
					    Training
					</div>
				</div>

		        <div class = "tabbody ui bottom attached">
		        	<div class="ui tab active" data-tab="basicinfo">
		        		<div class = "ui grid">
		        			<div class = "thirteen wide column ">
		        				<fieldset>
		        					<legend>Basic Information</legend>

			        				<div class = "ui grid row">
			        					<div class ="three wide column fbc labelpane">

											<div class = "twelve wide column bspacing">
												<label class = "formlabel">Birthdate</label>
														
											</div>

											<div class = "twelve wide column bspacing">
												<label class = "formlabel">Gender</label>
														
											</div>

											<div class = "twelve wide column bspacing">
												<label class = "formlabel">Home Address</label>
														
											</div>
															
										</div>

										<div class ="eleven wide column fieldpane">

											<div class = "twelve wide column bspacing9">
												<p>INSERT BIRTHDATE</p>
														
											</div>

											<div class = "twelve wide column bspacing9">
												<p>Gender</p>
														
											</div>

											<div class = "twelve wide column bspacing9">
												<p>INSERT HOME ADDRESS</p>
														
											</div>
															
										</div>
										

			        				</div>

		        				</fieldset>

		        				<br>

		        				<fieldset>
		        					<legend>Contact Information</legend>
		        					
			        				<div class = "ui grid row">
			        					<div class ="three wide column fbc labelpane">

											<div class = "twelve wide column bspacing">
												<label class = "formlabel">Contact No.</label>
														
											</div>

											<div class = "twelve wide column bspacing">
												<label class = "formlabel">Email Address</label>
														
											</div>

											<div class = "twelve wide column bspacing">
												<label class = "formlabel">Facebook</label>
														
											</div>

											<div class = "twelve wide column bspacing">
												<label class = "formlabel">Twitter</label>
														
											</div>

											<div class = "twelve wide column bspacing">
												<label class = "formlabel">Instagram</label>
														
											</div>
															
										</div>

										<div class ="eleven wide column fieldpane">

											<div class = "twelve wide column bspacing9">
												<p>INSERT CONTACT NO.</p>
														
											</div>

											<div class = "twelve wide column bspacing9">
												<p>INSERT EMAIL</p>
														
											</div>

											<div class = "twelve wide column bspacing9">
												<p>INSERT FACEBOOK</p>
														
											</div>

											<div class = "twelve wide column bspacing9">
												<p>INSERT TWITTER</p>
														
											</div>

											<div class = "twelve wide column bspacing9">
												<p>INSERT IG</p>
														
											</div>
															
										</div>
										

			        				</div>

		        				</fieldset>
			        			
		        			
		        			</div>
		        			<div class  = "three wide column">
		        				<div class = "ui small image">
									<img src="{{URL::asset('objects/Logo/InitProfile.png')}}">
								</div>
		        				
		        			</div>
		        			
		        		</div>		        		

					</div>
					<div class="ui tab" data-tab="work">
						<div name = "acview" style = "display:none" >
							<div class = "ui grid row">
				        		<div class ="three wide column fbc labelpane">

				        			<div class = "twelve wide column bspacing">
										<label class = "formlabel">Adviser Category</label>
													
									</div>

									<div class = "twelve wide column bspacing">
										<label class = "formlabel">Position</label>
													
									</div>

									<div class = "twelve wide column bspacing">
										<label class = "formlabel">Office Name</label>
													
									</div>

									<div class = "twelve wide column bspacing">
										<label class = "formlabel">Office Address</label>
															
									</div>

									<div class = "twelve wide column bspacing">
										<label class = "formlabel">AC Sector</label>
															
									</div>

									<div class = "twelve wide column bspacing">
										<label class = "formlabel">AC Category</label>
															
									</div>
																
								</div>

								<div class ="eleven wide column fieldpane">

									<div class = "twelve wide column bspacing9">
										<p>Adviser Categ</p>
														
									</div>

									<div class = "twelve wide column bspacing9">
										<p>Position</p>
														
									</div>

									<div class = "twelve wide column bspacing9">
										<p>OfName</p>
															
									</div>

									<div class = "twelve wide column bspacing9">
										<p>OfAdd</p>
															
									</div>

									<div class = "twelve wide column bspacing9">
										<p>AC Sector</p>
															
									</div>

									<div class = "twelve wide column bspacing9">
										<p>AC Categ</p>
															
									</div>
																
								</div>
											

				        	</div>
			        	</div>

			        	<div name = "tpview" style = "display:none" >
			        		<div class = "ui grid row">
				        		<div class ="three wide column fbc labelpane">

				        			<div class = "twelve wide column bspacing">
										<label class = "formlabel">Adviser Category</label>
													
									</div>

									<div class = "twelve wide column bspacing">
										<label class = "formlabel">Position</label>
													
									</div>

									<div class = "twelve wide column bspacing">
										<label class = "formlabel">Unit/Office</label>
													
									</div>
																
								</div>

								<div class ="eleven wide column fieldpane">

									<div class = "twelve wide column bspacing9">
										<p>Adviser Categ</p>
														
									</div>

									<div class = "twelve wide column bspacing9">
										<p>Position</p>
														
									</div>

									<div class = "twelve wide column bspacing9">
										<p>Unit/Of</p>
															
									</div>
																
								</div>
											

				        	</div>
			        	</div>

		        			

					</div>
					<div class="ui tab" data-tab="train">
						<div class = "ui grid row">
				        	<div class ="three wide column fbc labelpane">

				        		<div class = "twelve wide column bspacing">
									<label class = "formlabel">Title</label>
												
								</div>

								<div class = "twelve wide column bspacing">
									<label class = "formlabel">Training Category</label>
													
								</div>

								<div class = "twelve wide column bspacing">
									<label class = "formlabel">Date</label>
													
								</div>

								<div class = "twelve wide column bspacing">
									<label class = "formlabel">Time</label>
														
								</div>

								<div class = "twelve wide column bspacing">
									<label class = "formlabel">Speaker(s)</label>
														
								</div>

								<div class = "twelve wide column bspacing">
									<label class = "formlabel">Organizer</label>
														
								</div>
																
							</div>

							<div class ="eleven wide column fieldpane">

								<div class = "twelve wide column bspacing9">
									<p>Adviser Categ</p>
													
								</div>

								<div class = "twelve wide column bspacing9">
									<p>Position</p>
													
								</div>

								<div class = "twelve wide column bspacing9">
									<p>OfName</p>
														
								</div>

								<div class = "twelve wide column bspacing9">
									<p>OfAdd</p>
														
								</div>

								<div class = "twelve wide column bspacing9">
									<p>AC Sector</p>
														
								</div>

								<div class = "twelve wide column bspacing9">
									<p>AC Categ</p>
														
								</div>
																
							</div>
											

				        	</div>
		        				

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