@extends('module.publichome')

@section('phomesection')

	<div class =  "dcon">

					<br>
					<h6 class="ui horizontal divider divtitle">
						Advisory Council
					</h6>

					<div id = "accardlist" class = "ui doubling grid cardlist2">

						@foreach($directory[0] as $acrec)

							<div class = "four wide column colheight">
								<div class = "cardstyleportrait">
									@if($acrec->imagepath != "")
										<img class = "advphoto1" src="{{URL::asset($acrec->imagepath)}}"/>
									@else
										<img class = "advphoto1" src="{{URL::asset('objects/Logo/InitProfile.png')}}"/>
									@endif
									<div class = "advdata1">
										<h5 class = "name">{{$acrec->lname}}, {{$acrec->fname}} {{$acrec->mname}} (AC)</h5>
										<p class = "p1">
											{{$acrec->acpositionname}} <br>
											{{$acrec->officename}} <br>
											
											
											
										</p>

										<p class = "p2"> Member since {{date('M Y',strtotime($acrec->startdate))}} &nbsp;&nbsp;</p>
										
									</div>
								</div>

							</div>
						@endforeach

					</div>
					<br>
					<h4 class="ui horizontal divider divtitle">
						TWG & PSMU
					</h4>

					<div id = "tpcardlist" class = "ui doubling grid cardlist2">

						@foreach($directory[1] as $tprec)
							<div class = "four wide column colheight1">
								<div class = "cardstyleportrait">
									@if($tprec->imagepath != "")
										<img class = "advphoto1" src="{{URL::asset($tprec->imagepath)}}"/>
									@else
										<img class = "advphoto1" src="{{URL::asset('objects/Logo/InitProfile.png')}}"/>
									@endif
									<div class = "advdata1">
										<h5 class = "name">{{$tprec->lname}}, {{$tprec->fname}} {{$tprec->mname}}

											@if($tprec->policetype == 1)
												(TWG)
											@else
												(PSMU)
											@endif
										</h5>
										<p class = "p1">
											{{$tprec->PositionName}} <br>

											@if($tprec->UnitOfficeQuaternaryName != "")
												{{$tprec->UnitOfficeQuaternaryName}} 

											@elseif($tprec->UnitOfficeTertiaryName != "")
												{{$tprec->UnitOfficeTertiaryName}} 

											@elseif($tprec->UnitOfficeSecondaryName != "")
												{{$tprec->UnitOfficeSecondaryName}} 

											@else
												{{$tprec->UnitOfficeName}} 

											@endif

											
										</p>

										<p class = "p2"> Member since {{date('M Y',strtotime($tprec->startdate))}} &nbsp;&nbsp;</p>
										
									</div>
								</div>

							</div>
						@endforeach
							

					</div>

		<!--<div class = "ui doubling grid cardlist2">
				<div class = "four wide column colheight1">
					<div class = "cardstyleportrait">
						<img class = "advphoto1" src=""/>

						<div class = "advdata1">
							<h5 class = "name"></h5>
							<p>
							</p>

								
						</div>
					</div>

				</div>

		</div>-->
			
	</div>


@stop