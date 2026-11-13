<?php

$host = 'localhost';
$dbname = 'inventariohardware';
$user = 'task';
$passwd = '';
$options = [
//Especifica para a função fetch/fetchAll o retorno de apenas os nomes das colunas, sem os indices. Evita duplicidade de retorno de dados
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC  
];

$dsn = "mysql:host=$host;dbname=$dbname";

try {

    $pdo = new PDO($dsn, $user, $passwd, $options);
} catch (PDOException $e) {

    error_log('Falha ao conectar ao banco: ' . $e->getMessage());
    die('Falha ao conectar ao banco.');
}
