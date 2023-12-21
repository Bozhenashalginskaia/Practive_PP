<?php
session_start();
require_once("db.php");

if(isset($_POST['update_teacher'])) {
    $teacher_id = $_POST['teacher_id'];
    // $name =  $_SESSION['name'];
    // $login =  $_SESSION['login'];
    // $avatar =  $_SESSION['avatar'];
    $expe =  $_POST['expe'];
    $age =  $_POST['age'];
    $choice =  $_POST['choice'];
    $about =  $_POST['about'];
    $practice =  $_POST['practice'];
    $skills =  $_POST['skills'];
    $subject =  $_POST['subject'];
}

try {
    $sql = "INSERT INTO teacher_info (id, experience, age, choice, about, practice, skills) VALUES (NULL, ?,?,?,?,?,?)";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(1, $expe);
    $statement->bindParam(2, $age);
    $statement->bindParam(3, $choice);
    $statement->bindParam(4, $about);
    $statement->bindParam(5, $practice);
    $statement->bindParam(6, $skills);
    $statement->bindParam(7, $subject);
    $sql_execute = $statement->execute();

    if($sql_execute)
    {
        $_SESSION['message'] = "Updated Successfully";
        header("Location: ./profile_teacher.php");
        exit(0);
    }
    else
    {
       
    $query = "UPDATE teacher_info SET experience=:experience, age=:age, choice=:choice,
    about=:about, practice=:practice, skills=:skills, subject=:subject WHERE id=:teacher_id LIMIT 1";
    $stmt = $pdo ->prepare($query);
    $stmt -> bindParam(':experience', $expe);
    $stmt -> bindParam(':age', $age);
    $stmt -> bindParam(':choice', $choice);
    $stmt -> bindParam(':about', $about);
    $stmt -> bindParam(':practice', $practice);
    $stmt -> bindParam(':skills', $skills);
    $stmt -> bindParam(':subject', $subject);
    $stmt -> bindParam(':teacher_id', $teacher_id);
    $query_execute = $stmt -> execute();


   
    if($query_execute)
    {
        $_SESSION['message'] = "Updated Successfully";
        header("Location: ./profile_teacher.php");
        exit(0);
    }
    else
    {
        $_SESSION["message"] = "Not Updated";
        header("Location: ./edit.php");
        exit(0);
    }
}

} catch (PDOException $e) {
    echo $e->getMessage();
}

$sql = $pdo->prepare("SELECT * FROM teacher_info WHERE experience=:experience, age=:age, choice=:choice,
about=:about, practice=:practice, skills=:skills, subject=:subject WHERE id=:teacher_id LIMIT 1");

    $sql -> bindValue(':experience', $expe);
    $sql -> bindValue(':age', $age);
    $sql -> bindValue(':choice', $choice);
    $sql -> bindValue(':about', $about);
    $sql -> bindValue(':practice', $practice);
    $sql -> bindValue(':skills', $skills);
    $sql -> bindValue(':subject', $subject);
    $sql -> bindValue(':teacher_id', $teacher_id, PDO::PARAM_INT);
    $sql_execute = $sql->execute();

if($teacher = $sql->fetchAll(PDO::FETCH_ASSOC)){

    $_SESSION['teacher'] = [
        "id" => $teacher['id'],
        "experience" => $teacher['experience'],
        "age" => $teacher['age'],
        "choice" => $teacher['choice'],
        "about" => $teacher['about'],
        "practice" => $teacher['practice'],
        "skills" => $teacher['skills'],
        "subject" => $teacher['subject'],
        "teacher_id" => $teacher['teacher_id'],
    ];

}


?>