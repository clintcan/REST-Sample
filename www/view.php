<?php
include "connection.php";

GetDecideMethod("GET");

$sql = "SELECT * FROM `books` LIMIT :page,100"; // get 100 records at a time

if(!isset($_GET['page'])){
	$page = 1;
} else {
	$page = (int) $_GET['page'];

}
$page = $page - 1;

$stmt = $pdo->prepare($sql);
$stmt->execute(["page" => $page]);

$rows = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
	$rows []= $row;
}

$results = ["result" => $rows];

$jsonrows = json_encode($rows);

header('Content-Type: application/json');
echo $jsonrows;
