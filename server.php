<?php
    session_start();

    $dbconnect = pg_connect("host=localhost port=5432 dbname=Dati_Covid user=postgres password=postgres") 
    or die("could not connect: " . preg_last_error());

    //Evento di login
    if(isset($_POST['loginButton'])) {
        $email = $_POST['login_email'];
        $password = md5($_POST['login_password']);
        $q_email = "SELECT * FROM user_registration WHERE email=$1";
        $result=pg_query_params($dbconnect, $q_email, array($email));
        if(!$line=pg_fetch_array($result,null,PGSQL_ASSOC)){
            //Email non essite nel database
            $_SESSION['error_posta']=1;
            header("Location: paginaLogin/login.php");
        }
        else{
            $db_password = $line['password'];
            echo $db_password;
            if($password != $db_password){
                $_SESSION['error_codice']=1;
                header("Location: paginaLogin/login.php");
            }
            else{
                echo('<h1>porcodio</h1>'); 
            }
        }
    }

    //Evento di registrazione
    if(isset($_POST['RegisterButton'])){
        $email = $_POST['input_email'];
        $q1 = "SELECT * FROM user_registration WHERE email=$1";
        $result=pg_query_params($dbconnect, $q1, array($email));
        if($line=pg_fetch_array($result,null,PGSQL_ASSOC)){
            phpAlert("stocazzo");
            echo "<h1> Sei già registrato </h1>
            <a href=login.html> Click here to login </a>";
        }
        else{
            $nome = $_POST['input_nome'];
            $cognome = $_POST['input_cognome'];
            $email = $_POST['input_email'];
            $regione = $_POST['input_regioni'];
            $password = md5($_POST['first_pass']);
            $q2 = "INSERT INTO user_registration VALUES (DEFAULT,$1,$2,$3,$4,$5)";
            $data = pg_query_params($dbconnect, $q2, array($nome,$cognome,$regione,$password,$email));
            if($data){
                header("Location: paginaLogin/registrationSuccess.html");
            }
        }
    } 

    //Evento di messaggio
    if(isset($_POST['messageButton'])) { 
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $q1 = "INSERT INTO contact_messages VALUES (DEFAULT,$1,$2,$3)";
        $result=pg_query_params($dbconnect, $q1, array($name,$email,$message));
        if($result){
            echo "<h1> Messaggio inviato!<br/></h1>";
            echo "<a href=../Homepage/homepage.html> Premi qui </a>
            per iniziare ad utilizzare il sito web";
        }
    }

    function phpAlert($msg) {
        echo '<div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
          <span class="close">&times;</span>
          <p style="color:black;">"'.$msg.'"</p>
        </div>
      </div>
      <script>
        // PRENDE IL MODAL
        var modal = document.getElementById("myModal");
        // PRENDE ELEMENTO SPAN PER CHIUDERE IL PULSANTE X
        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() {
          modal.style.display = "none";
        }
        // SE UTENTE PREME SU QUALSIASI PUNTO CHE NON SIA X CHIUDI UGUALMENTE
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
      }
      </script>';
      }
?>

