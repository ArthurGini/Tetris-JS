<?php
    session_start();
   if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
        header("Location: login.php");
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
        <button id="button" onclick="pauseGame()">Pause game</button>
        <button id="button2" onclick="startGame()">Restart game</button>
        <button id="button3" onclick="instructWindow()">Instructions</button>
        <canvas id="Matriz"></canvas>

       
        <div class = "menu">


        <?php
        include "menu.php";
        ?>
        </div>

        <div id="next">
            <div class="title">
                <h3>Next Piece</h3>
                <hr>
            </div>
            <div class="canvas-lateral">
                <canvas id="next-canvas"></canvas>
            </div>
        </div>
        <div id="score">
            <div class="title">
                <h3>Score</h3>
            </div>
            <div id="score-info">
                <hr>
                <p id="time">Time: 0 seconds</p>
                <p id="rows">Eliminated rows: 0</p>
                <p id="points">Points: 0</p>
                <p id="level">Nível: 1</p>
                <hr>
            </div>
        </div>
        <div id="hold">
            <div class="title">
                <h3>Holded Piece</h3>
                <hr>
            </div>
            <div class="canvas-lateral">
                <canvas id="hold-canvas"></canvas>
            </div>
        </div>
        <div id="rank">
            <div class="title">
                <h3>Ranking</h3><hr>
                <ul id="dados"></ul>
            </div>
        </div>
        <div id="instructions">
            <h2>Instructions</h2>
            <div class="key">
                <img src="img/up-key.png" alt="Up arrow">
                <p>Move piece foward</p>
            </div>
            <div class="key">
                <img src="img/left-key.png" alt="Left arrow">
                <p>Move piece to the left</p>
            </div>
            <div class="key">
                <img src="img/right-key.png" alt="Right arrow">
                <p>Move piece to the right</p>
            </div>
            <div class="key">
                <img src="img/down-key.png" alt="Down arrow">
                <p>Rotate piece</p>
            </div>
            <div class="key">
                <img src="img/c-key.png" alt="C key">
                <p>Hold piece to use it later</p>
            </div>
            <div class="key">
                <img src="img/p-key.png" alt="P key">
                <p>Pause/unpause game</p>
            </div>
            <button id="button4" onclick="instructWindow()">Ok</button> 

        </div>
      
    </section>
    <script src="Tetris.js"></script>
    
    
    
</body>
</html>

