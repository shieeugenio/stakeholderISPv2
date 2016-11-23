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
						Basic Information
					</div>
					<div class="item" id = "tab2"  data-tab="work">
					    Work
					</div>
					<div class="item" id = "tab3" data-tab = "train">
					    Training
					</div>
				</div>

		        <div class = "tabbody ui bottom attached">
		        	<div class="ui tab active" data-tab="basicinfo">
		        		<div class = "ui grid">
		        			<div class = "thirteen wide column ">
		        				<div class = "ui grid row">
		        					<div class ="three wide column labelpane">
										<div class = "twelve wide column bspacing">
											<label class = "formlabel">Contact No</label>
													
										</div>

										<div class = "twelve wide column bspacing">
											<label class = "formlabel">Birthdate</label>
													
										</div>

										<div class = "twelve wide column bspacing">
											<label class = "formlabel">Home Address</label>
													
										</div>
														
									</div>

									<div class ="eleven wide column fieldpane">
										<div class = "twelve wide column bspacing9">
											<p>Contact No</p>
													
										</div>

										<div class = "twelve wide column bspacing9">
											<p>Contact No</p>
													
										</div>

										<div class = "twelve wide column bspacing9">
											<p>Contact No</p>
													
										</div>
														
									</div>
									

		        				</div>
			        			
		        			
		        			</div>
		        			<div class  = "three wide column ui orange">
		        				Profile pic
		        				
		        			</div>
		        			
		        		</div>		        		

					</div>
					<div class="ui tab" data-tab="work">
							tab 2
		        			

					</div>
					<div class="ui tab" data-tab="train">
							tab 3
		        				

					</div>
		        	
		        </div>
	        	
	        </div>
	      
	    </div>
		
	</div>


	<script type="text/javascript">
		$('#tab1').attr('class', 'mlink item active');

	</script>
@stop