<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
        echo "Please login first to see this page.";
        header("Location: login.php");
    }

    try{
            $conn = new PDO("mysql:host=localhost;dbname=bancophp", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM pontuacao ORDER BY pontos DESC limit 10";
            $grava = $conn->prepare($sql);
            $grava->execute(array());
            $i=0;
            while($row = $grava->fetch(PDO::FETCH_ASSOC)) {
                $i++;
                echo "Rank número ".$i." é ".$row['username_dados']." com ".$row['pontos']. " pontos, no level " .$row['level']. " feito em apenas ".$row['tempo']. " segundos!<br>";
            }
            
    }catch(PDOException $e){
    echo "Ocorreu um erro: " . $e->getMessage();
  } 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title> TRABALHO 3 - PHP </title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    
</head>

<body>
    <header>
        <div id="logo">
            <img id="tetris-logo" src="img/project-logo.png" alt="logotipo">
        </div>
    </header>
    <section>
        
    </section>
<script>
  NCOL = 1;
  NLIN = 1;
</script>
<script src="Tetris.js"></script>
</body>
</html>