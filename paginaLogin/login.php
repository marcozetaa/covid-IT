<?php
  include('../server.php');
?>

<html>
    <head>
      <title>Login</title>
      <meta charset="utf-8"/>
      <link href="../css/bootstrap.min.css" rel="stylessheet"/>
      <link href="signin.css" rel="stylesheet"/>
      
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript" lang="javascript" src="../js/bootstrap.min.js"></script>
      <script type="text/javascript" lang="javascript" src="./loginScript.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
      <div class="login-reg-panel">
        <div class="login-info-box">
          <h2>Hai già un account?</h2>
          <p>Clicca qui per accedere</p>
          <label id="label-register" for="log-reg-show">Login</label>
          <input type="radio" name="active-log-panel" id="log-reg-show" checked="checked">
        </div>      
        <div class="register-info-box">
            <h2>Non hai un account?</h2>
            <p>Clicca qui per registrarti</p>
            <label id="label-login" for="log-login-show">Registrati</label>
            <input type="radio" name="active-log-panel" id="log-login-show">
        </div>        
        <div class="white-panel">
            <div class="login-show">
              <form id="form-login" action="../server.php" method="post" name="form-login">
                <h2>LOGIN</h2>
                <p id="error_email">Errore: la mail non è registrata</p>
                <p id="error_password">Password non corretta</p>
                <p id="reg_success" style="border: 1px solid #d7fcc2; background-color: #e4fce7; color: #22cc00;">
                  Registrazione effettuata! Ora accedi al sito
                </p>
                <p id="mail_exists">L'email è gia registrata!</p>
                <input name="login_email" type="email" placeholder="Email" required>
                <input name="login_password" type="password" placeholder="Password" required>
                <button class="login-btn-show" name="loginButton" type="submit">Log in</button>
              </form>
            </div>
            <div class="register-show">
              <form id="form-register" action="../server.php" method="post" name="form-register" onsubmit="return validaRegistrazione()">
                <h2>REGISTER</h2>
                <input name="input_nome" type="text" placeholder="Nome" required>
                <input name="input_cognome"type="text" placeholder="Cognome" required>
                <input name="input_email" type="email" placeholder="Email" required>
                <div class="select-box">
                    <div id="select_current" class="select-box__current" tabindex="1">
                      <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="0" value="Abruzzo" name="input_regioni" checked="checked"/>
                        <p class="select-box__input-text">Abruzzo</p>
                      </div>
                      <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="1" value="Basilicata" name="input_regioni" checked="checked"/>
                        <p class="select-box__input-text">Basilicata</p>
                      </div>
                      <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="2" value="Calabria" name="input_regioni" checked="checked"/>
                        <p class="select-box__input-text">Calabria</p>
                      </div>
                      <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="3" value="Campania" name="input_regioni" checked="checked"/>
                        <p class="select-box__input-text">Campania</p>
                      </div>
                      <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="4" value="Emilia Romagna" name="input_regioni" checked="checked"/>
                        <p class="select-box__input-text">Emilia Romagna</p>
                      </div>
                      <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="5" value="Friuli-Venezia Giulia" name="input_regioni" checked="checked"/>
                        <p class="select-box__input-text">Friuli-Venezia Giulia</p>
                      </div>
                      <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="6" value="Lazio" name="input_regioni" checked="checked"/>
                        <p class="select-box__input-text">Lazio</p>
                      </div>
                      <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="7" value="Liguria" name="input_regioni" checked="checked"/>
                        <p class="select-box__input-text">Liguria</p>
                      </div>
                      <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="8" value="Lombardia" name="input_regioni" checked="checked"/>
                        <p class="select-box__input-text">Lombardia</p>
                      </div>
                      <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="9" value="Marche" name="input_regioni" checked="checked"/>
                        <p class="select-box__input-text">Marche</p>
                      </div>
                      <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="10" value="Molise" name="input_regioni" checked="checked"/>
                        <p class="select-box__input-text">Molise</p>
                      </div>
                      <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="11" value="Piemonte" name="input_regioni" checked="checked"/>
                        <p class="select-box__input-text">Piemonte</p>
                      </div>
                      <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="12" value="Puglia" name="input_regioni" checked="checked"/>
                        <p class="select-box__input-text">Puglia</p>
                      </div>
                      <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="13" value="Sardegna" name="input_regioni" checked="checked"/>
                        <p class="select-box__input-text">Sardegna</p>
                      </div>
                      <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="14" value="Sicilia" name="input_regioni" checked="checked"/>
                        <p class="select-box__input-text">Sicilia</p>
                      </div>
                      <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="15" value="Trentino-Alto Adige" name="input_regioni" checked="checked"/>
                        <p class="select-box__input-text">Trentino-Alto Adige</p>
                      </div>
                      <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="16" value="Toscana" name="input_regioni" checked="checked"/>
                        <p class="select-box__input-text">Toscana</p>
                      </div>
                      <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="17" value="Umbria" name="input_regioni" checked="checked"/>
                        <p class="select-box__input-text">Umbria</p>
                      </div>
                      <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="18" value="Veneto" name="input_regioni" checked="checked"/>
                        <p class="select-box__input-text">Veneto</p>
                      </div>
                      <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="19" value="Valle d'Aosta" name="input_regioni" checked="checked"/>
                        <p class="select-box__input-text">Valle d'Aosta</p>
                      </div><img class="select-box__icon" src="http://cdn.onlinewebfonts.com/svg/img_295694.svg" alt="Arrow Icon" aria-hidden="true"/>
                    </div>
                    <ul class="select-box__list">
                      <li>
                        <label class="select-box__option" for="0" aria-hidden="aria-hidden">Abruzzo</label>
                      </li>
                      <li>
                        <label class="select-box__option" for="1" aria-hidden="aria-hidden">Basilicata</label>
                      </li>
                      <li>
                        <label class="select-box__option" for="2" aria-hidden="aria-hidden">Calabria</label>
                      </li>
                      <li>
                        <label class="select-box__option" for="3" aria-hidden="aria-hidden">Campania</label>
                      </li>
                      <li>
                        <label class="select-box__option" for="4" aria-hidden="aria-hidden">Emilia Romagna</label>
                      </li>
                      <li>
                        <label class="select-box__option" for="5" aria-hidden="aria-hidden">Friuli-Venezia Giulia</label>
                      </li>
                      <li>
                        <label class="select-box__option" for="6" aria-hidden="aria-hidden">Lazio</label>
                      </li>
                      <li>
                        <label class="select-box__option" for="7" aria-hidden="aria-hidden">Liguria</label>
                      </li>
                      <li>
                        <label class="select-box__option" for="8" aria-hidden="aria-hidden">Lombardia</label>
                      </li>
                      <li>
                        <label class="select-box__option" for="9" aria-hidden="aria-hidden">Marche</label>
                      </li>
                      <li>
                        <label class="select-box__option" for="10" aria-hidden="aria-hidden">Molise</label>
                      </li>
                      <li>
                        <label class="select-box__option" for="11" aria-hidden="aria-hidden">Piemonte</label>
                      </li>
                      <li>
                        <label class="select-box__option" for="12" aria-hidden="aria-hidden">Puglia</label>
                      </li>
                      <li>
                        <label class="select-box__option" for="13" aria-hidden="aria-hidden">Sardegna</label>
                      </li>
                      <li>
                        <label class="select-box__option" for="14" aria-hidden="aria-hidden">Sicilia</label>
                      </li>
                      <li>
                        <label class="select-box__option" for="15" aria-hidden="aria-hidden">Trentino-Alto Adige</label>
                      </li>
                      <li>
                        <label class="select-box__option" for="16" aria-hidden="aria-hidden">Toscana</label>
                      </li>
                      <li>
                        <label class="select-box__option" for="17" aria-hidden="aria-hidden">Umbria</label>
                      </li>
                      <li>
                        <label class="select-box__option" for="18" aria-hidden="aria-hidden">Veneto</label>
                      </li>
                      <li>
                        <label class="select-box__option" for="19" aria-hidden="aria-hidden">Valle d'Aosta</label>
                      </li>
                    </ul>
                </div>
                <input name="first_pass" id="first_pass" type="password" placeholder="Password" required>
                <input name="confirm_pass" id="confirm_pass" type="password" placeholder="Confirm Password" required>
                <button id="reg-btn" class="reg-btn-show" name="RegisterButton" type="submit">Register</button>
              </form>
            </div>
          </div>
      </div>
      <script>
        var mail="<?php if(isset($_SESSION['error_posta'])) echo $_SESSION['error_posta'];?>";
        var pass="<?php if(isset($_SESSION['error_codice'])) echo $_SESSION['error_codice'];?>";
        var reg="<?php if(isset($_SESSION['reg_success'])) echo $_SESSION['reg_success'];?>";
        var exists="<?php if(isset($_SESSION['mail_exists'])) echo $_SESSION['mail_exists'];?>";
        if(mail==1){
          $('#error_email').show();  
          <?php $_SESSION['error_posta']=0; ?>
        }
        else $('#error_email').hide();
        if(pass==1){
          $('#error_password').show();
          <?php $_SESSION['error_codice']=0;?>
        }      
        else $('#error_password').hide();
        if(reg==1){
          $('#reg_success').show();
          <?php $_SESSION['reg_success']=0;?>
        }      
        else $('#reg_success').hide();
        if(exists==1){
          $('#mail_exists').show();
          <?php $_SESSION['mail_exists']=0;?>
        }      
        else $('#mail_exists').hide();
      </script>
    </body>
</html>  