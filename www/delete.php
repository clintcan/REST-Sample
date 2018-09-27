<?php
include "connection.php";

GetDecideMethod("DELETE");

$id = (int) $_GET['id'];
$sql = "DELETE FROM `books` WHERE id = ?";

$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header('Content-Type: application/json');
echo "{\"result\":\"success\"}";