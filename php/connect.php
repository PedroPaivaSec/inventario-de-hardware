<?php

$host = 'localhost';
$dbname = 'inventarioHardware';
$user = 'task';
$passwd = '';
$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

$dsn = "mysql:host=$host;dbname=$dbname";

try{

$pdo = new PDO($dsn, $user, $passwd, $options);

}catch(PDOException $e){

    error_log('Falha ao conectar ao banco: ' . $e->getMessage());
    die('Falha ao conectar ao banco.');
}