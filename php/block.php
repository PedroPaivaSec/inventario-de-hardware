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

        $_SESSION['flash'] = ['erro' => 'Preencha todos os campos'];
        header("Location: " . BASE_URL . "/login.php");
        exit();
    }
}
