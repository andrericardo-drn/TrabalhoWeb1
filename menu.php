<?php
session_start();
$welcome_message = "Bem-vindo, " . $_SESSION["user_name"];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="menu.css">
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
    <title>Tela Inicial</title>
</head>

<body>
    <div class="container">
        <div class="menu">
            <h1 class="welcome-message">
                <?php echo $welcome_message; ?>
            </h1>
            <button class="btn btn-sm animated-button thar-three"><a href="teste.html">Novo Jogo</a></button>
            <button class="btn btn-sm animated-button thar-three"><a href="historicopartidas.php">Histórico de Partidas</a></button>
            <button class="btn btn-sm animated-button thar-three"><a href="ligas.php"> Ligas </a></button>
        </div>
    </div>
</body>
</html>
