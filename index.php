<?php
    require("verification.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="login.css">
  <title>Tela de Login</title>
</head>
<body>
  <div class="container" id="container">
    <div class="form-container sign-up">
        <form method="post" action="verification.php">
            <h1>Cadastre-se</h1>

            <span>ou utilize o seu e-mail para cadastro</span>
            <input type="text" placeholder="Name" name="nome" value="<?php echo $nome; ?>">
            <span class="error"><?php echo $erro_nome; ?></span>
            <input type="email" placeholder="Email" name="mail" value="<?php echo $mail; ?>">
            <span class="error"><?php echo $erro_mail; ?></span>
            <input type="date" placeholder="data" name="data" value="<?php echo $data; ?>">
            <span class="error"><?php echo $erro_data; ?></span>
            <input type="password" placeholder="Password" name="senha" value="<?php echo $senha; ?>">
            <span class="error"><?php echo $erro_senha; ?></span>
            <button id="btn-reg-log">Cadastre-se</button>
        </form>
    </div>
    <div class="form-container sign-in">
        <form>
            <h1>Login</h1>

            <span>ou utilize o seu e-mail para logar</span>
            <input type="email" placeholder="Email">
            <input type="password" placeholder="Password">
            <input type="date" placeholder="Data">
            <a href="#">Esqueceu a senha?</a>
            <button id="btn-reg-log">Login</button>
        </form>
    </div>
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-left">
                <h1>Bem Vindo Novamente!</h1>
                <p>Insira os seus dados pessoais para poder acessar as ferramentas do nosso Jogo</p>
                <button class="hidden" id="login">Login</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Olá, Amigo!</h1>
                <p>Cadastre-se com seus dados pessoais para acessar todas as ferramentas do nosso Jogo</p>
                <button class="hidden" id="register">Cadastre-se</button>
            </div>
        </div>
    </div>
</div>
  <script src="login.js"></script>
</body>
</html>