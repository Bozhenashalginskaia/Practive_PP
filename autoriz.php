<?php
session_start();

include("db.php");

$password = $_POST['password'];
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
    // $_SESSION['role'] = $user['role'];
    // $_SESSION['id'] = $user['id'];
    $_SESSION['message'] = 'okay';
    header('Location: ./index.php');
    // exit(0);
   
     }  } else {
    header('Location: ./autorization.php');
}
}
catch(PDOException $e){
    echo $e->getMessage();
}
 
// if($sql_execute) {
//         header('Location: ./personal_account.php');
//         exit(0);  
// } else {
//     $_SESSION['message'] = "No autorization";
//             header('Location: ./autorization.php');
//             exit(0);
// }

?>
