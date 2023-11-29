<?php


require 'autenticacao.php';
require_once (__DIR__ . '/../config.php');

$conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Conexão com o banco de dados falhou: " . $conn->connect_error);
    }

    $sql = "SELECT NomePlayer, UsuarioPlayer, SenhaPlayer, EmailPlayer, DescricaoPlayer, PontuacaoTotalPlayer, PontuacaoSemanalPlayer FROM player
    WHERE IdPlayer = '" . $_SESSION["user_id"] . "'";
    $result = $conn->query($sql);
    
        
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="/assets/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../css/perfil.css">
        <?php while ($row = $result->fetch_assoc()) : ?>
        <title>Perfil de <?php echo $row['NomePlayer'];?></title>
    </head>
    <body>
            <h1> Perfil de <?php echo $row['NomePlayer']; ?> </h1>
            <p><?php echo 'Nome: ' ?><?php echo $row['NomePlayer']; ?><p>
            <p><?php echo 'Usuario: ' ?><?php echo $row['UsuarioPlayer']; ?><p>
            <p><?php echo 'Senha: ' ?><?php echo $row['SenhaPlayer']; ?><p>
            <p><?php echo 'Email: ' ?><?php echo $row['EmailPlayer']; ?><p>
            <?php endwhile; ?>
    </body>
</html>
