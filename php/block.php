<?php

function travaLogin(): void
{
    if (!isset($_SESSION['user_id'])) {
        header("Location: " . BASE_URL . "/login.php");
        exit;
    }
}

function bloqueioPost(): void
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: " . BASE_URL . "/login.php');
        error_log('Método indevido.');
        exit();
    }
}

function bloqueioCampoVazio(): void
{
    if (
        !isset($_POST['username'], $_POST['password']) ||
        !is_string($_POST['username']) ||
        $_POST['username'] === '' ||
        !is_string($_POST['password']) ||
        $_POST['password'] === ''
    ) {

        $_SESSION['flash'] = ['erro' => 'Preencha todos os campos.'];
        header("Location: " . BASE_URL . "/login.php");
        exit();
    }
}

function flashMessageUpload(string $mensagem): never
{
    $_SESSION['flash'] = ['erro' => $mensagem];
    header("Location: " . BASE_URL . "/adicionar_equipamento.php");
    exit();
}

function travaUpload(int $tamanho, array $tipo): string
{
    if (!isset($_FILES['foto'])) {
        flashMessageUpload('Nenhum arquivo existente.');
    }
    if ($_FILES['foto']['error'] === UPLOAD_ERR_NO_FILE) {
        flashMessageUpload('Nenhum arquivo foi enviado.');
    }

    if ($_FILES['foto']['error'] !== UPLOAD_ERR_OK) {
        flashMessageUpload('Erro no arquivo.');
    }

    if (!is_uploaded_file($_FILES['foto']['tmp_name'])) {
        flashMessageUpload('Formato de envio não permitido.');
    }

    if ($tamanho < $_FILES['foto']['size']) {
        flashMessageUpload('O tamanho do arquivo ultrapassou os limites permitidos.');
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mimeReal = $finfo->file($_FILES['foto']['tmp_name']);

    if (!array_key_exists($mimeReal, $tipo)) {
        flashMessageUpload('Tipo de arquivo não permitido.');
    }

    return $tipo[$mimeReal];
}
