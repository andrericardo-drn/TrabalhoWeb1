<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Ligas</title>
</head>
<body>
    <h1>Gestão de Ligas</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Processamento do formulário de criação de liga
        if (isset($_POST["criar_liga"])) {
            $nome = htmlspecialchars($_POST["nome"]);
            $descricao = htmlspecialchars($_POST["descricao"]);
            $quantidade_membros = htmlspecialchars($_POST["quantidade_membros"]);

            // Aqui você pode adicionar validações adicionais

            echo "<h2>Liga Criada com Sucesso:</h2>";
            echo "<p><strong>Nome da Liga:</strong> $nome</p>";
            echo "<p><strong>Descrição:</strong> $descricao</p>";
            echo "<p><strong>Quantidade Membros:</strong> $quantidade_membros</p>";
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
    <h2>Criar Liga</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nome">Nome da Liga:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" required></textarea>

        <label for="quantidade_membros">Quantidade Membros:</label>
        <input type="number" id="quantidade_membros" name="quantidade_membros" required>

        <button type="submit" name="criar_liga">Criar Liga</button>
    </form>

    <!-- Formulário para entrar em uma liga -->
    <h2>Entrar em Liga</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nome_jogador">Nome do Jogador:</label>
        <input type="text" id="nome_jogador" name="nome_jogador" required>

        <label for="codigo_liga">Código da Liga:</label>
        <input type="text" id="codigo_liga" name="codigo_liga" required>

        <button type="submit" name="entrar_liga">Entrar na Liga</button>
    </form>
</body>
</html>
