
<?php

session_start();

//CADASTRAR JOGADOR
include_once("conexao.php");

if (count($_POST) > 0 ){

    $name =  $_POST["name"];
    $datanasc = $_POST["datanasc"];
    $cpf =$_POST["cpf"];  
    $telefone = $_POST["tel"];       
    $email = $_POST["e-mail"];
    $username = $_POST["username"];
    $senha = $_POST["senha"];
  
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title> Trabalho 3 - PHP </title>
     <link href="style.css" rel="stylesheet">
</head>

<body>


<div class = "cadastro">

  <header>
       <h1> Cadastro do Jogador </h1>
  </header>



<form  method="POST" action = "login.php"  >

    <b> Dados para Cadastro </b> <br>

      <p> Nome Completo: <input type = "text" name = "name" required="required" /> </p>

      <p> Data de Nascimento: <input type = "text" name = "datanasc" required="required"  /> </p>

      <p> CPF: <input type = "text" name = "cpf" required="required"/> </p>

      <p> Telefone: <input type = "text" name = "tel" required="required"/> </p>

      <p> E-mail: <input type ="text" name = "e-mail" required="required" /> </p>

      <b> Dados para Login </b> <br>

      <p> Username Novo: <input type ="text" name = "username" required="required" /> </p>
      
      <p> Senha Nova: <input type ="text" name = "senha"required="required"  /> </p>


      <input type="submit" value="Cadastrar" name="submit"/>
    </form>
</div>
    
</body>

</html>
