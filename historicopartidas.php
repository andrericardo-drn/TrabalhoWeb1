<?php 
include 'php/credentials.php';
require 'php/autenticacao.php';


$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
  die('Problemas ao conectar ao BD: ' . mysqli_connect_error());
}

$sql = "use $dbname";
$query = mysqli_query($conn, $sql);

if(!$query){
  die('Error:' . mysqli_connect_error());
}

$i = $user_id;
$sql = "SELECT PontuacaoPartida, NomePlayer, DataPartida FROM partida, player WHERE IdPlayer = IdPlayer_Player;";
$result = $conn->query($sql);


if(!$result){
  die('Error:' . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      color: white;
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="menu.css">
    <link rel="shortcut icon" href="/assets/favicon.ico" type="image/x-icon">
    <title>Histórico de partidas </title>
    <?php if ($result->num_rows > 0) { ?>
      <table>
        <tr>
          <td> Jogador </td>
          <td> Pontuação </td>
          <td> Data </td>
        </tr>
    <?php while ($row = $result->fetch_assoc()) : ?>
        <tr>
          <td><?php echo $row['NomePlayer'];?></td>
          <td><?php echo $row['PontuacaoPartida'];?></td>
          <td><?php echo $row['DataPartida'];?></td>
        </tr>
    <?php endwhile; ?>
      </table>
    <?php } ?>
</head>
<body>
    
</body>
</html>