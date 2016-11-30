@extends('baseform')

@section('maincontent')

	<div class="maintecon">
		<div class = "ui grid gridcellh">
			<div class = "three wide column">
				<div class="ui vertical menu">
					<div class = "item grey">
						<div class="header">Advisory Council (AC)</div>
					</div>
					<div class="item">
		    			<div class="menu">

		    				<a class="item" id = "m1" href = "{{url('maintenance/accategory')}}">Advisory Council Category</a>
		    				<a class="item" id = "m2" href = "{{url('maintenance/acsubcategory')}}">Advisory Council Sub-category</a>
		    				<a class="item" id = "m3" href = "{{url('maintenance/acposition')}}">Advisory Council Position</a>
		    				<a class="item" id = "m4" href = "{{url('maintenance/acsector')}}">Advisory Council Sector</a>


		    			</div>
		  			</div>
		  			<div class = "item grey">
		  				<div class="header">PSMU & TWG</div>
					</div>

		  			<div class = "item">
		    			<div class="menu">

		    				<a class="item" id = "m5" href = "{{url('maintenance/primaryoffice')}}">Primary Unit/Office</a>
		    				<a class="item" id = "m6" href = "{{url('maintenance/secondaryoffice')}}" >Secondary Unit/Office</a>
		    				<a class="item" id = "m7" href = "{{url('maintenance/policeposition')}}">PNP Position</a>

		    			</div>
		  				
		  			</div>

				</div>
				
			</div>

			<div class = "thirteen wide column">
				<div class = "mcontent">
					@yield('mtablesection')
					
				</div>
					
			</div>
			
		</div>
	</div>

	<script type="text/javascript">
		$('#tab2').attr('class', 'mlink item active');

	</script>

	<script type="text/javascript" src = "{{ URL::asset('js/formvalidation.js') }}"></script>






@stop