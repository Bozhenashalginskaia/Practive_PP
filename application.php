<?php
session_start();
require_once("db.php");
$id_teacher = $_GET['Id'];
$user=$_SESSION['user']['id'];
$accept = 0;


$sql = "INSERT INTO requests (sender, taker, accept) VALUES ( ?, ?, ?) LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(1, $id_teacher);
$stmt->bindParam(2, $user);
$stmt->bindParam(3, $accept);
$execute = $stmt->execute();
if ($execute) {
    header("Location: ./");
}

?>