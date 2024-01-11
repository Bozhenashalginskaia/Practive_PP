<?php
session_start();
$id_course = $_SESSION['course']['course_id'];

require_once("db.php");
        if ($_GET["ok"]){
            //$pdo->beginTransaction();
            $id = $_GET["ok"];
            $query = $pdo->prepare("UPDATE requests SET accept = 1 WHERE taker='$id'");
            $execute=$query->execute();

            //$insertId = $pdo->lastInsertId();

            $teacher ="INSERT INTO courses_status (id, id_course, id_student) VALUES (NULL, :id_course, :id)";

            $st = $pdo->prepare($teacher);
            $st->bindParam(":id_course", $id_course, PDO::PARAM_INT);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $execute = $st->execute();
            echo "Успешно";
        }else if ($_GET["no"]){
            $id = $_GET["no"];
            $query = $pdo->prepare("DELETE FROM requests WHERE id =$id");
            $execute=$query->execute();
            echo "Заявка удалена";
        }   
         
        ?>