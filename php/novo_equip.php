<?php

require_once __DIR__ . "/requires.php";
bloqueioPost();
travaLogin();
//bloqueioCampoVazio();

$tamanho = 500 * 1024;
$tipo = [
    'image/jpeg' => 'jpeg',
    'image/png' => 'png'
];
$ext = travaUpload($tamanho, $tipo);
$nomeRandom = bin2hex(random_bytes(16)) . "." . $ext;

travaUpload($tamanho, $tipo);

$caminho = __DIR__ . '/../img/';
$destinoFinal = $caminho . $nomeRandom;

if (move_uploaded_file($_FILES['foto']['tmp_name'], $destinoFinal)) {
    $_SESSION['flash'] = ['sucesso' => 'Arquivo enviado com sucesso.'];
    header("Location: " . BASE_URL . "/adicionar_equipamento.php");
    exit();
} else {
    flashMessageUpload('Erro ao enviar o arquivo.');
}
