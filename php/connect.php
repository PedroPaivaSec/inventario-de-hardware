<?php

$host = 'localhost';
$dbname = 'inventarioHardware';
$user = 'root';
$passwd = '';

$dsn = "mysql:host=$host;dbname=$dbname";

try{

$pdo = new PDO($dsn, $user, $passwd);

}catch(PDOException $e){

    error_log('Falha ao conectar ao banco: ' . $e->getMessage());
    die('Falha ao conectar ao banco.');
}