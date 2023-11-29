<?php 

include 'credentials.php';

//conexão
$conn = mysqli_connect($servername, $username, $password);

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

//criando tabela liga
$sql = "CREATE TABLE IF NOT EXISTS `liga` (
    `IdLiga` int(11) NOT NULL AUTO_INCREMENT,
    `PalavraChaveLiga` varchar(50) NOT NULL,
    `NomeLiga` varchar(50) NOT NULL,
    `PontuacaoTotalLiga` int(11) DEFAULT NULL,
    `PontuacaoSemanalLiga` int(11) DEFAULT NULL,
    `DescricaoLiga` varchar(50) DEFAULT NULL,
    `ImagemLogoLiga` varchar(50) NOT NULL,
    `DataCriacaoLiga` date NOT NULL,
    PRIMARY KEY (`PalavraChaveLiga`),
    UNIQUE KEY `PalavraChaveLiga` (`PalavraChaveLiga`),
    UNIQUE KEY `NomeLiga` (`NomeLiga`),
    UNIQUE KEY `CodLiga` (`IdLiga`) USING BTREE
  )";
  
  if (mysqli_query($conn, $sql)) {
      echo "<br>Table created successfully<br>";
  } else {
      echo "<br>Error creating database: " . mysqli_error($conn);
  }
  
// pOPULANDO tabela liga
  $sql =  "INSERT INTO `liga` (`IdLiga`, `PalavraChaveLiga`, `NomeLiga`, `PontuacaoTotalLiga`, `PontuacaoSemanalLiga`, `DescricaoLiga`, `ImagemLogoLiga`, `DataCriacaoLiga`) VALUES
  (1, 'Abobrinha', 'Liga das aboboras', 1220, 520, NULL, '', '0000-00-00'),
  (2, 'Alexkutzke', 'Liga do professor', 3222, 849, NULL, '', '0000-00-00');
  ";

  if (mysqli_multi_query($conn, $sql)) {
      echo "<br>inserted successfully<br>";
  } else {
      echo "<br>Error creating database: " . mysqli_error($conn);
      die("<br>Erro ao Inserir.");
  }  

//criação da tabela partida
$sql = "CREATE TABLE IF NOT EXISTS `partida` (
    `IdPartida` int(11) NOT NULL AUTO_INCREMENT,
    `IdPlayer_player` int(11) NOT NULL,
    `PontuacaoPartida` int(11) NOT NULL,
    `DataPartida` date DEFAULT NULL,
    PRIMARY KEY (`IdPartida`),
    UNIQUE KEY `IdPartida` (`IdPartida`)
  )";

if (mysqli_query($conn, $sql)) {
    echo "<br>Table created successfully<br>";
} else {
    echo "<br>Error creating database: " . mysqli_error($conn);
}

// pOPULANDO tabela partida
$sql =  "INSERT INTO `partida` (`IdPartida`, `IdPlayer_player`, `PontuacaoPartida`, `DataPartida`) VALUES
(1, 4, 4242, '2023-11-29'),
(2, 5, 2323, '2020-11-29'),
(3, 4, 23232, '2017-11-29');";

if (mysqli_multi_query($conn, $sql)) {
    echo "<br>inserted successfully<br>";
} else {
    echo "<br>Error creating database: " . mysqli_error($conn);
    die("<br>Erro ao Inserir.");
}

//criação da tabela player
$sql = "CREATE TABLE IF NOT EXISTS `player` (
    `IdPlayer` int(11) NOT NULL AUTO_INCREMENT,
    `NomePlayer` varchar(50) NOT NULL,
    `UsuarioPlayer` varchar(50) NOT NULL,
    `EmailPlayer` varchar(50) NOT NULL,
    `SenhaPlayer` varchar(50) NOT NULL,
    `DescricaoPlayer` varchar(50) DEFAULT NULL,
    `PontuacaoTotalPlayer` int(11) DEFAULT NULL,
    `PontuacaoSemanalPlayer` int(11) DEFAULT NULL,
    PRIMARY KEY (`IdPlayer`),
    UNIQUE KEY `IdPlayer` (`IdPlayer`),
    UNIQUE KEY `UsuarioPlayer` (`UsuarioPlayer`),
    UNIQUE KEY `NomePlayer` (`NomePlayer`),
    UNIQUE KEY `EmailPlayer` (`EmailPlayer`)
  )";

if (mysqli_query($conn, $sql)) {
    echo "<br>Table created successfully<br>";
} else {
    echo "<br>Error creating database: " . mysqli_error($conn);
}

$sql =  "INSERT INTO `player` (`IdPlayer`, `NomePlayer`, `UsuarioPlayer`, `EmailPlayer`, `SenhaPlayer`, `DescricaoPlayer`, `PontuacaoTotalPlayer`, `PontuacaoSemanalPlayer`) VALUES
(4, 'THIAGAOXD', 'thiagopernilongo123', 'thiagogamer@gmail.com', 'pernilongao123', NULL, NULL, NULL),
(5, 'oitudobem', '123', '123@gmail.com', '123', NULL, NULL, NULL),
(7, '1233', '1233', '1234@gmail.com', '1233', NULL, NULL, NULL),
(9, 'thalesdoprado', '112', '117@gmail.com', '117', NULL, NULL, NULL),
(10, 'sssss', 'ss', 'ss@gmail.com', 'ss', NULL, NULL, NULL);
";

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