
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title> Trabalho 3 - PHP </title>
     <link href="style.css" rel="stylesheet">
</head>

<body>

<?php
      
        include "login.php";
   


    
    session_start();
   if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true){
    session_destroy();
    }

?>


