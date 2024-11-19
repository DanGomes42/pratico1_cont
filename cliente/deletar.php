<?php 
require_once "../banco.php";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    query(deletar("cliente", ["id_cliente", $id]));
    query(listar('cliente'));
    header('Location: /atividade-pratica/cliente');
}