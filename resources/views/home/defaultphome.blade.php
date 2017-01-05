@extends('module.publichome')

@section('phomesection')

	<div class =  "dcon">

		<div class = "ui doubling grid cardlist2">

			@foreach($directory as $ritem)
				<div class = "four wide column colheight1">
					<div class = "cardstyleportrait">
						<img class = "advphoto1" src="{{URL::asset($ritem->imagepath)}}"/>

						<div class = "advdata1">
							<h5 class = "name">{{$ritem->lname}}, {{$ritem->fname}} {{$ritem->mname}}</h5>
							<p>@if($ritem->category == 0)
										Advisory Council

									@elseif($ritem->category == 1)
										Technical Worker Group


									@elseif($ritem->category == 2)
										Police Strategy Management Unit

									@endif

									<br>
									{{$ritem->email}} <br> {{$ritem->contactno}} | {{$ritem->landline}}
							</p>

								
						</div>
					</div>

				</div>
			@endforeach

		</div>
			
	</div>


@stop