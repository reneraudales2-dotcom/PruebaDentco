<!DOCTYPE html>
<html lang="en-US" class="no-js">
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        
		<!-- ==============================================
		TITLE AND META TAGS
		=============================================== -->
		<title>Dental Company HN</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Quickdev">

		<!-- ==============================================
		FAVICON
		=============================================== -->  
        <link rel="shortcut icon" href="img/master/favicon.png">
             
		<!-- ==============================================
		CSS
		=============================================== -->  
        <link rel="stylesheet" href="css/bootstrap.min.css"> 
        <link rel="stylesheet" href="css/styles.css">
		<link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
		
	</head>

<body>

<!-- LOADER -->
<div id="loader-wrapper">
<div id="loader"></div>
</div>
<!-- LOADER -->
	
	<!-- MAIN CONTAINER -->
	<div class="wrapper">
		<div class="header">
			<div class="navbar">
				<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
					  <div class="top-header">
						  <div class="content">
							<div class="leftside">
							  <div class="location-top"><p><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; Ventu Live Center</p></div>
							  <div class="location-top"><p><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp; info@dentco.hn</p></div>
							  <div class="location-top"><p><i class="fa fa-mobile" aria-hidden="true"></i>&nbsp; (504) 2204-4088</p></div>
							</div>
							<!--
							<div class="rightside">
							  <div class="social-items"><p><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></p></div> 
							  <div class="social-items"><p><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></p></div>
							  <div class="social-items"><p><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></p></div>
							  <div class="social-items"><p><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></p></div>
							</div>
							-->
						  </div>
					  </div>
					  <div class="container">
						<div class="navbar-header" >
						  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Invertir navegacion</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						  <a class="navbar-brand" href="index.html"><div class="logo-brand"><img src="img/master/logo.png" alt=""></div></a>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						  <ul class="nav navbar-nav navbar-right">
							<li><a href="index.html">INICIO</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SERVICIOS<span class="caret-drop"></span></a>
								<ul class="dropdown-menu">
									<li class="divider-top"></li>
									<li><a href="odontologia-general.html">Odontologia General</a></li>
									<li class="divider"></li>
									<li><a href="odontologia-estetica.html">Odontologia Estetica</a></li>
									<li class="divider"></li>
									<li><a href="cirugia-maxilofacial-y-traumatologia.html">Cirugia Maxilofacial y Traumatologia</a></li>
									<li class="divider"></li>
									<li><a href="endodoncia.html">Endodoncia</a></li>
									<li class="divider"></li>
									<li><a href="odontopediatria.html">Odontopediatria</a></li>
									<li class="divider"></li>
									<li><a href="ortodoncia.html">Ortodoncia</a></li>
									<li class="divider"></li>
									<li><a href="patologia-bucal.html">Patologia Bucal</a></li>
									<li class="divider"></li>
									<li><a href="periodoncia-e-implantologia.html">Periodoncia e Implantologia</a></li>
									<li class="divider"></li>
									<li><a href="rehabilitacion-oral.html">Rehabilitacion Oral</a></li>									
								</ul>
							</li>						
							<li><a href="team.html">EQUIPO</a></li>
							<li><a href="about.html">NOSOTROS</a></li>
							<li><a href="faq.html">PREGUNTAS</a></li>
							<li><a href="contact.html">CONTACTO</a></li>
						  </ul>
						</div>
					  </div>
				</nav>
			</div>
		</div>
		


		<div class="main">
			<div class="section about-content">
				<div class="row">
				  <div class="col-md-6">
					<div class="about-us">
					  <p>
					  <?php

							// Email configuration
							$from = 'Email received from <info@dentco.hn>';
							$sendTo = 'Email sent to <info@dentco.hn>';
							$subject = 'You have received a new email';
							$fields = array('name' => 'Name', 'surname' => 'Surname', 'phone' => 'Phone', 'email' => 'Email', 'message' => 'Message'); // array variable name => Text to appear in the email
							$okMessage = 'Su mensaje ah sido enviado!';
							$errorMessage = 'Ocurrio un error enviando el mensaje. Favor contactarnos via telefono.';

							try
							{
								$emailText = "You have received a new message\n****************************************\n";

								foreach ($_POST as $key => $value) {

									if (isset($fields[$key])) {
										$emailText .= "$fields[$key]: $value\n";
									}
								}

								$headers = array('Content-Type: text/plain; charset="UTF-8";',
									'From: ' . $from,
									'Reply-To: ' . $from,
									'Return-Path: ' . $from,
								);
								
								mail($sendTo, $subject, $emailText, implode("\n", $headers));

								$responseArray = array('type' => 'success', 'message' => $okMessage);
							}
							catch (\Exception $e)
							{
								$responseArray = array('type' => 'danger', 'message' => $errorMessage);
							}

							if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
								$encoded = json_encode($responseArray);

								header('Content-Type: application/json');

								echo $encoded;
							}
							else {
								echo $responseArray['message'];
							}
					?>
					  </p>	
					</div>
				  </div>
				  <div class="col-md-6">
					<div class="about-img"><img src="img/clinica/clinica2.jpg" alt=""></div>
				  </div>
				</div>
			</div>
		</div>			
		


	</div>
	<!-- END MAIN CONTAINER -->		
	
	<div class="footer">
		<div class="main">
			<div class="row">
			  <div class="col-md-7 footer-info">
				  <div class="about-footer">
				  	<div class="logo-brand"><img src="img/master/logo.png" alt=""></div>
				  	<p>Señor quiero que estes conmigo todos los dias mientras practico la odontologia.</br> Que tus tiernas manos guien las mias mientras atienda a todos los que en mi confian. </br> Que cada paciente sienta mi competencia y habilidad,</br> ya sea por una cirugia compleja o un simple diente a rellenar.</br> Quiero que estes conmigo mientras diagnostico y trato</br> para que recibas una sonrisa hermosa y saludable de la boca de mis pacientes. </br>Amen</p>

					<div class="footer-location">
					  <div class="inner-location">
						<div class="fa-address"><i class="fa fa-location-arrow" aria-hidden="true"></i></div>
						<div class="text-address">
							<h6>Nuestra Ubicacion</h6>
							<p>Col. 15 de Septiembre, Calle de los Alcaldes, Edificio Ventu Life Center Segundo Nivel Local 20 </p>
						</div>
					  </div>
					  <div class="inner-location">
						<div class="fa-address"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
						<div class="text-address">
							<h6>Horas de Trabajo</h6>
							<p>Lunes a Viernes 9:30 AM - 7:00 PM Sabado 9:30 AM - 6:00 PM Domingo 9:30 AM - 5:00 PM</p>
						</div>
					  </div>
					  <div class="inner-location">
						<div class="fa-address"><i class="fa fa-phone" aria-hidden="true"></i></div>
						<div class="text-address">
							<h6>Telefono</h6>
							<p>(504) 2204-4088</p>
						</div>
					  </div>
					  <div class="inner-location">
						<div class="fa-address"><i class="fa fa-envelope" aria-hidden="true"></i></div>
						<div class="text-address">
							<h6>Correo Electronico</h6>
							<p>info@dentco.hn</p>
						</div>
					  </div>
				    </div>
				  </div>
			 </div>
				
			  <div class="col-md-5 footer-maps">
				<div class="maps">
					<div id="map"></div>
					<script>
						"use strict";      
						function initMap() {
								// Styles a map in night mode.
								var map = new google.maps.Map(document.getElementById('map'), {
								  center: {lat: 14.059843, lng: -87.227027},
								  zoom: 16,
								  styles: [
											{
												"featureType": "all",
												"elementType": "geometry.fill",
												"stylers": [
													{
														"weight": "2.00"
													}
												]
											},
											{
												"featureType": "all",
												"elementType": "geometry.stroke",
												"stylers": [
													{
														"color": "#9c9c9c"
													}
												]
											},
											{
												"featureType": "all",
												"elementType": "labels.text",
												"stylers": [
													{
														"visibility": "on"
													}
												]
											},
											{
												"featureType": "landscape",
												"elementType": "all",
												"stylers": [
													{
														"color": "#f2f2f2"
													}
												]
											},
											{
												"featureType": "landscape",
												"elementType": "geometry.fill",
												"stylers": [
													{
														"color": "#ffffff"
													}
												]
											},
											{
												"featureType": "landscape.man_made",
												"elementType": "geometry.fill",
												"stylers": [
													{
														"color": "#ffffff"
													}
												]
											},
											{
												"featureType": "poi",
												"elementType": "all",
												"stylers": [
													{
														"visibility": "off"
													}
												]
											},
											{
												"featureType": "road",
												"elementType": "all",
												"stylers": [
													{
														"saturation": -100
													},
													{
														"lightness": 45
													}
												]
											},
											{
												"featureType": "road",
												"elementType": "geometry.fill",
												"stylers": [
													{
														"color": "#eeeeee"
													}
												]
											},
											{
												"featureType": "road",
												"elementType": "labels.text.fill",
												"stylers": [
													{
														"color": "#7b7b7b"
													}
												]
											},
											{
												"featureType": "road",
												"elementType": "labels.text.stroke",
												"stylers": [
													{
														"color": "#ffffff"
													}
												]
											},
											{
												"featureType": "road.highway",
												"elementType": "all",
												"stylers": [
													{
														"visibility": "simplified"
													}
												]
											},
											{
												"featureType": "road.arterial",
												"elementType": "labels.icon",
												"stylers": [
													{
														"visibility": "off"
													}
												]
											},
											{
												"featureType": "transit",
												"elementType": "all",
												"stylers": [
													{
														"visibility": "off"
													}
												]
											},
											{
												"featureType": "water",
												"elementType": "all",
												"stylers": [
													{
														"color": "#46bcec"
													},
													{
														"visibility": "on"
													}
												]
											},
											{
												"featureType": "water",
												"elementType": "geometry.fill",
												"stylers": [
													{
														"color": "#c8d7d4"
													}
												]
											},
											{
												"featureType": "water",
												"elementType": "labels.text.fill",
												"stylers": [
													{
														"color": "#070707"
													}
												]
											},
											{
												"featureType": "water",
												"elementType": "labels.text.stroke",
												"stylers": [
													{
														"color": "#ffffff"
													}
												]
											}
										]
								});
								const image = {
									url:"https://www.dentco.hn/img/master/favicon.png",
									// This marker is 20 pixels wide by 32 pixels high.
									scaledSize: new google.maps.Size(32, 32)
								  };
								const marker = new google.maps.Marker({
								  position: new google.maps.LatLng(14.059843,  -87.227027),
								  icon: image, 
								  map: map
								});
							  }
					</script>
					<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBebJWrG96ygv2Tavzbx59_SAAaheynf3U&callback=initMap" async defer></script>
				</div> 
			  </div>
			</div>
			
			<div class="bottom-footer">
				<div class="main">
					<div class="section">
						<div class="column-left">
							<p>© 2021 Derechos Reservados, DentCo</p>  
						</div>
						<!--
						<div class="column-right">
							<div class="social-network">
							   <a href="#"><div class="icon-fa"><i class="fa fa-facebook" aria-hidden="true"></i></div></a>
							   <a href="#"><div class="icon-fa"><i class="fa fa-twitter" aria-hidden="true"></i></div></a>
							   <a href="#"><div class="icon-fa"><i class="fa fa-instagram" aria-hidden="true"></i></div></a>
							</div>
						</div>
						-->
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<a href="#0" class="cd-top">Top</a>
	<!-- ==============================================
	JAVASCRIPTS
	=============================================== -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
	<script src='js/jquery.min.js'></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/loader.js"></script>
	<script src="js/top.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/parallax.js"></script>
	<script src="js/counter.js"></script>    
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.counterup.js"></script>
    <script src="jquery-3.2.1.min.js"></script>
	<script src='js/flickity.pkgd.min.js'></script> 
    <script src="js/testimonials.js"></script>
	<script src="js/filters.js"></script>
	<script src='js/carousel.min.js'></script>
	<script src='js/splittext.min.js'></script>
	<script src="js/slider.js"></script>
	
</body>

</html>