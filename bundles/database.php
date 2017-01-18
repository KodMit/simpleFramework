<?php
$dbUser = "root";
$dbPass = "";
$dbHost = "localhost";
$dbName = "framework";
try {
    $bdd = new PDO('mysql:host='.$dbHost.';dbname='.$dbName, $dbUser, $dbPass);
} catch (PDOException $e) {
    print $e->getMessage();
    die();
}

