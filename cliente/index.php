<?php
require_once "../banco.php";
$clientes = query(listar('cliente'));
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>
<body>
    <h1>Clientes</h1>
    <a href="criar.php">Adicionar Cliente</a>
    <table>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
        <tr>
            <td><?= $cliente["id_cliente"] ?></td>
            <td><?= $cliente["nome"] ?></td>
            <td><?= $cliente["email"] ?></td>
            <td><?= $cliente["telefone"] ?></td>
            <td>
                <a href="deletar.php?id=<?= $cliente["id_cliente"] ?>">Deletar</a>
                <a href="atualizar.php?id=<?= $cliente["id_cliente"] ?>">Atualizar</a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
</body>
</html>
