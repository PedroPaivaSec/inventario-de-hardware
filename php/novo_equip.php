<?php

require_once __DIR__ . "/requires.php";

echo "<pre>";
var_dump($_POST);
var_dump($_FILES);
echo "</pre>";

$tamanho = 500*1024;
$tipo = ['image/jpeg', 'image/png'];

$caminho = __DIR__ . '/../img/';
$destinoFinal = $caminho . basename($_FILES['foto']['name']);

if (move_uploaded_file($_FILES['foto']['tmp_name'], $destinoFinal)){
    header("Location: " . BASE_URL . "/adicionar_equipamento.php");
    exit();
}

?>