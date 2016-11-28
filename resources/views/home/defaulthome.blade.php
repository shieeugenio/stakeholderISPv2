@extends('module.home')

@section('homesection')

	<div class="dcon">
		<div class = "tablepane">
			<div class = "mtitle">Recently Added</div>

			<div class = "ui doubling grid cardlist2">
				<div class = "five1 wide column colheight">
					<div class = "cardstyle" onclick = "$('#viewadv').modal('show')">
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

@stop