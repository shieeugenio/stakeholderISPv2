	<div class = "modal">
		<div id = "viewadv" class = "ui modal">
	        <div class = "header mtitle">

	        	<h3 class = "h3name" name = "name"></h3>
	            <div class = "ui icon editbtn button tiny" name="edit" title = "edit">
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
					<div class="item" id = "tab3" style="display:none" data-tab = "train">
					    Training
					</div>
				</div>

		        <div class = "tabbody ui bottom attached">
		        	<div class="ui tab active" data-tab="basicinfo">
		        		<div class = "ui grid">
		        			<div class = "thirteen wide column">
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
												<p name="bdate"></p>
														
											</div>

											<div class = "twelve wide column bspacing9">
												<p name ="gender"></p>
														
											</div>

											<div class = "twelve wide column bspacing9">
												<p name = "address"></p>
														
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
												<label class = "formlabel">Mobile No.</label>
														
											</div>

											<div class = "twelve wide column bspacing">
												<label class = "formlabel">Landline</label>
														
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
												<p name="contactno"></p>
														
											</div>

											<div class = "twelve wide column bspacing9">
												<p name="landline"></p>
														
											</div>

											<div class = "twelve wide column bspacing9">
												<p name="email"></p>
														
											</div>

											<div class = "twelve wide column bspacing9">
												<p name="fb"></p>
														
											</div>

											<div class = "twelve wide column bspacing9">
												<p name="twitter"></p>
														
											</div>

											<div class = "twelve wide column bspacing9">
												<p name = "ig"></p>
														
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
										<label class = "formlabel">Duration</label>
													
									</div>

									<div class = "twelve wide column bspacing">
										<label class = "formlabel">AC Position</label>
													
									</div>

									<div class = "twelve wide column bspacing">
										<label class = "formlabel">Office Name</label>
													
									</div>

									<div class = "twelve wide column bspacing">
										<label class = "formlabel">Office Address</label>
															
									</div>

									<div class = "twelve wide column bspacing">
										<label class = "formlabel">AC Category</label>
															
									</div>

									<div class = "twelve wide column bspacing">
										<label class = "formlabel">AC Sub-category</label>
															
									</div>

									<div class = "twelve wide column bspacing">
										<label class = "formlabel">AC Sector</label>
															
									</div>

									
																
								</div>

								<div class ="eleven wide column fieldpane">

									<div class = "twelve wide column bspacing11">
										<p></p>
														
									</div>

									<div class = "twelve wide column bspacing11">
										<p>Date1 to date2</p>
														
									</div>

									<div class = "twelve wide column bspacing11">
										<p>AC Position</p>
														
									</div>

									<div class = "twelve wide column bspacing11">
										<p>OfName</p>
															
									</div>

									<div class = "twelve wide column bspacing11">
										<p>OfAdd</p>
															
									</div>


									<div class = "twelve wide column bspacing11">
										<p>AC Categ</p>
															
									</div>


									<div class = "twelve wide column bspacing11">
										<p>AC Sub-categ</p>
															
									</div>

									<div class = "twelve wide column bspacing11">
										<p>AC Sector</p>
															
									</div>

																
								</div>
											

				        	</div>
			        	</div>

			        	<div name = "tpview" style = "display:block" >
			        		<div class = "ui grid row">
				        		<div class ="three wide column fbc labelpane">

				        			<div class = "twelve wide column bspacing">
										<label class = "formlabel">Adviser Category</label>
													
									</div>

									<div class = "twelve wide column bspacing">
										<label class = "formlabel">Duration</label>
													
									</div>

									<div class = "twelve wide column bspacing">
										<label class = "formlabel">Authority</label>
													
									</div>

									<div class = "twelve wide column bspacing">
										<label class = "formlabel">Position</label>
													
									</div>

									<div class = "twelve wide column bspacing">
										<label class = "formlabel">Unit/Office</label>
													
									</div>
																
								</div>

								<div class ="eleven wide column fieldpane">

									<div class = "twelve wide column bspacing11">
										<p>Adviser Categ</p>
														
									</div>

									<div class = "twelve wide column bspacing11">
										<p>Date1 to date2</p>
														
									</div>

									<div class = "twelve wide column bspacing11">
										<a class = "dlink">Insert Letter Order link for downloading purposes</a>
														
									</div>

									<div class = "twelve wide column bspacing11">
										<p>Position</p>
														
									</div>

									<div class = "twelve wide column bspacing11">
										<p>Unit/Of</p>
															
									</div>
																
								</div>
											

				        	</div>
			        	</div>

		        			

					</div>
					<div class="ui tab" id = "trainingview" style="display:none" data-tab="train">
						<table class = "viewtable ui celled padding table">
							<thead>
								<tr>
									<th><center>Title</center></th>
									<th><center>Training Category</center></th>
									<th><center>Location</center></th>
									<th><center>Start</center></th>
									<th><center>End</center></th>
									<th><center>Speaker(s)</center></th>
									<th><center>Organizer</center></th>
								</tr>
							</thead>
							<tbody>
								<td><center>Data</center></td>
								<td><center>Data</center></td>
								<td><center>Data</center></td>
								<td><center>Data</center></td>
								<td><center>Data</center></td>
								<td><center>
									<ul class = "unorderedlist">
										<li>Speaker 1</li>
										<li>Speaker 2</li>
										<li>Speaker 3</li>
										<li>Speaker 4</li>

									</ul>

								</center></td>
								<td><center>Data</center></td>

							</tbody>
							
						</table>

					</div>
		        	
		        </div>
	        	
	        </div>
	      
	    </div>
		
	</div>