<?php

require_once __DIR__ . "/requires.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if (!empty($_POST['username']) && !empty($_POST['password'])) {

        $user = $_POST['username'];
        $pass = $_POST['password'];

        try {

            $registro = loginValidate($pdo);

            if ($registro !== false) {

                if (password_verify($pass, $registro['senha_hash'])) {

                    $_SESSION['user_id'] = $registro['id'];
                    $_SESSION['user_name'] = $user;
                    header("Location: ../index.php");
                    exit();
                } else {
                    header("Location: ../login.php");
                    exit();
                }
            } else {
                header("Location: ../login.php");
                exit();
            }
        } catch (PDOException $e) {
            error_log("Falha ao realizar consulta: " . $e->getMessage());
            header("Location: ../login.php");
            exit();
        }
    }
} else {

    header('Location: ../login.php');
    error_log("Método indevido");
}
