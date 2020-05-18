<html>
    <head></head>
    <body>
        <?php
            $dbconnect = pg_connect("host=localhost port=5432 dnname=EsempioLogin user=postgres password=PostGre_009!")
            or die("could not connect: " . preg_last_error());
            if(!(isset($_POST['registrationButton']))){
                header("Location: ../index.html");
            }
            else{ 
                $email = $_POST['inputEmail'];
                $q1 = "select * from utente where email= $1";
                $result=pg_query_params($dbconn, $q1, array($email));
                if($line=pg_fetch_array($result,null,PGSQL_ASSOC)){
                    echo "<h1> Sorry, you are aòreadu a registered user </h1>
                    <a href=../paginaLogin/login.html> Click here to login </a>";
                }
                else{
                    $nome = $_POST['inputName'];
                    $cognome = $_POST['inputSurname'];
                    $cap = $_POST['inputCap'];
                    $password = md5($_POST['inputPassword']);
                    $q2 = "insert into utente values ($1,$2,$3,$4,$5)";
                    $data = pg_query_params($dbconnect, $q2, array( $email,$nome,$cognome,$cap,$password));
                    if($data){
                        echo "<h1> Registration is completed.accordionStart using the website <br/></h1>";
                        echo "<a href=../Welcome.php?name=$nome> Premi qui </a>
                        per iniziare ad utilizzare il sito web";
                    }
                } 
            }
        ?>
    </body>
</html>