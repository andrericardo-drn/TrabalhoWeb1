<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="paginaLiga.css">
    <title>Página da Liga</title>
</head>
<body>
    <h1>Página da Liga</h1>

    <?php
    require_once "credentials.php";
    // Conectar ao banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Conexão com o banco de dados falhou: " . $conn->connect_error);
    }

    // Consulta SQL para recuperar dados da liga
    $sql = "SELECT * from player";
    $result = $conn->query($sql);

    // Verificar se há resultados
    if ($result->num_rows > 0) {
    ?>
        <!-- Seção de Todos os Jogadores -->
        <section>
            <h3>Todos os Jogadores</h3>
            <ul>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <li><?php echo $row['NomePlayer']; ?></li>
                <?php endwhile; ?>
            </ul>
        </section>
    <?php
    } else {
        echo "Não há jogadores na liga.";
    }
    ?>
</body>
</html>
