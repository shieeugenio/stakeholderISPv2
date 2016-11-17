@extends('baseform')

	@section('maincontent')

	<div class = "advcon">
		<div class = "btncon">
			<div class = "ui grid">
				<div class = "row">
					<div class = "five wide column moveright">
						<div class = "ui floating icon button tiny" title = "add advisor">
							<i class="plus icon topmargin"></i>
							
						</div>
						<div class="ui floating icon dropdown button tiny topmargin" title = "filter list">
							<i class="filter icon"></i>
							<div class="menu">
						    	<div class="header">
						      		Filter List
						    	</div>
						    <div class="item">
						    	Advisory Council (AC)
						    </div>
						    <div class="item">
						     	PSMU
						    </div>
						    <div class="item">
						    	Technical Worker Group (TWG)
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
			<div class = "ui grid">
				<div class="ui link cards">
					<!--<div class="card">
				    	<div class="image">
				      		<img src="{{URL::asset('objects/Logo/InitProfile.png')}}">
				    	</div>
				    	<div class="content">
				    		<div class="header">Name</div>

				    		<div class="description">
						     	Other Details
						    </div>
				    	</div>
					</div>-->
		
				</div>
				
			</div>
			
		</div>
		
	</div>

	<script type="text/javascript">
		$('#tab3').attr('class', 'mlink item active');

	</script>


@stop