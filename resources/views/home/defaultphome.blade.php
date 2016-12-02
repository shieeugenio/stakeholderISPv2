@extends('module.publichome')

@section('phomesection')

	<div class =  "dcon">

		<div class = "ui doubling grid cardlist2">

			@foreach($directory as $ritem)
				<div class = "four wide column colheight1">
					<div class = "cardstyleportrait">
						<img class = "advphoto1" src="{{$ritem->imagepath}}"/>

						<div class = "advdata1">
							<h4 class = "name">{{$ritem->lname}}, {{$ritem->fname}} {{$ritem->mname}}</h4>
							<p>@if($ritem->category == 0)
										Advisory Council

									@elseif($ritem->category == 1)
										Technical Worker Group


									@elseif($ritem->category == 2)
										Police Strategy Management Unit

									@endif

									<br>
									$ritem->email | $ritem->contactno | $ritem->landline
							</p>

								
						</div>
					</div>

				</div>
			@endforeach

		</div>
			
	</div>


@stop