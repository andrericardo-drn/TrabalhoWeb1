<?php
function verifica_campo($texto){
  $texto = trim($texto); //remover espaços em branco em excesso no início e no final da string
  $texto = stripslashes($texto); //remover barras invertidas
  $texto = htmlspecialchars($texto); //converter caracteres especiais
  return $texto;
}

$nome = "";
$erro_nome = "";
$mail = "";
$erro_mail = "";
$data = "";
$erro_data = "";
$senha = "";
$erro_senha = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = verifica_campo($_POST["nome"]);
    $mail = verifica_campo($_POST["mail"]);
    $dtNasc = verifica_campo($_POST["data"]);
    $senha = verifica_campo($_POST["senha"]);
  
    if (empty($nome)) {
      $erro_nome = "Nome é obrigatório.";
    }

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $erro_mail = "Endereço de e-mail inválido.";
    }

    if (empty($data)) {
      $erro_data = "Data de Nascimento é obrigatória.";
    }

    if (empty($senha)) {
      $erro_senha = "A senha é obrigatória.";
    }
  }
?>