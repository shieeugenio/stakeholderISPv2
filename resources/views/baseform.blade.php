<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PNP Advisory Council</title>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=yes">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<link rel="shortcut icon" type="image/png" href="{{ URL::asset('') }}"> <!--LOGO-->

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/semantic.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/stylev1.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/icon.css')}}">
		<!-- JS -->
		<script type="text/javascript" src="{{ URL::asset('js/jquery-1.12.3.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/semantic.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/initialization.js') }}"></script>

		<!--Data Table plugins and design-->
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/datatable/dataTables.semanticui.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/datatable/responsive.semanticui.min.css')}}">

		<script type="text/javascript" src="{{ URL::asset('js/datatable/jquery.dataTables.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/datatable/dataTables.semanticui.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/datatable/dataTables.responsive.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/datatable/responsive.semanticui.min.js') }}"></script>

	</head>
	<body onload = "init()">
		<div class = "mainbody">
			<header class = "banner">
				<div class = "ui relaxed grid">
					<div class = "two wide column">
							<div class = "logocon">
								<image class = "logoicon" src="{{URL::asset('images/Philippine-National-Police.png')}}"/>
							
							</div>
					</div>

					<div class = "two wide column">
						<image class = "acname" src="{{URL::asset('objects/Logo/ACName.png')}}"/>
							
					</div>

					<div class = "two wide column">
						<div class = "logocon">
							<image class = "logoicon" src="{{URL::asset('images/pp_logoforae.png')}}"/>
							
						</div>
					</div>
					<div class = "ten wide column">
							<div class = "ui two row grid colcon">
								<div class = "row rightrow">
									<div class = "ucon">
										<img class="ui avatar image profile" src="{{URL::asset('objects/Logo/InitProfile.png')}}">
										<span>Username</span>
									</div>
								</div>

								<div class = "row rightrow">
									<div class="ui tabular menu">
										<div class="mlink item" id = "tab1" data-tab="home" onclick = "window.location='{{url('advisorycouncil/home')}}'">
										    Home
										</div>
										<div class="mlink item" id = "tab2"  data-tab="maintenance" onclick = "window.location='{{url('advisorycouncil/maintenance')}}'">
										    Maintenance
										</div>
										<div class="mlink item" id = "tab3" data-tab = "adviser" onclick = "window.location='{{url('advisorycouncil/adviser')}}'">
										    Adviser
										</div>

									</div>
									
								</div>
								

								
							</div>
						
						
						
					</div>
						
				
					
				</div>
				
			</header>

			<div class = "content1">
				<div class="ui tab" data-tab="home">
				</div>
				<div class="ui tab" data-tab="maintenance">
				</div>
				<div class="ui tab" data-tab="adviser">
				</div>

				@yield('maincontent')
				
			</div>

			<footer class = "footer">
				<br>
				<center>Advisory Council | 2016</center>
			</footer>
			
		</div>

		
	</body>
</html>