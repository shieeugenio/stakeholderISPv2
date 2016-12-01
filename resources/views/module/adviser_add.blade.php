@extends('baseform')
	
@section('maincontent')

	<div class = "advcon">
		<div class = "formattp tablepane">
			<div class = "mtitle">
				Add Adviser
								
			</div>

			<div class = "tablecon">
				<form class = "ui form" id = "form">

					<input type="hidden" value="" name="advid"/>


					<div class = "fborder tablepane">
						<div class = "minvtitle mtitle">
							Profile			
						</div>

						<div class = "tablecon">

							<div class = "ui grid">
								<div class = "thirteen wide column">
									<h4 class="ui dividing header">Basic Information</h4>

									<div class = "field">
										<label>Name <span class="asterisk">*</span></label>

										<div class = "four fields">
											<div class = "ui input field">
												<input type="text" name = "lname" placeholder="Last Name">
												
											</div>

											<div class = "ui input field">
												<input type="text" name = "fname" placeholder="First Name">

											</div>

											<div class = "ui input field">
												<input type="text" name = "mname" placeholder="Middle Name">
												
											</div>
											
										</div>
										
									</div>
									<div class = "four fields">
										<div class = "field">
											<label>Birthdate <span class="asterisk">*</span></label>

											<div class = "ui input field">
												<input type="date" name = "bdate">
													
											</div>
										</div>

										<div class = "field">
											<label>Gender <span class="asterisk">*</span></label>
											<div class = "inline fields">
												<div class = "ui radio field">
													<input type="radio" checked name="gender" value="0"  tabindex="0" class="hidden">
													<label>Male</label>
														
												</div>
												<div class = "ui radio field">
													<input type="radio" name="gender" value="1"  tabindex="0" class="hidden">
													<label>Female</label>
													
														
												</div>
												
											</div>
										</div>			
									</div>

									<div class = "field">
										<label>Home Address <span class="asterisk">*</span></label>

										<div class = "four fields">
											<div class = "ui input field">
												<input type="text" name = "street" placeholder="Street Address">
												
											</div>

											<div class = "ui input field">
												<input type="text" name = "barangay" placeholder="Barangay">

											</div>

											<div class = "ui input field">
												<input type="text" name = "city" placeholder="City">
												
											</div>

											<div class = "ui input field">
												<input type="text" name = "province" placeholder="Province">
												
											</div>


											
										</div>
										
									</div>

									<h4 class="ui dividing header">Contact Information</h4>

									<div class = "field">
										<label>Contact Number</label>

										<div class = "four fields">
											<div class = "ui input field">
												<input type="text" name = "contact" placeholder="+639*********">
												
											</div>

											<div class = "ui input field">
												<input type="text" name = "contact" placeholder="+639*********">

											</div>
											
										</div>
										
									</div>

									<div class = "four fields">
										<div class = "field">
											<label>Email Address <span class="asterisk">*</span></label>

											<div class = "ui input field">
												<input type="email" name = "email" placeholder="e.g. sample@yahoo.com">
												
											</div>
										</div>

										<div class = "field">
											<label>Facebook </label>
											<div class = "ui input field">
												<input type="text" name = "facebook" placeholder="e.g. sampleusername">
												
											</div>
										</div>

										<div class = "field">
											<label>Twitter </label>
											<div class = "ui input field">
												<input type="text" name = "twitter" placeholder="e.g. sampleusername">
												
											</div>
										</div>

										<div class = "field">
											<label>Instagram </label>
											<div class = "ui input field">
												<input type="text" name = "instagram" placeholder="e.g. sampleusername">
												
											</div>
										</div>		
									</div>
									

								</div>
								<div class = "three wide column">
									<div class = "fborder piccon">
										<div class = "ui medium image">
											<img class = "profpic" src="{{URL::asset('objects/Logo/InitProfile.png')}}">
										</div>

										<div class = "ui input sixteen wide field">
											<input type = "file"/>
											
										</div>
										
									</div>

								</div>
								
							</div>

							<br>
						</div>

						<div class = "fbtop minvtitle mtitle">
							Advisory Council <!-- SUBJECT FOR CHANGE-->	
						</div>

						<div class = "tablecon">
							<div class = "field">
								<div class = "field">
									<label>Adviser Category <span class="asterisk">*</span></label>
									<div class = "inline fields">
										<div class = "ui radio field">
											<input type="radio" checked onchange = "changeform(this.value)" name="advcateg" value="0"  tabindex="0" class="hidden">
											<label>AC</label>
												
										</div>
										<div class = "ui radio field">
											<input type="radio" onchange = "changeform(this.value)" name="advcateg" value="1"  tabindex="0" class="hidden">
											<label>TWG</label>
											
												
										</div>

										<div class = "ui radio field">
											<input type="radio" onchange = "changeform(this.value)" name="advcateg" value="2"  tabindex="0" class="hidden">
											<label>PSMU</label>
											
												
										</div>
										
									</div>
								</div> <br>

								<div class = "field">
									<label>Duration </label>
									
								</div>

								<div class = "five fields">

									<div class = "field">
										<label>Start Date <span class="asterisk">*</span></label>


										<div class = "ui input field">
											<input type="date" name = "durationsdate">
												
										</div>
									</div>

									<div class = "field">
										<label>End Date <span class="asterisk">*</span></label>

										<div class = "ui input field">
											<input type="date" name = "durationedate">
												
										</div>
									</div>	

								</div>

								<!--<div class = "field">
									<label>Authority <span class="asterisk">*</span></label>

									<div class = "five fields">
										<div class = "ui input field">
											<input type="file" name = "letterorder" >
											
										</div>
											
									</div>
										
								</div>-->



								<div id = "tempfields">
									<!--<div class = "five fields">
										<div class = "field">
											<label>AC Position <span class="asterisk">*</span></label>


										<div class = "five fields">
											<div class = "ui input field">
											
												<input type="text" name = "position" placeholder="e.g. Software Developer">
												

											<div class = "field">
												<select  class="ui selection dropdown" name="acposition">
													<option class="disabled">Select One</option>
													<option value="1">Opt 1</option>
												</select>
											</div>
												
												
										</div>
									</div>
									
									<div class = "three fields">
										<div class = "field">
											<label>Office Name <span class="asterisk">*</span></label>

											<div class = "ui input field">
												<input type="text" name = "officename" placeholder="e.g. Sample Inc.">
											</div>
											
											
										</div>

										<div class = "field">
											<label>Office Address <span class="asterisk">*</span></label>

											<div class = "ui input field">
												<input type="text" name = "officeadd" placeholder="Street Address Barangay City">
												
											</div>
												
										</div>
									</div>

									<div class = "five fields">
										<div class = "field">
											<label>AC Category <span class="asterisk">*</span></label>

											<div class = "field">
												<select  class="ui selection dropdown" name="accateg">
													<option class="disabled">Select One</option>
													
													@foreach ($acsec as $acsec)
													<option value="{{$acsec->ID}}">{{$acsec->sectorname}}</option>
													@endforeach
												
												</select>
											</div>
											
											
										</div>

										<div class = "field">
											<label>AC Sub-category <span class="asterisk">*</span></label>

											<div class = "field">
												<select  class="ui selection dropdown" name="acsubcateg">
													<option class="disabled">Select One</option>
													
													@foreach ($accat as $accat)
													<option value="{{$accat->ID}}">{{$accat->categoryname}}</option>
													@endforeach
												
												</select>
											</div>
											
											
										</div>
										
									</div>
									
									<div class = "five fields">
										<div class = "field">
											<label>AC Sector <span class="asterisk">*</span></label>

											<div class = "field">
												<select  multiple class="ui selection dropdown" name="acsector">
													<option class="disabled">Select One or More</option>
													<option value="1">Opt 1</option>
												</select>
											</div>
											
											
										</div>
									</div>-->
								</div>

								<br>

								
							</div>
									
						</div>

						<div class = "fbtop minvtitle mtitle">
							Training							
						</div>

						<div class = "tablecon">
							<table class = "ui celled padding table" id = "traintable">
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
										<!--<tr class = "trow1">
											<td><center>
												<div class = "ui input field">
													<input type="text" name = "traintitle" placeholder="e.g. The Sample Title">
														
												</div>
											</center></td>

											<td><center>

												<div class = "field">
													<select id = "select" class="ui selection dropdown" onchange = "showfield(this.value, rowcount)" name="traincateg">
														<option class="disabled">Select One</option>
														<option value="Advisory Council Summit">Advisory Council Summit</option>
														<option value="Family Conference">Family Conference</option>
														<option value="Boot Camp (Basic)">Boot Camp (Basic)</option>
														<option value="Boot Camp (Master)">Boot Camp (Master)</option>
														<option value="Lecture Series">Lecture Series</option>
														<option value="Strategy Refresh">Strategy Refresh</option>
														<option value="7">Others</option>
													</select>

													<div class = "ui input"  name = "othercon" style = "display:none"> <br>
														<input type="text" name = "othercat" placeholder="Please specify (required)">
														
													</div>
												</div>
												
											</center></td>

											<td><center>
												<div class = "ui input field">
													<input type="text" name = "location" placeholder="e.g. Makati City">
														
												</div>
											</center></td>

											<td><center>
												<div class = "field">
													<div class = "ui input field">
														<input type="date" max = "{{date('Y-m-d', strtotime(date('Y-m-d')  . ' +1 day'))}}" name = "trainsdate">
														
													</div>

													<div class = "ui input field">
														

														<input type="time" name = "trainstime">
															
													</div>
												</div>
											</center></td>

											<td><center>

												<div class = "field">
													<div class = "ui input field">
														<input type="date" max = "{{date('Y-m-d', strtotime(date('Y-m-d')  . ' +1 day'))}}" name = "trainedate">
														
													</div>

													<div class = "ui input field">
														

														<input type="time" name = "trainetime">
															
													</div>
												</div>
											</center></td>

											<td><center>
												<div class = "five fields">

													<div class = "divpercon" name = "pcontainer">

														<ul class = "perlist" name = "lecturer">
															<li class = "inputitem" name="inputlist">

																<input type="text" 
																	placeholder="LN, FN MI" 
																	class = "perfield error" 
																	name="inputlecturer"
																	onclick = "divonfocus(rowcount)"
																	onkeydown = "if(event.keyCode == 13){ addarritem(rowcount);}" 
																	value=''/>
															</li>
														</ul>

													</div>
													
													
												</div>

												<div class="field">
													<textarea  name = "trainlecturer" class = "areastyle" rows = "4" placeholder="Type here..."></textarea>
												</div>
									
											</center></td>


											<td><center>
												<div class = "ui input field">
													<input type="text" name = "trainorg" placeholder="e.g. CPSM">
														
												</div>
											</center></td>

										</tr>-->


								</tbody>

								<tfoot>
									<tr class = "addtr" onclick = "addrow()"><td colspan = "7"><center><i class = "add circle icon"></i> ADD </center></td></tr>
								</tfoot>
								
							</table>

						</div>

						<br>
								
					</div>

					<br>

					<center>
						<button type = "submit" name="submit" onclick ="if(confirm('Save?')) {addProfile()}"
								class="ui large button submit savebtnstyle">

							Save
						</button>
						<button type = "reset" 
								onclick = "if(confirm('Cancel?')) { window.location='{{url('directory')}}'}" 
								class="ui large button">
							Cancel

						</button>
					</center>
				</form>


				
			</div>
							
		</div>
		
	</div>

	<script type="text/javascript" src="{{ URL::asset('js/formcontrol.js') }}"></script>

	<script type="text/javascript">
		$('#tab3').attr('class', 'mlink item active');
		//var lecturers = new Array();

		addT1Elements();

		for (var ctr = rowcount ; ctr < 3 ; ctr++) {
			rowcount = ctr;
			addrow();

		};

		function changeform(selcat) {
			if(selcat == 0) {
				removeElements();
				addT1Elements();

			} else {
				removeElements();
				addT2Elements();

			}//if(selcat == 0) {

		}//function changeform() {

		function showfield() {

			var categsel = document.getElementsByName('traincateg');

			for(var find = 0 ; find < categsel.length ; find++) {
				if(categsel[find].value == 7) {
					document.getElementsByName('othercon')[find].style.display = "block";

				} else {
					document.getElementsByName('othercon')[find].style.display = "none";

				}//if

			};

		}//function showfield(value) {

		/*function addarritem(index) {
			var text = document.getElementsByName('inputlecturer')[index].value;
			var pattern = new RegExp("^(?=.*(\d|\w))[A-Za-z0-9 .,'-]{3,}$");
			var flag = 0;

			//if(pattern.test(text) == true) {
				for (var count = 0 ; count < lecturers.length ; count++) {
					if(text === lecturers[count][0] && index == lecturers[count][1]) {
						flag = 1;
						break;
					}//if
				};//for

				if(flag == 0) {
					additem(text, index);
					lecturers.push(new Array(text, index));

				}//if(flag == 0) {]

			//}//pattern

		}//add item to array

		function deletearritem(index, rowindex) {
			var ulist = document.getElementsByName('lecturer')[rowindex];
			var text = ulist.getElementsByTagName('li')[index].firstChild.innerHTML;

			deleteitem(index, rowindex, ulist);

			for (var count = 0 ; count < lecturers.length ; count++) {
				if(text === lecturers[count][0] && rowindex == lecturers[count][1]) {
					lecturers.splice(count, 1);
					break;
				}//if
					
			};//for

			console.log(lecturers);


		}//delete from array*/


		/**

			NOTE:

				yung array na lecturers -> 2 dime
				ang laman is yung lecturer name and yung row index kung san ininput
				para madistinguish kung saang training item siya nilagay ng user.

				so bale ganto ang itsura

				input:

				training 1
				lecturers: shie, mae, lemon
				row index/count: 0

				training 2
				lecturers: red, blue, yellow
				row index/count: 1

				lecturer: (array)
					shie, 0
					mae, 0
					lemon, 0
					red, 1
					blue, 1
					yellow, 1

				data order ng array depends sa pagkakainput so pwedeng nakashuffle yan

		**/
	</script>




@stop