<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
        echo "Please login first to see this page.";
        header("Location: login.php");
    }

    try{
            $conn = new PDO("mysql:host=localhost;dbname=bancophp", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM pontuacao ORDER BY pontos DESC, tempo ASC, username_dados ASC limit 10";
            $grava = $conn->prepare($sql);
            $grava->execute(array());
            $i=0;
            while($row = $grava->fetch(PDO::FETCH_ASSOC)) {
                $i++;
                echo "RANK ".$i.": ".$row['username_dados']." com ".$row['pontos']. " pontos, level " .$row['level']. " completado em ".$row['tempo']. " segundos!<br>";
            }
            echo "<hr>";
                $sql = "SELECT ROW_NUMBER() OVER(ORDER BY pontos DESC, tempo ASC, username_dados ASC) as linha, username_dados
                        FROM pontuacao";
                $grava = $conn->prepare($sql);
                $grava->execute(array());
                while($row = $grava->fetch(PDO::FETCH_ASSOC)){
                    if($row['username_dados'] == $_SESSION['username']){
                        echo "A sua melhor classificação é ".$row['linha']."° lugar!";
                        break;
                    }

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
    </header>
    <section>
    </section>
</body>
</html>