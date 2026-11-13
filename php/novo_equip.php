<?php

require_once __DIR__ . "/requires.php";
bloqueioPost();
travaLogin();
//bloqueioCampoVazio();

$tamanho = 2 * 1024 * 1024;
$tipo = [
    'image/jpeg' => 'jpeg',
    'image/png' => 'png'
];
$ext = travaUpload($tamanho, $tipo);
$nomeRandom = bin2hex(random_bytes(16)) . "." . $ext;
$cliente = $_POST['cliente'] ?? '';
$equipamento = $_POST['equipamento'] ?? '';
$problema = $_POST['problema'] ?? '';

$caminho = __DIR__ . '/../img/';
$destinoFinal = $caminho . $nomeRandom;

if (move_uploaded_file($_FILES['foto']['tmp_name'], $destinoFinal)) {

    try {
        adicionarEquipamento($pdo, $cliente, $nomeRandom, $equipamento, $problema);
        $_SESSION['flash'] = ['sucesso' => 'Arquivo enviado com sucesso.'];
        header("Location: " . BASE_URL . "/adicionar_equipamento.php");
        exit();
    } catch (PDOException $e) {

        if (file_exists($destinoFinal)) {
            unlink($destinoFinal);
        }
        error_log('Erro ao salvar os dados no banco: ' . $e->getMessage());
        flashMessageUpload('Erro ao salvar os dados no banco.');
    }
} else {
    flashMessageUpload('Erro ao enviar o arquivo.');
}
