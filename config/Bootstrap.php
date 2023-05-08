<?php 


require_once 'autoload.php';

$database=new Database('127.0.0.1', "ombor", "root", "");
$pdo=$database->connect();
Sklad::$pdo=$pdo;
Category::$pdo=$pdo;
getAllTable::$pdo=$pdo;
User::$pdo=$pdo;
Product::$pdo=$pdo;