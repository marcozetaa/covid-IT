<?php
  include('../server.php');
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>About Us</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
				<div class="slideshow-container">
					<div class="mySlides fade">
						<div class="text">
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
						  	</div>
						</div>
					</div>
					
						<div class="mySlides fade">
							<div class="text">
								<div class="inner">
									<header>
										<h1>Pandemia COVID</h1>
									</header>
									<div class="flex ">
										<div>
											<span class="glyphicon glyphicon-warning-sign"></span>
											<p>
											I primi casi confermati del virus in pazienti umani sono stati riscontrati
											nella città di Wuhan, nella Cina centrale, verso la fine di novembre 2019.
											Successivamente, nelle prime due settimane del gennaio 2020, si è diffuso ad
											altre province cinesi, favorito anche dai grandi spostamenti della popolazione
											in occasione del capodanno cinese.
											Dalla metà di gennaio 2020, si sono riscontrati i primi casi anche al di fuori della Cina,
											 portati dai viaggiatori internazionali, principalmente verso le nazioni grandi 
											partner commerciali del Paese. Da circa il 23 gennaio, l'OMS e i governi locali 
											stanno conducendo importanti sforzi per allertare la popolazione e istituire misure 
											di prevenzione. Il 30 gennaio l'Organizzazione Mondiale della Sanità ha dichiarato 
											che il nuovo focolaio di coronavirus è un'emergenza di sanità pubblica di interesse 
											internazionale. L'11 marzo l'OMS dichiara la pandemia.
											</p>
										</div>
									</div>
									
								  </div>
							</div>
						</div>
						
						<br>
						
						<div style="text-align:center">
						  <span class="dot"></span> 
						  <span class="dot"></span> 
						</div>
				</div>
			</div>
			</section>


		<!-- Three -->
			<section id="three" class="wrapper align-center">
				<div class="inner">
					<div class="flex flex-2">
						<article>
							<div class="image round">
								<img src="images/pic01.jpg" alt="Pic 01" />
							</div>
							<header>
								<h3>Marco Zanghieri<br />Ingegnere informatico</h3>
							</header>
							<p>Morbi in sem quis dui placerat ornare. Pellentesquenisi<br />euismod in, pharetra a, ultricies in diam sed arcu. Cras<br />consequat  egestas augue vulputate.</p>
							<footer>
								<a href="#" class="button">Instagram</a>
							</footer>
						</article>
						<article>
							<div class="image round">
								<img src="images/pic02.jpg" alt="Pic 02" />
							</div>
							<header>
								<h3>Benedetta Zelada<br />Ingegnere Informatico</h3>
							</header>
							<p>Pellentesque fermentum dolor. Aliquam quam lectus<br />facilisis auctor, ultrices ut, elementum vulputate, nunc<br /> blandit ellenste egestagus commodo.</p>
							<footer>
								<a href="#" class="button">Instagram</a>
							</footer>
						</article>
					</div>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<h3><span class="glyphicon glyphicon-envelope"></span>	Contattaci</h3>
					<form action="messageHandler.php" method="post" name="mess" onsubmit="return valida();">
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
					<!--
					<div class="copyright">
						&copy; Untitled. Design: <a href="https://templated.co">TEMPLATED</a>. Images: <a href="https://unsplash.com">Unsplash</a>.
					</div>
					-->
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