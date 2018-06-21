<?php
session_start();

global $pdo;

try{
    $pdo= new PDO("mysql:dbname=classificados;host=localhost", "root", "$50Eseis$");

}catch(PDOException $e){
    echo "Erro: ".$e->getMessage();
    exit;
}