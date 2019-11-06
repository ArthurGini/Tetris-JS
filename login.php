

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
 
  <div class="Login">

  <?php
$form = "
  <form action = 'login.php' method='POST'> 
    <p> Username: <input type = 'text' name = 'username'   /> </p>
    <p> Senha: <input type = 'password' name = 'senha'  /> </p>
    <input type='submit' value='Login' name='submit'/>
  </form>";

if (isset($_POST["username"])){
  $username = $_POST['username'];
  try{
    $conn = new PDO("mysql:host=localhost;dbname=bancophp", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    $stmt = $conn->query("SELECT * FROM dados WHERE username = '".$_POST['username']."' AND senha= '".$_POST['senha']."'"); 
    if($stmt->execute()){
      if($stmt->rowcount() == 1){
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['loggedin'] = true;
        header("Location: index.php");  
      }
      else {  
        echo "Invalid username or password!"; 
      }  
    }
  }
  catch(PDOException $e){
    echo "Ocorreu um erro: " . $e->getMessage();
  } 
}
else{   
  echo $form;
}
?>



<a href="cadastro.php"> Não possuo conta</a> <br>



</div>

</body>

</html>
