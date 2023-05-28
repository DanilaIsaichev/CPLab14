<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    header('Content-type: text/html; charset=utf-8');
    echo "<h1>Извлечение данных</h1>";
    $conn = require_once ('bd.php');
    
    $q = 'MAX(`id`)';

    $sql = "SELECT {$q} FROM `reviews`;";
    $result = $conn -> query($sql) -> fetch(PDO::FETCH_OBJ);

    $id = $_GET['id'] ?? $result -> $q;

    $sql = "SELECT `text` FROM `reviews` WHERE `id`='{$id}'";
    $result = $conn -> query($sql) -> fetch(PDO::FETCH_OBJ);
    echo ($result->text);
?>