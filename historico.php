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
    <?php
    include 'menu2.php';
    ?>
    <a href="index.php"><button id="button" onclick="historico.php">Voltar ao Jogo</button></a>

        <div id="historico">
            <div class="title">
                <h3>Histórico de Partidas</h3><hr>
            
            <?php
                session_start();
                if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
                    echo "Please login first to see this page.";
                    header("Location: login.php");
                }

                try{
                        $conn = new PDO("mysql:host=localhost;dbname=bancophp", "root", "");
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "SELECT * FROM pontuacao WHERE username_dados = '".$_SESSION['username']."'";
                        $grava = $conn->prepare($sql);
                        $grava->execute(array());
                        $i=0;

                        while($row = $grava->fetch(PDO::FETCH_ASSOC)) {
                            $i++;

                            echo '<ul id="dados">';
                            echo '<li><b>Name:</b>'.$row['username_dados'].'<b> points:</b>'.$row['pontos'].'<b> level:</b>'.$row['level'].'<b> Time:</b>'.$row['tempo'].'</li>';
                            echo '</ul>';
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