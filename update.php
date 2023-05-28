<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    header('Content-type: text/html; charset=utf-8');
    echo "<h1>Обновление данных</h1>";
    $conn = require_once ('bd.php');
    $id = $_GET['id'];
    $name = $_GET['name'];
    $email = $_GET['email'];
    $text = $_GET['text'];

    $sql = "SELECT MAX(id) AS `maxid` FROM `reviews`";
    $maxix = $conn -> query($sql) -> fetch(PDO::FETCH_OBJ) -> maxid;
    if ($id < $maxix)
    {
        $sql = "UPDATE `reviews` SET `name`='{$name}', `email`='{$email}', `text`='{$text}' WHERE `id`='{$id}';";
        $conn -> query($sql);
        echo ("Обновлено");
    }
    else{
        echo ("Не обновлено");
    }
?>