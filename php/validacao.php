<?php
include 'config.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
  die('Problemas ao conectar ao BD: ' . mysqli_connect_error());
}

$sql = "use $dbname";
$query = mysqli_query($conn, $sql);

if(!$query){
  die('Error:' . mysqli_connect_error());
}

function verifica_campo($texto){
  $texto = trim($texto);
  $texto = stripslashes($texto);
  $texto = htmlspecialchars($texto);
  return $texto;
}

$nome = $email = $senha =  "";
$erro = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if(empty($_POST["nome"])){
    $erro_nome = "O nome é obrigatório.";
    $erro = true;
  }
  else{
    $nome = verifica_campo($_POST["nome"]);
  }


if (empty($_POST["senha"])){
    $erro_senha = "A Senha é obrigatória";
    $erro = true;
  }

if(empty($_POST["email"])){
    $erro_email = "O Email é obrigatório.";
    $erro = true;
  }
  else{
    $email = verifica_campo($_POST["email"]);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $erro = false;
    } 
    else {
      $erro_email = $email;
      $erro_email .= " é um e-mail inválido";
      $erro = true;
    }
  }
}
