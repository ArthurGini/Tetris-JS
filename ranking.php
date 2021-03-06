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
    <a href="index.php"><button id="button" onclick="historico.php">Voltar ao Jogo</button></a>

        <div id="historico">
            <div class="title">
                <h3>Ranking de Partidas</h3><hr>
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
                                echo '<ul id="dados">';
                                echo '<li><b>RANK: </b>'.$i.'<b> Name:</b>'.$row['username_dados'].'<b> points:</b>'.$row['pontos'].'<b> level:</b>'.$row['level'].'<b> Time:</b>'.$row['tempo'].'</li>';
                                echo '</ul>';

                                //echo "RANK ".$i.": ".$row['username_dados']." com ".$row['pontos']. " pontos, level " .$row['level']. " completado em ".$row['tempo']. " segundos!<br>";
                            }
                            echo "<hr>";
                                $sql = "SELECT ROW_NUMBER() OVER(ORDER BY pontos DESC, tempo ASC) as linha, username_dados
                                        FROM pontuacao";
                                $grava = $conn->prepare($sql);
                                $grava->execute(array());
                                $position = 1;
                                while($row = $grava->fetch(PDO::FETCH_ASSOC)){
                                    if($row['username_dados'] == $_SESSION['username']){
                                        echo "A sua melhor classificação é ".$position."° lugar!";
                                        break;
                                    }
                                    $position++;
                                }
                    }catch(PDOException $e){
                    echo "Ocorreu um erro: " . $e->getMessage();
                } 
                ?>

    

            </div>
        </div>

    </section> 
</body>
</html>