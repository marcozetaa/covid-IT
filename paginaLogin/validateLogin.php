<?php
    include("login.php");

    $email_error='porcodio';
    $password_error='';

    $dbconnect = pg_connect("host=localhost port=5432 dbname=Dati_Covid user=postgres password=PostGre_009!") or die("could not connect: " . preg_last_error());
    if(!(isset($_POST['loginButton']))) {
        header("Location: ../Homepage/homepage.html");
    }
    else{ 
        $email = $_POST['login_email'];
        $password = md5($_POST['login_password']);
        $q_email = "SELECT * FROM user_registration WHERE email=$1";
        $result=pg_query_params($dbconnect, $q_email, array($email));
        if(!$line=pg_fetch_array($result,null,PGSQL_ASSOC)){
            ?>
		    <script language="text/javascript" lang='javascript'></script>
		    <?php
            header("Location: ../paginaLogin/login.html");
        }
        else{
            $db_password = $line[5];
            if($password != $db_password){
                ?>
                <script language="javascript">$('#error_password').show()</script>
                <?php
                header("Location: ../paginaLogin/login.html");
            }
            else{
                echo "<h1> Login effettuato <br/></h1>";
                echo "<a href=../Homepage/homepage.html> Premi qui </a>
                per iniziare ad utilizzare il sito web";
            }
        }
    }
?>