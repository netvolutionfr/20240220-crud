<?php
$db_name = '20240220-crud';
$db_user = 'root';
$db_pass = '';
$db_host = 'localhost';

try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}
