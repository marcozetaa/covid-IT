<?php
  include('../server.php');
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>About Us</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="main.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
	<body onload="assegnaEvent();">

		<!-- Header -->
			<header id="header">
				<img class="logo" src="../Logo.jpg"> 
				<div class="inner">
					<nav id="nav">
						<a class="navbar" href="../Homepage/homepage.html">Homepage</a>
						<a class="navbar" href="../Regioni/regioni.html">Regioni</a>
						<a class="navbar" href="../paginaLogin/login.php"><span class="glyphicon glyphicon-user"></span>Sign in</a>
					</nav>
				</div>
			</header>

		<!-- Banner -->
		<section id="banner">
			<div class="inner">
				<header>
				  <h1>Monitoraggio COVID Italia</h1>
				</header>
				<div class="flex ">
				  <div>
				  <img class="logo" src="../Logo.jpg">
				  <p>
					Questo sito raccoglie tutti i dati, provenienti direttamente dal 
					Dipartimento di Protezione Civile, relativi al monitoraggio 
					del virus pandemico COVID-19 a livello nazionale e regionale
					(presto anche sulle province), utilizzando una interfaccia facile 
					e accessibile a chiunque. Lo scopo è quello di poter diffondere
					una informazione pulita e chiara riguardo la situazione pandemica nazionale.
				  </p>
				  </div>
			</div>
				<footer>
				  <a href="https://covid19.who.int/?gclid=CjwKCAjwztL2BRATEiwAvnALcg8YaOESmXYb17KeelPFS0bPhqvC_AuP1fqGffsb1MmzVscp0Rcl0RoC4hUQAvD_BwE" class="button" target="_blank">
				  Monitoraggio mondiale OMS
				  </a>
				</footer>
			</section>


		<!-- Three -->
			<section id="three" class="wrapper align-center">
				<div class="inner">
					<div class="flex flex-2">
						<article>
							<div class="image round">
								<img src="images/marco.jpeg" alt="Pic 01" />
							</div>
							<header>
								<h3>Marco Zanghieri<br />Ingegnere informatico</h3>
							</header>
							<p>Morbi in sem quis dui placerat ornare. Pellentesquenisi<br />euismod in, pharetra a, ultricies in diam sed arcu. Cras<br />consequat  egestas augue vulputate.</p>
							<footer>
								<a href="https://www.instagram.com/marcozeta.jpeg/" class="button">Instagram</a>
							</footer>
						</article>
						<article>
							<div class="image round">
								<img src="images/benedetta.jpg" alt="Pic 02" />
							</div>
							<header>
								<h3>Benedetta Zelada<br />Ingegnere Informatico</h3>
							</header>
							<p>Pellentesque fermentum dolor. Aliquam quam lectus<br />facilisis auctor, ultrices ut, elementum vulputate, nunc<br /> blandit ellenste egestagus commodo.</p>
							<footer>
								<a href="https://www.instagram.com/benedettazelada/" class="button">Instagram</a>
							</footer>
						</article>
					</div>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<h3><span class="glyphicon glyphicon-envelope"></span>	Contattaci</h3>
					<form action="../server.php" method="post" name="mess" onsubmit="return valida();">
						<div class="field half first">
							<label for="name">Nome</label>
							<input name="name" id="name" type="text" placeholder="Nome">
						</div>
						<div class="field half">
							<label for="email">Email</label>
							<input name="email" id="email" type="email" placeholder="Email">
						</div>
						<div class="field">
							<label for="message">Messaggio</label>
							<textarea name="message" id="message" rows="6" placeholder="Messaggio"></textarea>
						</div>
						<ul class="actions">
							<li><input name="messageButton" value="Send Message" class="button alt" type="submit"></li>
						</ul>
					</form>
					
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script type="text/javascript" src="aboutUs.js"></script>
			<script type="text/javascript" src="../Homepage/colori.js"></script>

	</body>
</html>