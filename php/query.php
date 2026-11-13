<?php

function loginValidate(PDO $pdo, string $user)
{
    $query = "SELECT id, senha_hash FROM usuarios WHERE BINARY usuario = :nome";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':nome' => $user
    ]);
    $registro = $stmt->fetch();
    return $registro;
}

function adicionarEquipamento(PDO $pdo, string $cliente, string $imagem, string $equipamento, string $problema): void
{
    $query = "INSERT INTO equipamentos (cliente, imagem, equipamento, problema) VALUES (:cliente, :imagem, :equipamento, :problema)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        ':cliente' => $cliente,
        ':imagem' => $imagem,
        ':equipamento' => $equipamento,
        ':problema' => $problema
    ]);
}

function listarEquipamentos(PDO $pdo): array
{
    $query = "SELECT cliente, imagem, equipamento, problema FROM equipamentos";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $equip = $stmt->fetchAll();
    return $equip;
}