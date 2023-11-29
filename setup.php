<?php 

include 'config.php';

//conexão
$conn = mysqli_connect($servername, $username, $password, $dbname);

//validação da conexão
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//criação da database
$sql = "CREATE DATABASE $dbname";
if (mysqli_query($conn, $sql)) {
    echo "<br>Database created successfully<br>";
} else {
    echo "<br>Error creating database: " . mysqli_error($conn);
}

//escolha da database
$sql = "USE $dbname";
if (mysqli_query($conn, $sql)) {
    echo "<br>Database changed successfully<br>";
} else {
    echo "<br>Error changing database: " . mysqli_error($conn);
}

//usuarios - login
$sql = "CREATE TABLE Jogadores (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(128) NOT NULL,
  )";
  
  if (mysqli_query($conn, $sql)) {
      echo "<br>Table created successfully<br>";
  } else {
      echo "<br>Error creating database: " . mysqli_error($conn);
  }

//criação de ligas
$sql = "CREATE TABLE Ligas (
    nomeLiga varchar(255) NOT NULL,
    plvChave varchar(255) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "<br>Table created successfully<br>";
} else {
    echo "<br>Error creating database: " . mysqli_error($conn);
}

$sql =  "INSERT INTO Jogadores (nome, email, senha) VALUES ('Gabriel', 'usu@usu.com', '123');";

if (mysqli_multi_query($conn, $sql)) {
    echo "<br>inserted successfully<br>";
} else {
    echo "<br>Error creating database: " . mysqli_error($conn);
    die("<br>Erro ao Inserir.");
}

mysqli_close($conn);

?>

<html>
    <body>
    <a href="index.php"> Login! </a>
    </body>
</html>