<?php
include 'config.php';
require 'php/autenticacao.php';

$delete = "";
$add = "";
$nome = "";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
  die('Problemas ao conectar ao BD: ' . mysqli_connect_error());
}

$sql = "use $dbname";
$query = mysqli_query($conn, $sql);

if(!$query){
  die('Error:' . mysqli_connect_error());
}

$sql = "SELECT IdPlayer, NomePlayer, UsuarioPlayer, SenhaPlayer FROM player; ";
$query_jogadores = mysqli_query($conn, $sql);

if(!$query_jogadores){
  die('Error:' . mysqli_connect_error());
}

$sql = "SELECT * FROM liga; ";
$query_ligas = mysqli_query($conn, $sql);

if(!$query_ligas){
  die('Error:' . mysqli_connect_error());
}

if(!$login){
  $user_id = 0;
}

?>

