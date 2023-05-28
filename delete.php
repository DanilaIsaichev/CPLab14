<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    header('Content-type: text/html; charset=utf-8');
    echo "<h1>Удаление данных</h1>";
    $conn = require_once ('bd.php');
    $id = $_GET['id'];

    $sql = "SELECT MAX(id) AS `maxid` FROM `reviews`";
    $maxix = $conn -> query($sql) -> fetch(PDO::FETCH_OBJ) -> maxid;
    if ($id < $maxix)
    {
        $sql = "DELETE FROM `reviews` WHERE `id`='{$id}'";
        $conn -> query($sql);
        echo ("Удалено");
    }
    else{
        echo ("Не удалено");
    }
?>