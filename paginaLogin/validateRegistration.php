
<?php
    $dbconnect = pg_connect("host=localhost port=5432 dbname=Dati_Covid user=postgres password=PostGre_009!")
    or die("could not connect: " . preg_last_error());
    if(!(isset($_POST['RegisterButton']))){
        header("Location: ../Homepage/homepage.html");
    }
    else{ 
        $email = $_POST['input_email'];
        $q1 = "SELECT * FROM user_registration WHERE email=$1";
        $result=pg_query_params($dbconnect, $q1, array($email));
        if($line=pg_fetch_array($result,null,PGSQL_ASSOC)){
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
            $data = pg_query_params($dbconnect, $q2, array($nome,$cognome,$regione,$email,$password));
            if($data){
                echo "<h1> Registration is completed accordi onStart using the website <br/></h1>";
                echo "<a href=../Homepage/homepage.html> Premi qui </a>
                per iniziare ad utilizzare il sito web";
            }
        } 
    }
?>
