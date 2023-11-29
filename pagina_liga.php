<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="paginaLiga.css">
    <title>Página da Liga</title>
</head>
<body>
    <?php
    require_once "credentials.php";
    // Conectar ao banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Conexão com o banco de dados falhou: " . $conn->connect_error);
    }

    // Consulta SQL para recuperar dados da liga
    $sql = "SELECT IdLiga, PalavraChaveLiga, NomeLiga, PontuacaoTotalLiga, PontuacaoSemanalLiga FROM liga";
    $result = $conn->query($sql);

    // Verificar se há resultados
    if ($result->num_rows > 0) {
    ?>
        <!-- Seção de Todos os Jogadores -->
        <section>
            <ul>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <p><?php echo 'Nome: ' ?><?php echo $row['NomeLiga']; ?><p>
                    <p><?php echo 'Total: ' ?><?php echo $row['PontuacaoTotalLiga']; ?><p>
                    <p><?php echo 'Semanal: ' ?><?php echo $row['PontuacaoSemanalLiga']; ?><p>
                        <br>
                   
                        
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
