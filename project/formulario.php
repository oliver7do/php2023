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
    $nome = $_POST["nom"];
    $email = $_POST["email"];
    $mensagem = $_POST["data"];
    $mensagem = $_POST["telefone"];
    $mensagem = $_POST["message"];
    $mensagem = $_POST["pets"];
    $mensagem = $_POST["opcao"];
    $mensagem = $_POST["aceito"];

    echo "<p><strong>Nom:</strong> $nom</p>";
    echo "<p><strong>E-mail:</strong> $email</p>";
    echo "<p><strong>Data:</strong> $data</p>";
    echo "<p><strong>Tel:</strong> $telefone</p>";
    echo "<p><strong>Message:</strong> $message</p>";
    echo "<p><strong>Pets:</strong> $pets</p>";
    echo "<p><strong>Opcao:</strong> $opcao</p>";
    echo "<p><strong>Aceito:</strong> $aceito</p>";

    $consulta = "SELECT * FROM mensagens";
$resultado = $conexao->query($consulta);

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        echo "<p><strong>Nom:</strong> " . $row["nom"] . "</p>";
        echo "<p><strong>E-mail:</strong> " . $row["email"] . "</p>";
        echo "<p><strong>Data:</strong> " . $row["data"] . "</p>";
        echo "<p><strong>Tel:</strong> " . $row["telefone"] . "</p>";
        echo "<p><strong>Message:</strong> " . $row["message"] . "</p>";
        echo "<p><strong>Pets:</strong> " . $row["pets"] . "</p>";
        echo "<p><strong>Opcao:</strong> " . $row["opcao"] . "</p>";
        echo "<p><strong>Aceito:</strong> " . $row["aceito"] . "</p>";
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
    $inserir = $conexao->prepare("INSERT INTO mensagens (nom, email, mensagem) VALUES (?, ?, ?)");
    $inserir->bind_param("sss", $nome, $email, $data, $telefone, $message, $pets, $opcao, $aceito);

    if ($inserir->execute()) {
        echo "<p>Données insérées avec succès dans la base de données!</p>";
    } else {
        echo "<p>Erreur d'insertion de données dans la base de données: " . $inserir->error . "</p>";
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
