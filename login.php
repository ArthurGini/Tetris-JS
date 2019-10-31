

<?php

session_start();

//CADASTRAR JOGADOR
include_once("conexao.php");

if (count($_POST) > 0 ){

  
    $username = $_POST["username"];
    $senha = $_POST["senha"];
  
}
//PARA INSERIR VALORES NAS TABLES !!--------------------------------------------------------------------------------------------------------------------------------------------------------------------

//resultado_usuario = "insert into username(nome, datanasc, cpf, telefone, email, username, senha, created) values ('$name', '$datanasc', '$cpf', '$telefone', '$email', '$username', '$senha', NOW())";
//resultado_usuario = mysql_query($conexao, $resultado_usuario);

// OPÇÃO 1 ------------------------- TESTA SE USUÁRIO É VÁLIDO
/*
 if(mysqli_insert_id($conexao)){
     $_SESSION['mensagem'] = "Usuario cadastrado";
    header ("Location: login.php");
} else {
    $_SESSION['mensagem'] = "Usuario não cadastrado !";
    header ("Location: menu.php");
}
*/

//OPÇÃO 2 -----------------------------  TESTA SE USUÁRIO É VÁLIDO
/*
<?php 
        if(empty($_POST["username"]) || empty($_POST["senha"])) {

        header ("Location: login.php");
        exit();
    }
    $username = mysqli_real_scape_string($_POST["username"]);
    $senha = mysqli_real_scape_string($_POST["senha"]);

?>
*/



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title> Trabalho 3 - PHP </title>
<link href="style.css" rel="stylesheet">

</head>

<body>
 

  <header>
      
        <div id="logo">
     <img id="tetris-logo" src="img/project-logo.png" alt="logotipo">
            <h1> Login do Jogador </h1>
        </div>
    
  
  </header>
 
<?php

if (isset($_SESSION['mensagem'])) {
    echo $_SESSION['mensagem'];
    unset( $_SESSION['mensagem']);
}

?>

    <!--Menu em PHP -->



<div class="Login">
    <form  method="POST" action = "index.php" > 
     <p> Username: <input type = "text" name = "username"  /> </p>
        <p>  Senha: <input type = "text" name = "senha"  /> </p>
        <input type="submit" value="Fazer Login" name="submit"/>
        


<a href="cadastro.php"> Não possuo conta</a> <br>
    </form>
</div>

</body>

</html>
