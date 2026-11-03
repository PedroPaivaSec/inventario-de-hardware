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
        header('Location: http://localhost:8000/login.php');
        error_log('Método indevido.');
        exit();
    }
}
