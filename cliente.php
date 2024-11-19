<?php
$servername = "root";
$username = "username";
$password = "root";
$dbname = "pratica1_dani";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

$sql = "INSERT INTO cliente (nome, email, telefone) VALUES ('$nome', '$email', '$telefone')";


if ($conn->query($sql) === TRUE) {
    $cliente_id = $conn->insert_id;
    $response = ['mensagem' => 'Cliente cadastrado com sucesso' => true, 'cliente_id' => $cliente_id];
} else {
    $response = ['mensagem' => 'Erro ao cadastrar cliente: ' . $conn->error];
}

echo json_encode($response);

$conn->close();
?>