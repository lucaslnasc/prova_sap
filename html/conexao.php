<?php

$dsn = 'mysql:dbname=sap;hosto=127.0.0.1;port=3307';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    //throw new MyDatabaseException( $Exception->getMessage( ) , (int)$Exception->getCode( ) );
}
?>