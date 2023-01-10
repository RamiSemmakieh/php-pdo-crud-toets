<?php

require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
       
    } else {
        echo "Interne server-error";
    }
} catch (PDOException $e) {
    $e->getMessage();
}


$sql = "DELETE FROM dureauto
        WHERE Id = :Id;";
// we preparen de query zodat we de waarde van id kunnen koppelen ann placeholder : ID...
$statement = $pdo->prepare($sql);
//bind de value aan de placeholder
$statement->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);

$result = $statement->execute();

if ($result) {
    echo "The record is deleted";
    header('Refresh:1; read.php');
} else {
    echo "The record is not deleted";
}
