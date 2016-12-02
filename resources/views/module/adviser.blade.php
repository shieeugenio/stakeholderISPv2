@extends('baseform')

	@section('maincontent')

	<div class = "advcon">
		<div class = "btncon">
			<div class = "ui grid">
				<div class = "row">
					<div class = "five wide column moveright">
						<div class = "ui icon addbtn button tiny" 
							onclick = "window.location='{{url('directory/add')}}'" 
							title = "add">
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
							     	Police Strategy Management Unit (PSMU)
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
				@foreach ($directory as $ritem)
					<div class = "five1 wide column colheight">
						<div class = "cardstyle" onclick = "loadModal({{$ritem->ID}})">
							<img class = "advphoto" src="{{$ritem->imagepath}}"/>

							<div class = "advdata">
								<h4 class = "name">{{$ritem->lname}}, {{$ritem->fname}} {{$ritem->mname}}</h4>
								<p>
									@if($ritem->category == 0)
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
		
	</div>

	<script type="text/javascript">
		$('#tab3').attr('class', 'mlink item active');

	</script>


@stop