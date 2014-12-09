<?php

$dsn = 'mysql:host=localhost;dbname=haber;charset=utf8';
$user = 'root';
$password = '';
 
try {
    $pdo = new PDO($dsn, $user, $password); 
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>