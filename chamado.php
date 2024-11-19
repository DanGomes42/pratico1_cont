<?php
$servername = "root";
$username = "username";
$password = "root";
$dbname = "pratica1_dani";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
$cliente_id = $_GET['cliente_id'];

$descricao = $_POST['descricao'];
$criticidade = $_POST['criticidade'];
$status = $_POST['status'];
$data_abertura = $_POST['data_abertura'];
$colaborador = $_POST['colaborador'];

$sql = "INSERT INTO chamado (cliente_id, descricao, criticidade, status, data_abertura, id_colaborador) 
        VALUES ('$cliente_id', '$descricao', '$criticidade', 'aberto', '$data_abertura', '$colaborador')";

if ($conn->query($sql) === TRUE) {
    $response = ['mensagem' => 'Chamado cadastrado com sucesso'];
} else {
    $response = ['mensagem' => 'Erro ao cadastrar chamado: ' . $conn->error];
}

echo json_encode($response);

$conn->close();
?>