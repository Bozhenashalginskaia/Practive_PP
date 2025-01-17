<?php
session_start();
require_once("db.php");
$id = $_SESSION['user']['id'];

$name = $_POST["name"];
$avatar = $_POST["avatar"];

$subject = $_POST["subject"];
$expe = $_POST["experience"];
$age = $_POST["age"];
$choice = $_POST["choice"];
$about = $_POST["about"];
$practice = $_POST["practice"];
$skills = $_POST["skills"];
try {

    $path = 'photo/' . time() .$_FILES['avatar']['name'];
    if(!move_uploaded_file($_FILES['avatar']['tmp_name'], './' . $path)){
        $_SESSION['message'] = 'Ошибка при загрузке сообщения';
        header('Location: ./registration.php');
    }
    
    $query = "UPDATE users SET username=:username, avatar=:avatar where id='$id'";
    $stmt= $pdo->prepare($query);
    $stmt->bindParam(":username", $name);
    $stmt->bindParam(":avatar", $avatar);
    $query_execute = $stmt->execute();

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
       
        header ("Location: ./index.php");
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