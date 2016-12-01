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

									<div class = "four fields">

										<div class = "field">
											<label>Mobile Number <span class="asterisk">*</span></label>

										
											<div class = "ui input field">
												<input type="text" name = "mobile" placeholder="+639*********">
												
											</div>

										</div>

										<div class = "field">
											<label>Landline <span class="asterisk">*</span></label>

										
											<div class = "ui input field">
												<input type="text" name = "landline" placeholder="e.g. 4479049">
												
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
											<input type = "file" accept="image/jpeg, image/png" name = "upphoto"/>
											
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
													<option value="1">Opt 1</option>
												</select>
											</div>
											
											
										</div>

										<div class = "field">
											<label>AC Sub-category <span class="asterisk">*</span></label>

											<div class = "field">
												<select  class="ui selection dropdown" name="acsubcateg">
													<option class="disabled">Select One</option>
													<option value="1">Opt 1</option>
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
						<button type = "button" name="submit" 
								class="ui large button  savebtnstyle" onclick = "controlaction()">

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
		var lecturers = new Array();

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

		function addarritem(index) {
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


		}//delete from array


		function controlaction() {
			var slctdtype = $("input[name='advcateg']:checked").val();
			var traintitle = new Array();
			var traincateg = new Array();
			var location = new Array();
			var sdate = new Array();
			var edate = new Array();
			var stime = new Array();
			var etime = new Array();
			var speaker = new Array();
			var org = new Array();

			for(var count = 0 ; count <= rowcount ; count++) {
				traintitle.push(document.getElementsByName('traintitle')[count].value);
				traincateg.push(document.getElementsByName('traincateg')[count].value);
				location.push(document.getElementsByName('location')[count].value);
				sdate.push(document.getElementsByName('trainsdate')[count].value);
				edate.push(document.getElementsByName('trainedate')[count].value);
				stime.push(document.getElementsByName('trainstime')[count].value);
				etime.push(document.getElementsByName('trainetime')[count].value);
				//speaker.push(document.getElementsByName('trainlecturer')[count].value);
				org.push(document.getElementsByName('trainorg')[count].value);
			};

			if (slctdtype == 0) {
				var data = {
					'advid' : document.getElementsByName('advid')[0].value,
					'lname' : document.getElementsByName('lname')[0].value,
					'fname' : document.getElementsByName('fname')[0].value,
					'mname' : document.getElementsByName('mname')[0].value,
					'bdate' : document.getElementsByName('bdate')[0].value,
					'gender' : $("input[name='gender']:checked").val(),
					'street' : document.getElementsByName('street')[0].value,
					'barangay' : document.getElementsByName('barangay')[0].value,
					'city' : document.getElementsByName('city')[0].value,
					'province' : document.getElementsByName('province')[0].value,
					'mobile' : document.getElementsByName('mobile')[0].value,
					'landline' : document.getElementsByName('landline')[0].value,
					'email' : document.getElementsByName('email')[0].value,
					'facebook' : document.getElementsByName('facebook')[0].value,
					'twitter' : document.getElementsByName('twitter')[0].value,
					'instagram' : document.getElementsByName('instagram')[0].value,
					'advcateg' : slctdtype,
					'durstart' : document.getElementsByName('durationsdate')[0].value,
					'durend' : document.getElementsByName('durationedate')[0].value,
					'acposition' : document.getElementsByName('acposition')[0].value,
					'officename' : document.getElementsByName('officename')[0].value,
					'officeadd' : document.getElementsByName('officeadd')[0].value,
					'acsubcateg' : document.getElementsByName('acsubcateg')[0].value,
					'acsector' : $("select[name='acsector']").val(),
					'traintitle' : traintitle,
					'traincateg' : traincateg,
					'location' : location,
					'sdate' : sdate,
					'stime' : stime,
					'etime' : etime,
					'edate' : edate,
					'speaker' : lecturers,
					'org' : org,
					'profpic' : document.getElementsByName('upphoto')[0].files[0],
					'_token' : '{{ Session::token() }}'
				};

			} else if(slctdtype == 1 || slctdtype == 2) {
				var data = {
					'advid' : document.getElementsByName('advid')[0].value,
					'lname' : document.getElementsByName('lname')[0].value,
					'fname' : document.getElementsByName('fname')[0].value,
					'mname' : document.getElementsByName('mname')[0].value,
					'bdate' : document.getElementsByName('bdate')[0].value,
					'gender' : $("input[name='gender']:checked").val(),
					'street' : document.getElementsByName('street')[0].value,
					'barangay' : document.getElementsByName('barangay')[0].value,
					'city' : document.getElementsByName('city')[0].value,
					'province' : document.getElementsByName('province')[0].value,
					'mobile' : document.getElementsByName('mobile')[0].value,
					'landline' : document.getElementsByName('landline')[0].value,
					'email' : document.getElementsByName('email')[0].value,
					'facebook' : document.getElementsByName('facebook')[0].value,
					'twitter' : document.getElementsByName('twitter')[0].value,
					'instagram' : document.getElementsByName('instagram')[0].value,
					'advcateg' : slctdtype,
					'durstart' : document.getElementsByName('durationsdate')[0].value,
					'durend' : document.getElementsByName('durationedate')[0].value,
					'authorder' : document.getElementsByName('authorder')[0].value,
					'pnppost' : document.getElementsByName('position')[0].value,
					'suboffice' : document.getElementsByName('secondary')[0].value,
					'traintitle' : traintitle,
					'traincateg' : traincateg,
					'location' : location,
					'sdate' : sdate,
					'stime' : stime,
					'etime' : etime,
					'edate' : edate,
					'speaker' : lecturers,
					'org' : org,
					'profpic' : document.getElementsByName('upphoto')[0].files[0],
					'_token' : '{{ Session::token() }}'
				};


			}//if (slctdtype == 0) {

			/**if(action == 0) {

				var url = {{url('adviser/add')}};

			} else if(edit == 1) {
				var url = {{url('adviser/edit')}};


			}//if(action == 0) {**/

			$.ajax({
				type: "POST",
				url: "{{url('adviser/add')}}",
				data: data,
				mimeType: "multipart/form-data",
    			contentType: false,
   				processData: false,
			   	success : function(info) {
			   		
			   		alert(info);
			   	}//success : function() {
			});

			console.log(document.getElementsByName('upphoto')[0].files[0]);

			
		}//function controlaction() {
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