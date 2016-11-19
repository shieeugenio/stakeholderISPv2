@extends('baseform')

	@section('maincontent')

	<div class = "advcon">
		<div class = "btncon">
			<div class = "ui grid">
				<div class = "row">
					<div class = "five wide column moveright">
						<div class = "ui icon addbtn button tiny" title = "add">
							<i class="plus icon topmargin"></i>
							
						</div>
						<div class="ui icon addbtn dropdown button  tiny topmargin" title = "filter list">
							<i class="filter icon"></i>
							<div class="menu">
						    	<div class="item">
							    	All
							    </div>
							    <div class="item">
							    	Name
							    </div>
							    <div class = "divider"></div>
						    	<div class="header">
						      		Categories
						    	</div>
						    	<div class = "divider"></div>
							    <div class="item">
							    	Advisory Council (AC)
							    </div>
							    <div class="item">
							     	Police Strategry Management Unit (PSMU)
							    </div>
							    <div class="item">
							    	Technical Worker Group (TWG)
							    </div>
							    <div class = "divider"></div>
							    <div class="header">
						      		Date Created
						    	</div>
						    	<div class = "divider"></div>
						    	<div class="item">
							     	Ascending
							    </div>
							    <div class="item">
							    	Descending
							    </div>


						  </div>
						</div>

						<div class="ui icon input topmargin">
							<i class="search icon"></i>
							<input type="text" placeholder="Search...">
						</div>
					</div>
					
				</div>
			</div>

			
		</div>

		<div class = "advcardcon">
			<hr>

			<div class = "ui doubling grid cardlist">
				<div class = "five wide column colheight">
					<div class = "cardstyle">
						<img class = "advphoto" src="{{URL::asset('objects/Logo/InitProfile.png')}}"/>

						<div class = "advdata">
							<h4 class = "name">Eugenio, Shiela Mae F.</h4>
							<p>Other data comes here</p>
							
						</div>
					</div>

				</div>
				<div class = "five wide column colheight">
					<div class = "cardstyle">
						<img class = "advphoto" src="{{URL::asset('objects/Logo/InitProfile.png')}}"/>

						<div class = "advdata">
							<h4 class = "name">Eugenio, Shiela Mae F.</h4>
							<p>Other data comes here</p>
							
						</div>
					</div>

				</div>
				<div class = "five wide column colheight">
					<div class = "cardstyle">
						<img class = "advphoto" src="{{URL::asset('objects/Logo/InitProfile.png')}}"/>

						<div class = "advdata">
							<h4 class = "name">Eugenio, Shiela Mae F.</h4>
							<p>Other data comes here</p>
							
						</div>
					</div>

				</div>
				<div class = "five wide column colheight">
					<div class = "cardstyle">
						<img class = "advphoto" src="{{URL::asset('objects/Logo/InitProfile.png')}}"/>

						<div class = "advdata">
							<h4 class = "name">Eugenio, Shiela Mae F.</h4>
							<p>Other data comes here</p>
							
						</div>
					</div>

				</div>
				<div class = "five wide column colheight">
					<div class = "cardstyle">
						<img class = "advphoto" src="{{URL::asset('objects/Logo/InitProfile.png')}}"/>

						<div class = "advdata">
							<h4 class = "name">Eugenio, Shiela Mae F.</h4>
							<p>Other data comes here</p>
							
						</div>
					</div>

				</div>
				<div class = "five wide column colheight">
					<div class = "cardstyle">
						<img class = "advphoto" src="{{URL::asset('objects/Logo/InitProfile.png')}}"/>

						<div class = "advdata">
							<h4 class = "name">Eugenio, Shiela Mae F.</h4>
							<p>Other data comes here</p>
							
						</div>
					</div>

				</div>

				
			</div>
			
				

			
		</div>
		
	</div>

	<script type="text/javascript">
		$('#tab3').attr('class', 'mlink item active');

	</script>


@stop