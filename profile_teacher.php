<?php
session_start();


require_once("db.php");
        if ($_GET["ok"]){
           //$pdo->beginTransaction();
           $id = $_GET["ok"];
           $id_course = $_SESSION['course']['course_id'];
           $id_teacher = $_SESSION['user']['id'];
           $query = $pdo->prepare("UPDATE requests SET accept = 1 WHERE taker='$id'");
           $execute=$query->execute();

           //$insertId = $pdo->lastInsertId();

           $teacher ="INSERT INTO courses_status (id, id_course, id_student, id_teacher) VALUES (NULL, :id_course, :id, :id_teacher)";

           $st = $pdo->prepare($teacher);
           $st->bindParam(":id_course", $id_course, PDO::PARAM_INT);
           $st->bindParam(":id", $id, PDO::PARAM_INT);
           $st->bindParam(":id_teacher", $id_teacher, PDO::PARAM_INT);
           $execute = $st->execute();
           header("Location: ./profile_teacher-private.php");
           
        }else if ($_GET["no"]){

            $id = $_GET["no"];
            $query = $pdo->prepare("DELETE FROM requests WHERE taker =$id");
            $query->execute();
            // $execute=$query->execute();

            header("Location: ./profile_teacher-private.php");



           
        }   
         
        ?>