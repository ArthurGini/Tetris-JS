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
                echo "RANK ".$i.": ".$row['username_dados']." com ".$row['pontos']. " pontos, level " .$row['level']. " completado em ".$row['tempo']. " segundos!<br>";
            }
            echo "<hr>";
                $sql = "SELECT count(*)  AS rank 
                FROM pontuacao p CROSS JOIN
                (SELECT pontos FROM pontuacao WHERE username_dados = '".$_SESSION['username']."') s
                WHERE p.pontos > s.pontos or
                (p.pontos = s.pontos and p.username_dados <= '".$_SESSION['username']."');";
            $rank = $conn->prepare($sql);
            $rank->execute(array());
            $row = $rank->fetch(PDO::FETCH_ASSOC);
            echo "Sua posição no ranking é ". $row['rank'];            
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