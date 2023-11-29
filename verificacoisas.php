<?php
include 'php/credentials.php';
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
$errotabela = 0;

if(!$query){
  die('Error:' . mysqli_connect_error());
}
else{
  echo 'Conexão DB funciona';
}

$sql = "select * FROM player";
$query_player = mysqli_query($conn, $sql);

if(!$query_player){
  die('Error:' . mysqli_connect_error());
  $errotabela = 1;
}


$sql = "select * from liga";
$query_liga = mysqli_query($conn, $sql);

if(!$query_liga){
  die('Error:' . mysqli_connect_error());
  $errotabela = 1;
}

$sql = "select * from partida";
$query_partida = mysqli_query($conn, $sql);

if(!$query_partida){
  die('Error:' . mysqli_connect_error());
  $errotabela = 1;
}

if($errotabela){
  echo 'Erro ao conectar com alguma das tabelas';
}
if(!$login){
  $user_id = 0;
}

?>

