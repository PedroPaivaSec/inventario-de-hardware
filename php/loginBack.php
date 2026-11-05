<?php

require_once __DIR__ . "/requires.php";

bloqueioPost();
bloqueioCampoVazio($_POST);

$user = trim($_POST['username']);
$pass = $_POST['password'];

try {
    $registro = loginValidate($pdo, $user);

    if ($registro === false || !password_verify($pass, $registro['senha_hash'])) {

        $_SESSION['flash'] = ['erro' => 'Usuário ou senha incorretos.'];
        header("Location: " . BASE_URL . "/login.php");
        exit();
    }

    session_regenerate_id(true);
    $_SESSION['user_id'] = $registro['id'];
    $_SESSION['user_name'] = $user;
    header("Location: " . BASE_URL . "/index.php");
    exit();

} catch (PDOException $e) {
    $_SESSION['flash'] = ['erro' => 'Falha ao realizar consulta ao banco'];
    error_log("Falha ao realizar consulta: " . $e->getMessage());
    header("Location: " . BASE_URL . "/login.php");
    exit();
}
