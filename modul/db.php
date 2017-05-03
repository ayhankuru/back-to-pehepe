<?php

$dsn = 'mysql:host='.host.';dbname='.dbname.';charset=utf8'; 
$pdo;
 
try {
    $pdo = new PDO($dsn, user, password); 
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>