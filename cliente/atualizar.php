<?php
require_once "../banco.php";

$atualizado = false;
$atualizar = $_SERVER['REQUEST_METHOD'] === "POST";

$id = $_GET["id"];

if ($atualizar) {
    if (
        isset($_POST["nome"]) && 
        isset($_POST["email"]) && 
        isset($_POST["telefone"])
    ) {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];

        query(atualizar("cliente", ["nome" => $nome, "email" => $email, "telefone" => $telefone], ["id_cliente", $id]));
        $atualizado = true;
    }
}

$cliente = query(listar('cliente', ["id_cliente", $id]));
$cliente = $cliente[0];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar cliente</title>
</head>
<body>
    <a href="/atividade-pratica/cliente">Voltar</a>

    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?= $cliente["nome"] ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $cliente["email"] ?>" required>

        <label for="telefone">Telefone:</label>
        <input type="telefone" id="telefone" name="telefone" value="<?= $cliente["telefone"] ?>" required>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>