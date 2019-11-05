<html>
   <body>
      
      <p> Criando Tabela </p>
      <?php
                echo "<p>Criando tabela no banco de dados... </p>";
				try {
					$conn = new PDO("mysql:host=localhost;dbname=bancophp", "root", "");
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
					$sql = "CREATE TABLE dados (
     						Nome_completo varchar(200) NOT NULL,
     						Data_de_nascimento date NOT NULL,
     						CPF varchar(80) NOT NULL,
     						Telefone varchar(80) NOT NULL,
     						Email varchar(200) NOT NULL,
     						username varchar(200) NOT NULL,
     						PRIMARY KEY(username),
     						senha varchar(200) NOT NULL
     						)";

     				$sql2 = "CREATE TABLE pontuacao (
     						pontos int NOT NULL,
     						level int NOT NULL,
     						tempo int NOT NULL,
     						username_dados varchar(200) NOT NULL,
     						foreign key (username_dados) references dados(username)
     						)";
    

					$conn->exec($sql);
                    $conn->exec($sql2);
					echo "<p>Tabela criada com sucesso</p>";

					$conn = null;
				}
				catch(PDOException $e)
				{
					echo "Ocorreu um erro: " . $e->getMessage();
				}
	?>

      
   </body>
</html>
