<?php

function loginValidate(PDO $pdo, string $user)
{
    $query = "SELECT id, senha_hash FROM usuarios WHERE BINARY usuario = :nome";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':nome' => $user
    ]);
    $registro = $stmt->fetch(PDO::FETCH_ASSOC);
    return $registro;
}
