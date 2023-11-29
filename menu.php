<?php
session_start();
echo $_SESSION["user_name"];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="shortcut icon" href="/assets/favicon.ico" type="image/x-icon">
    <title>Home</title>
</head>
<body>
<div class="container">
    <div class="menu">
        <button class="btn btn-sm animated-button thar-three"><a href="#">Jogar</a></button>
        <button class="btn btn-sm animated-button thar-three"><a href="#">Histórico de Partidas</a></button>
        <button class="btn btn-sm animated-button thar-three"><a href="#">Ligas</a></button>
    </div>
</div>
</body>
</html>