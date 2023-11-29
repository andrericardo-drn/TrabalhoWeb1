<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Gestão de Ligas</title>
</head>
<body>
    

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Processamento do formulário de criação de liga
        if (isset($_POST["cria_liga"])) {
            $nome = htmlspecialchars($_POST["nomeliga"]);
            $palavrachaveliga = htmlspecialchars($_POST["palavrachaveliga"]);
            // Aqui você pode adicionar validações adicionais

            echo "<h2>Liga Criada com Sucesso:</h2>";
            echo "<p><strong>Nome da Liga:</strong> $nome</p>";
            echo "<p><strong>Descrição:</strong> $palavrachaveliga</p>";
        }

        // Processamento do formulário de entrada em uma liga
        if (isset($_POST["entrar_liga"])) {
            $nome_jogador = htmlspecialchars($_POST["nome_jogador"]);
            $codigo_liga = htmlspecialchars($_POST["codigo_liga"]);

            // Aqui você pode adicionar validações adicionais

            echo "<h2>Você entrou na Liga com sucesso:</h2>";
            echo "<p><strong>Nome do Jogador:</strong> $nome_jogador</p>";
            echo "<p><strong>Código da Liga:</strong> $codigo_liga</p>";
        }
    }
    ?>

    <!-- Formulário para criar uma liga -->
    
    <div id="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="card-header">
                <h1>Cadastro de Liga</h1>
            </div>
            <div class="card-content">
                
                <div class="card-content-area formStyle">
                    <label for="nomeliga">Nome</label>
                    <input type="text" name="nomeliga" autocomplete="off">
                </div>
                <div class="card-content-area formStyle">
                    <label for="palavrachaveliga">Palavra Chave</label>
                    <input type="text" name="palavrachaveliga" autocomplete="off">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" name="cria_liga">Entrar na Liga</button>
            </div>
            
        </form>
    </div>

    <!-- Formulário para entrar em uma liga -->

    <div id="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="card-header">
                <h1>Entrar em uma liga</h1>
            </div>
            <div class="card-content">
                
                <div class="card-content-area formStyle">
                    <label for="palavrachaveliga">Palavra Chave</label>
                    <input type="text" name="palavrachaveliga" autocomplete="off">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" name="entrar_liga">Entrar na Liga</button>
            </div>
            
        </form>
    </div>

</body>
</html>
