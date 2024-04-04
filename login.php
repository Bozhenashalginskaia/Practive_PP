<?php
session_start();

include("db.php");

$password = md5($_POST['password']);
$login = $_POST['login'];


try{
$sql = $pdo->prepare("SELECT * FROM users WHERE `password`=:password and `login`=:login");

$sql->bindParam(':password', $password);
$sql->bindParam(':login', $login);
 $sql->execute();
 $sql_execute=$sql->fetchAll(PDO::FETCH_ASSOC);
if($sql_execute){
foreach($sql_execute as $user){
    $_SESSION['user'] = [
        "id" => $user['id'],
        "name" => $user['username'],
        "avatar" => $user['avatar'],
        "login" => $user['login'],
        "role" => $user['role']
    ];
    $pass = $user['password'];
    if($pass == $password){ header('Location: ./index.php');}
    else{ 
        header('Location: ./authorization.php');
        $_SESSION['message'] = "Неправильный логин или пароль";
        exit(0);}
   
     }  } else {
    header('Location: ./authorization.php');
    $_SESSION['message'] = "Неправильный логин или пароль";
    exit(0);
}
}
catch(PDOException $e){
    echo $e->getMessage();
}

?>
