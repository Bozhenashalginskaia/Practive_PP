<?php
session_start();
require_once("db.php");
$id = $_SESSION['user']['id'];
$subject = $_POST["subject"];
$expe = $_POST["experience"];
$age = $_POST["age"];
$choice = $_POST["choice"];
$about = $_POST["about"];
$practice = $_POST["practice"];
$skills = $_POST["skills"];

try {
    //$statement = $pdo->prepare("SELECT id FROM users");
    //$statement->execute();
    //$id = $pdo->lastInsertId();




   $sql = "UPDATE teacher_info SET experience=:experience, age=:age, choice=:choice, about=:about, practice=:practice, skills=:skills, subject=:subject 
  where id_teacher='$id'";
   $stmt = $pdo ->prepare($sql);
   //$stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->bindParam(":experience", $expe);
    $stmt->bindParam(":age", $age);
    $stmt->bindParam(":choice", $choice);
    $stmt->bindParam(":about", $about);
    $stmt->bindParam(":practice", $practice);
    $stmt->bindParam(":skills", $skills);
    $stmt->bindParam(":subject", $subject);
    $sql_execute = $stmt->execute();

    if($sql_execute){
        $_SESSION['message'] = "Вы успешно зарегистрировались";
        header ("Location: ./authorization.php");
        exit(0);
        }
        else{
            $_SESSION['message'] = "Не добавлено";
            exit(0);
        }

} catch (Exception $e) {
    echo "". $e->getMessage() ."";
}
?>