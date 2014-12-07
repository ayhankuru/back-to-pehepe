<?php

$dsn = 'mysql:host=localhost;dbname=haber';
$user = 'root';
$password = '';
 
try {
    $pdo = new PDO($dsn, $user, $password); 
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>