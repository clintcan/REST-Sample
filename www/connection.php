<?php
include "connection.php";
// PDO connection
$dsn = "$driver:host=$host;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
]; // This one is optional
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

function GetDecideMethod($method='GET')
{
	if($_SERVER['REQUEST_METHOD'] !== $method){
		header('Content-Type: application/json');
		echo "{\"error\":\"Invalid method\"}";
		die();
	}
}