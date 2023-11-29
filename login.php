<?php
session_start();
include('php/credentials.php');
require "php/autenticacao.php";

if ($login) {
    echo 'login = true';
} else {
    echo 'login = false';
}

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die('Problemas ao conectar ao BD: ' . mysqli_connect_error());
}

$sql = "use $dbname";
$query = mysqli_query($conn, $sql);

if (!$query) {
    die('Error:' . mysqli_connect_error());
}

$error = false;
$usuario = $senha = "";

if (!$login && $_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $usuario = mysqli_real_escape_string($conn, $_POST["usuario"]);
    $senha = mysqli_real_escape_string($conn, $_POST["senha"]);

    $sql = "SELECT IdPlayer, NomePlayer, UsuarioPlayer, SenhaPlayer, EmailPlayer FROM player
            WHERE UsuarioPlayer = '$usuario' AND SenhaPlayer = '$senha';";

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if ($user["SenhaPlayer"] == $senha) {
            $_SESSION["user_id"] = $user["IdPlayer"];
            $_SESSION["user_name"] = $user["NomePlayer"];
            $_SESSION["user_username"] = $user["UsuarioPlayer"];
            $_SESSION["user_senha"] = $user["SenhaPlayer"];
            $_SESSION["user_email"] = $user["EmailPlayer"];
            // Redirecionar para menu.php
            header("Location: menu.php");
            exit();
        } else {
            $error_msg = "Senha incorreta!";
            $error = true;
        }
    } else {
        $error_msg = "Usuário não encontrado!";
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="/assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>

<body>

<?php if ($login): ?>
    <div class="loginfeito">
        <h1>
            <strong>Welcome Back</strong>
        </h1>
        <h3>
            <strong> <?php echo $_SESSION["user_name"]?> </strong><br>
            <strong> <?php echo $_SESSION["user_email"]?> </strong>
        </h3>
        <form action="logout.php">
            <div class="card-footer">
                <button type="submit" class="btn btn-sm animated-button thar-three">Logout</button>
            </div>
        </form>
    </div>
    <?php exit(); ?>
<?php endif; ?>

<div id="container">
    <form method="POST" action="login.php" class="card">
        <div class="card-header">
            <h1>Login</h1>
        </div>
        <div class="card-content">
            <?php if ($error): ?>
                <h3 class="erro"><?php echo $error_msg; ?></h3>
            <?php endif; ?>
            <div class="card-content-area formStyle">
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" autocomplete="off">
            </div>
            <div class="card-content-area formStyle">
                <label for="password">Senha</label>
                <input type="password" name="senha" autocomplete="off">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-sm animated-button thar-three">Login</button>
            <a href="cadastro.php" class="cadastrar">Não possui uma conta? Cadastre-se</a>
        </div>
    </form>
</div>
</body>
</html>
