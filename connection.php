<?php

$user = "root";
$password = "";

$connect = new PDO(
    "mysql:host=localhost;dbname=aula-gam3a;charset=utf8",
    $user,
    $password,
    );
    ob_start();
    session_start();
?>