<!DOCTYPE html>

<html>
	<head>
		<title>PNP Advisory Council</title>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=yes">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<link rel="shortcut icon" type="image/png" href="{{URL::asset('images/Philippine-National-Police.png')}}"> <!--LOGO-->

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/semantic.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/stylev1.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/icon.css')}}">

		<!-- JS -->
		<script type="text/javascript" src="{{ URL::asset('js/jquery-2.1.4.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/semantic.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/initialization.js') }}"></script>
	</head>

	<body onload = "init()" class = "phbdy">
		<header class = "banner1">
			<div class = "ui relaxed grid">
				<div class = "six wide column" onclick="window.location='{{url('/')}}'">
					<image class = "acname1" src="{{URL::asset('objects/Logo/ACName4.png')}}"/>
				</div>		
			</div>
				
		</header>

		<div class = "mainbody">
			<div class = "ui grid">
				<div class = "row">
					<div class = "four wide column">
						<div class = "ui segment logcon" id="summary">
							<div class = "ui rail">
								<div class = "ui sticky">
									<div class="ui container">
										<div class = "loghead">
											<i class = "inverted circular user icon"></i>
											Sign in

											<hr class = "hr1">
										</div>
										<form class = "ui form">
											<div class = "logcontent">
												<div class ="twelve wide column  bspacing8">
													<div class="ui input logfield">
														<input type="text" placeholder="Username">
													</div>
													
												</div>

												<div class ="twelve wide column  bspacing8">
													<div class="ui input logfield">
														<input type="password" placeholder="Password">
													</div>
													
												</div>

												<div class ="ten wide column  bspacing8 centerbtn">
													<button class="ui medium button">
															Sign in
													</button>
												</div>


												
											</div>
										</form>
												
									</div>
									
								</div>
								
							</div>
									
							
						</div>
						
					</div>

					<div class = "twelve wide column">
						<div class = "ui segment rightpane">
							<div class = "row">
								<div class = "nine wide column colheight">
									<div class="ui icon input big search2">
										<i class="search icon"></i>
										<input type="text" placeholder="Search...">
									</div>
								</div>
								
							</div>

							<div class = "hcontent">
								@yield('phomesection')
							</div>
						</div>
						
					</div>
					
				</div>
				
			</div>
			
		</div>

	</body>
</html>