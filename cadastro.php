

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
   <h1> Cadastro do Jogador </h1>
      </div>
  
  </header>

  <div class = "Cadastro">
  <?php
$form = "
<form action = 'cadastro.php'  method='POST'> 
  <p> Nome Completo: <input type = 'text' name = 'nome' /> </p>
  <p> Data de Nascimento: <input type = 'text' name = 'datanasc'   /> </p>
  <p> CPF: <input type = 'text' name = 'cpf'/> </p>
  <p> Telefone: <input type = 'text' name = 'tel' /> </p>
  <p> E-mail: <input type ='text' name = 'e-mail'  /> </p>
  <p> Username Novo: <input type ='text' name = 'username' /> </p> 
  <p> Senha Nova: <input type ='password' name = 'senha' /> </p>
  <input id='buttoncadastrar' type='submit' value='Cadastrar' name='submit'/>
</form>";

if(isset($_POST["nome"])){
  try{
    $conn = new PDO("mysql:host=localhost;dbname=bancophp", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    $sql = "INSERT INTO dados VALUES (
                          '" . $_POST['nome'] . "',
                          " . $_POST['datanasc'] . ", 
                          '" .$_POST['cpf'] . "', 
                          '" .$_POST['tel'] . "', 
                          '" . $_POST['e-mail'] . "',
                          '" . $_POST['username'] . "',
                          '" . $_POST['senha'] . "')";
    $conn->exec($sql);
    echo $form;
    header("Location: cadastro.php");
  }
  catch(PDOException $e){
    echo "Ocorreu um erro: " . $e->getMessage();
  } 
}
else{   
  echo $form;
}

?>
<a id= "buttonfazerlogin" href="login.php"> Fazer login</a> <br>


</div>
    
</body>

</html>
