<?php
session_start();
require_once("db.php");
$id_course = $_GET['Id'];
$id_teacher = $_SESSION['courses']['id_teacher'];
$user=$_SESSION['user']['id'];
$accept = 0;


$sql = "INSERT INTO requests (id, sender, taker, accept, id_course) VALUES ( NULL, '$id_teacher', '$user', '$accept', '$id_course')";
$stmt = $pdo->prepare($sql);
$execute = $stmt->execute();
if ($execute) {
    header("Location: ./profile_teacher-public.php");
}

?>