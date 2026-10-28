<?php

require_once __DIR__ . "/connect.php";

try {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (!empty($_POST['username']) && !empty($_POST['password'])) {

            $query = "SELECT usuario, senha_hash FROM usuarios WHERE usuario = :nome";
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                ':nome' => $_POST['username']
            ]);
            $registro = $stmt->fetch();

            if ($registro !== false) {

            }else {
                header("Location: ../login.php");
                exit();
            }
        }
    }
} catch (PDOException $e) {

    error_log("Falha ao realizar consulta: " . $e->getMessage());
    header("Location: ../login.php");
    exit();
}
