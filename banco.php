<?php
function conectar() {
    $conn = mysqli_connect("localhost","root","root","pratica1_dani");
    return $conn;
}

function desconectar(mysqli $conn) {
    $conn->close();
}

function query($raw) {
    $conn = conectar();
    $resposta = mysqli_query($conn, $raw);
    desconectar($conn);

    if (is_bool($resposta)) {
        return [];
    }

    if ($resposta->num_rows == 0) {
        return [];
    }

    if ($resposta->num_rows == 1) {
        return [$resposta->fetch_assoc()];
    }
    
    $data = [];
    while ($row = $resposta->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

function inserir(string $tabela, array $campos, array $valores) {
    $valores = array_map(fn ($valor) => "'$valor'", $valores);
    $valores = implode(", ", $valores);
    $campos = implode(", ", $campos);

    return "INSERT INTO $tabela ($campos) VALUES ($valores)";
}

function atualizar(string $tabela, array $dados, array $id) {
    $dados_query = "";
    
    foreach ($dados as $nome => $valor) {
        $dados_query .= "$nome = '$valor',";
    }
    
    $dados_query = rtrim($dados_query, ',');
    
    $id_nome = $id[0];
    $id_valor = $id[1];
    return "UPDATE $tabela SET $dados_query WHERE $id_nome = $id_valor";
}

function deletar(string $tabela, array $id) {
    $id_nome = $id[0];
    $id_valor = $id[1];
    return ("DELETE FROM $tabela WHERE $id_nome = $id_valor");
}

function listar(string $tabela, $id = null) {
    if ($id != null) {
        $id_nome = $id[0];
        $id_valor = $id[1];  
        return "SELECT * FROM $tabela WHERE $id_nome = $id_valor";
    }

    return "SELECT * FROM $tabela";
}