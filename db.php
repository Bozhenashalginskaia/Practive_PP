<?php

$dbname = "course_tutor";
$servername = "localhost";
$user = "root";
$password = "";

$dsn = "mysql:host=$servername;dbname=$dbname;charset=UTF8";

try {
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Подключение успешно";
} catch (PDOException $e) {
  echo "Ошибка соединения: ". $e->getMessage();
}

?>