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
    <title> Trabalho 3 - PHP </title>
     <link href="style.css" rel="stylesheet">
</head>

<body>




<header>
  <div id="logo">
     <img id="tetris-logo" src="img/project-logo.png" alt="logotipo">
      
        </div>
    
  </header>

  <div class = "alterarCadastro">
<?php
$form = "
<form action = 'alterar.php'  method='POST'> 


      <p> Nome Completo: <input type = 'text' name = 'nome' /> </p>

      <p> Telefone: <input type = 'text' name = 'tel' /> </p>

      <p> E-mail: <input type ='text' name = 'e-mail'  /> </p>
      
      <p> Senha Nova: <input type ='text' name = 'senha' /> </p>
            <input id='buttonalterar' type='submit' value='Alterar' name='submit'/>
    </form>";

if (isset($_POST['nome'])){
    $username = $_SESSION['username'];
    $nome = $_POST['nome'];
    $tel = $_POST['tel'];
    $email = $_POST['e-mail'];
    $senha = $_POST['senha'];
  try{
    $conn = new PDO("mysql:host=localhost;dbname=bancophp", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  


     $sql = "UPDATE dados SET Nome_completo = '$nome', Telefone = '$tel', Email = '$email', senha = '$senha' WHERE username = '$username'";
   $conn->exec($sql);

  }
  catch(PDOException $e){
    echo "Ocorreu um erro: " . $e->getMessage();
  } 
}
else{   
  echo $form;
}
?>

<input id= "buttonvoltar" type='button' value='Voltar' name='voltar' onclick='history.go(-2)'/>


</div>
    
</body>

</html>
