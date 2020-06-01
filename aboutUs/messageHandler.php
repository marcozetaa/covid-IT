<?php
    $dbconnect = pg_connect("host=localhost port=5432 dbname=Dati_Covid user=postgres password=postgres") 
    or die("could not connect: " . preg_last_error());
    if(!(isset($_POST['messageButton']))) {
        header("Location: ../Homepage/homepage.html");
    }
    else{ 
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
?>