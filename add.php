<?php
session_start();
require_once("db.php");

$id = $_SESSION['user']['id'];
$name = $_POST["name"];
$count = $_POST["count"];
$time = $_POST["time"];
$day = $_POST["day"];

try {

    $sql = $pdo->prepare("INSERT INTO courses (id_course, name, count, time, id_teach, day) 
    VALUES (NULL, :name, :count, :time, '$id', :day)");
    $sql->bindParam(":name", $name);
    $sql->bindParam(":count", $count);
    $sql->bindParam(":time", $time);
    $sql->bindParam(":day", $day);
    $sql_execute = $sql->execute();

    if($sql_execute){
       
        header ("Location: ./index.php");
        exit(0);
        }
        else{
            $_SESSION['message'] = "Не добавлено";
            exit(0);
        }


}catch(Exception $e){
    echo "Error:". $e->getMessage();
}
?>