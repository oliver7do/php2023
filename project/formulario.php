<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Processando Formulário</title>
</head>
<body>
    <div class="container">
        <h1>Processando Formulário</h1>
        
        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $mensagem = $_POST["mensagem"];

    echo "<p><strong>Nome:</strong> $nome</p>";
    echo "<p><strong>E-mail:</strong> $email</p>";
    echo "<p><strong>Mensagem:</strong> $mensagem</p>";

    $consulta = "SELECT * FROM mensagens";
$resultado = $conexao->query($consulta);

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        echo "<p><strong>Nome:</strong> " . $row["nome"] . "</p>";
        echo "<p><strong>E-mail:</strong> " . $row["email"] . "</p>";
        echo "<p><strong>Mensagem:</strong> " . $row["mensagem"] . "</p>";
        echo "<p><strong>Data de Envio:</strong> " . $row["data_envio"] . "</p>";
        echo "<hr>";
    }
} else {
    echo "<p>Nenhum registro encontrado.</p>";
}

    // Conectar ao banco de dados (substitua pelas suas credenciais)
    $conexao = new mysqli("localhost", "seu_usuario", "sua_senha", "formulario_contato");

    // Verificar conexão
    if ($conexao->connect_error) {
        die("Erro na conexão: " . $conexao->connect_error);
    }

    // Preparar e executar a inserção dos dados na tabela
    $inserir = $conexao->prepare("INSERT INTO mensagens (nome, email, mensagem) VALUES (?, ?, ?)");
    $inserir->bind_param("sss", $nome, $email, $mensagem);

    if ($inserir->execute()) {
        echo "<p>Dados inseridos com sucesso na base de dados!</p>";
    } else {
        echo "<p>Erro ao inserir dados na base de dados: " . $inserir->error . "</p>";
    }

    // Fechar a conexão
    $conexao->close();
}
?>


$consulta = "SELECT * FROM mensagens";
$resultado = $conexao->query($consulta);

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        echo "<p><strong>Nome:</strong> " . $row["nome"] . "</p>";
        echo "<p><strong>E-mail:</strong> " . $row["email"] . "</p>";
        echo "<p><strong>Mensagem:</strong> " . $row["mensagem"] . "</p>";
        echo "<p><strong>Data de Envio:</strong> " . $row["data_envio"] . "</p>";
        echo "<hr>";
    }
} else {
    echo "<p>Nenhum registro encontrado.</p>";
}

// Fechar a conexão
$conexao->close();
?>


    </div>
</body>
</html>
