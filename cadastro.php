<?php
  include 'credentials.php';
  require "php/validacao.php";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
    die('Problemas ao conectar ao BD: ' . mysqli_connect_error());
    }

    $sql = "use $dbname";
    $query = mysqli_query($conn, $sql);

    if(!$query){
    die('Error:' . mysqli_connect_error());
    }
    //INSERÇÃO DE DADOS DE CADASTRO NA TABELA
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $erro == false) {
        $sql = "INSERT INTO player
        (NomePlayer,UsuarioPlayer, SenhaPlayer, EmailPlayer) VALUES
        ('$nome','$usuario', '$senha', '$email');";
        }

if(mysqli_query($conn, $sql)){
$success = true;
}
else {
$error_msg = mysqli_error($conn);
$error = true;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="/assets/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="cadastro.css">
        <title>Cadastre-se</title>
    </head>
    <body>
        <div id="container">
            <form method="POST" id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="card">
                <div class="card-header ">

                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !$erro): ?>
                    <div class="alert alert-success">
                        <script>alert("Cadastro realizado com sucesso!")</script>
                        <?php // limpa o formulário.
                        $nome = $usuario = $senha = $email =  "";
                        ?>
                    </div>
                    <?php endif; ?>
                    <h1>Realize seu cadastro</h1>
                </div>
                <div class="card-content formStyle <?php if(!empty($erro_nome)){echo "has-error";}?>">
                    <div class="card-content-area">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" value="<?php echo $nome; ?>" autocomplete="off">
                    </div>
                    <div>
                        <?php if (!empty($erro_nome)): ?>
                        <span class="help-block"><?php echo $erro_nome ?></span>
                        <?php endIf; ?>
                    </div>

                    <div class="card-content-area formStyle <?php if(!empty($erro_usuario)){echo "has-error";}?>">
                        <label for="usuario">Usuario</label>
                        <input type="text" name="usuario" value="<?php echo $usuario; ?>" autocomplete="off">
                    </div> 
                    <div>
                        <?php if (!empty($erro_usuario)): ?>
                        <span class="help-block"><?php echo $erro_usuario ?></span>
                        <?php endIf; ?>
                    </div>

                    <div class="card-content-area formStyle <?php if(!empty($erro_senha)){echo "has-error";}?>">
                        <label for="senha">Senha</label>
                        <input type="text" name="senha" value="<?php echo $senha; ?>" autocomplete="off">
                    </div> 
                    <div>
                        <?php if (!empty($erro_senha)): ?>
                        <span class="help-block"><?php echo $erro_senha ?></span>
                        <?php endIf; ?>
                    </div>

                    <div class="card-content-area formStyle <?php if(!empty($erro_email)){echo "has-error";}?>">
                        <label for="email">Email</label>
                        <input type="text" name="email" value="<?php echo $email; ?>" autocomplete="off">
                    </div>
                    <div>
                        <?php if (!empty($erro_email)): ?>
                        <span class="help-block"><?php echo $erro_email ?></span>
                        <?php endIf; ?>
                    </div>
                </div>  
                <div class="card-footer">
                    <button type="submit" class="btn btn-sm animated-button thar-three">Cadastre-se</button>
                    <a href="login.php" class="logar">Já possui uma conta? Login</a>
                </div>
            </form>
        </div>
    </body>
</html>
