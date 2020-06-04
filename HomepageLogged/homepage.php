<?php
  include('../server.php');
  if(!isset($_SESSION['logged-user']) || $_SESSION['logged-user']!=1){
    header("Location:../paginaLogin/login.php");
  }
  else
    $_SESSION['logged-user']=0;
?>


<!DOCTYPE html>
<html>
  <head>
		<title>Homepage</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="stile.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <!--Link per la mappa -->
    <script type="text/javascript" src="../p5/p5.min.js"></script>
    <script type="text/javascript" src="../Vue/vue.min.js"></script>
  </head>
  <body style="background-color: #09688b;" onload="assegnaEvent();">

		<!-- Header -->
    <header id="header">
      <img class="logo" src="../Logo.jpg"> 
      <div class="inner">
        <nav id="nav">
          <a class="navbar" href="../Regioni/regioni.html">Regioni</a>
          <a class="navbar" href="../aboutUs/aboutUs.html">About Us</a>
          <a id="nav-user" class="navbar" href="#"></a>
          <a class="navbar" href="../Homepage/homepage.html">Log out</a>
          
        </nav>
      </div>
    </header>

    <div id="inner">
      <!--LAYOUT-->
      <div id="ultimi_dati">
        <div class="column left">
          <div class="infoTile">
            <div class="lastUpdate">Aggiornato il {{ giorno }} alle {{ ora }}</div>
            <h2 class="title" title="Totale casi confermati">Totale casi confermati</h2>
            <div class="confirmed">{{ totaleCasi }}</div>
            <h2 class="legend">
              <div class="color" style="background: #66ffff"></div>
              <div class="description">Nuovi positivi</div>
              <div class="total">
                {{ nuoviPositivi }}
                <div class="delta"> {{ varPositivi }}</div>
              </div>
            </h2>
            <h2 class="legend">
              <div class="color" style="background: #FF6F00"></div>
              <div class="description">Deceduti</div>
              <div class="total">{{ deceduti }}</div>
            </h2>
            <h2 class="legend">
              <div class="color" style="background: rgba(255, 206, 86)"></div>
              <div class="description">Dimessi guariti</div>
              <div class="total">{{ dimessiGuariti }}</div>
            </h2>
            <!--COLLAPSE-->
            <a href="#demo" class="lastUpdate" data-toggle="collapse">Ulteriori informazioni</a>
            <div id="demo" class="collapse">
              <h2 class="legend">
                <div class="color" style="background: #004c68"></div>
                <div class="description">Ricoverati con sintomi</div>
                <div class="total">{{ italia.ricoverati_con_sintomi }}</div>
              </h2>
              <h2 class="legend">
                <div class="color" style="background: #004c68"></div>
                <div class="description">Terapia intensiva</div>
                <div class="total">{{ terapiaIntensiva }}</div>            
              </h2>
              <h2 class="legend">
                <div class="color" style="background: #004c68"></div>
                <div class="description">Totale ospedalizzati</div>
                <div class="total">{{ totaleOspedalizzati }}</div>          
              </h2>  
              <h2 class="legend">
                <div class="color" style="background: #004c68"></div>
                <div class="description">Isolamento domiciliare</div>
                <div class="total">{{ isolamentoDomiciliare }}</div>            
              </h2>
              <h2 class="legend">
                <div class="color" style="background: #004c68"></div>
                <div class="description">Nuovi positivi</div>
                <div class="total">{{ nuoviPositivi }}</div>            
              </h2>
              <h2 class="legend">
                <div class="color" style="background: #004c68"></div>
                <div class="description">Tamponi</div>
                <div class="total">{{ tamponi }}</div>            
              </h2>
              <h2 class="legend">
                <div class="color" style="background: #004c68"></div>
                <div class="description">Casi testati</div>
                <div class="total">{{ casiTestati }}</div>
              </h2>
            </div>
          </div>
          <h3 style="text-align: center; color: rgb(235,184,29);">Monitoraggio regione {{nomeRegione}}</h3>
          <div id="areaReg" class="listaRegioni scrollbar"> 
            <ul class="list-group" tabindex="0">
              <li class="list-group-item">
                Totale Positivi
                <span class="badge" style="float:right; background-color: #004c68;" id="totale">{{reg_totalePositivi}}</span>
              </li>
              <li class="list-group-item">
                Totale Deceduti
                <span class="badge" style="float:right; background-color: #004c68;" id="totale">{{reg_totaleDeceduti}}</span>
              </li>
              <li class="list-group-item">
                Dimessi Guariti
                <span class="badge" style="float:right; background-color: #004c68;" id="totale">{{reg_dimessiGuariti}}</span>
              </li>
              <li class="list-group-item">
                Totale Casi
                <span class="badge" style="float:right; background-color: #004c68;" id="totale">{{reg_totaleCasi}}</span>
              </li>
              <li class="list-group-item">
                Nuovi Positivi
                <span class="badge" style="float:right; background-color: #004c68;" id="totale">{{reg_variazioneTotalePositivi}}</span>
                <span class="badge" style="float:right; background-color: #004c68;" id="totale">{{reg_nuoviPositivi}}</span>
              </li>
              <li class="list-group-item">
                Ricoverati Con Sintomi
                  <span class="badge" style="float:right; background-color: #004c68;" id="totale">{{reg_ricoveratiConSintomi}}</span>
              </li>
              <li class="list-group-item">
                Terapia Intensiva
                <span class="badge" style="float:right; background-color: #004c68;" id="totale">{{reg_terapiaIntensiva}}</span>
              </li>
              <li class="list-group-item">
                Totale Ospedalizzati
                <span class="badge" style="float:right; background-color: #004c68;" id="totale">{{reg_totaleOspedalizzati}}</span>
              </li>
              <li class="list-group-item">
                Isolamento Domiciliare
                <span class="badge" style="float:right; background-color: #004c68;" id="totale">{{reg_isolamentoDomiciliare}}</span>
              </li>
              <li class="list-group-item">
                Totale Tamponi
                <span class="badge" style="float:right; background-color: #004c68;" id="totale">{{reg_totaleTamponi}}</span>
              </li>
              <li class="list-group-item">
                Casi Testati
                <span class="badge" style="float:right; background-color: #004c68;" id="totale">{{reg_casiTestati}}</span>
              </li>
            </ul>
          </div>
        </div>
        </br>
        </br>
      </div>
          <!--Mappa centrale monitoraggio-->
      <div key="3" id="centro" v-else class="column middle"></div>  
      <!-- GRAFICO -->
      <div id="graf" class="column right">
          <canvas id="myChartP" width='100%' height="70%">{{ trendPositivi }}</canvas>
          <canvas id="myChartD" width='100%' height="70%">{{ trendDeceduti }}</canvas>
          <canvas id="myChartG" width='100%' height="70%">{{ trendGuariti }}</canvas>
      </div>
    </div>


    <script>
      let urlParams = new URLSearchParams(window.location.search);
      var nome = urlParams.get('nome');
      var htmlString = "Ciao, "+ nome[0].toUpperCase() + nome.slice(1);
      $("#nav-user").html(htmlString);  
    </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript" src="home.js"></script>
    <script type="text/javascript" src="sketch.js"></script>
    <script type="text/javascript" src="grafico.js"></script>
    <script type="text/javascript" src="colori.js"></script>
  </body>
</html>