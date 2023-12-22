<?php
require_once("db.php");
session_start();

$name = $_POST["name"];
$login = $_POST["login"];
$password = $_POST["password"];
$repeatpassword = $_POST["repeatpassword"]; 
$role = $_POST["role"];

$_SESSION["name"] = $name;


$_SESSION["role"] = $role;

// if(!preg_match("/^[a-zA-Z0-9]+$/",$login))
// {
//     $_SESSION['message'] = "Логин может состоять только из букв английского алфавита и цифр";
// }

// if(strlen($login) < 3 or strlen($login) > 30)
// {
//     $_SESSION['message'] = "Логин должен быть не меньше 3-х символов и не больше 30";
// }

if ($password !== $repeatpassword) {
    $_SESSION['message'] = 'Пароли не совпадают';
    header('Location: ./registration.php');
    } else {

        $password = md5($password);
        //$password = password_hash($password,  PASSWORD_DEFAULT);


        $path = 'photo/' . time() .$_FILES['avatar']['name'];
        if(!move_uploaded_file($_FILES['avatar']['tmp_name'], './' . $path)){
            $_SESSION['message'] = 'Ошибка при загрузке сообщения';
            header('Location: ./registration.php');
        }
    }

    if ($role == 1) {
        $role = 'teacher';
    } else {
        $role = 'student';
    }

try {

    $statement = $pdo->prepare("SELECT * FROM users WHERE login=:login LIMIT 1");
    $statement->bindParam(':login', $login, PDO::PARAM_STR);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    
    if($result) {
        $_SESSION['message'] = 'Такой пользователь уже существует';
        header('Location: ./registration.php');
    } else {

    $sql = "INSERT INTO users (id, username, password, login, role, avatar) VALUES (NULL, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $password);
    $stmt->bindParam(3, $login);
    $stmt->bindParam(4, $role);
    $stmt->bindParam(5, $path);
    $sql_execute = $stmt->execute();

if($sql_execute){
    $_SESSION['message'] = "Вы успешно зарегистрировались";
    header ("Location: ./authorization.php");
    exit(0);
} else{
    $_SESSION['message'] = "Не добавлено";
    exit(0);
}
}
}
catch (PDOException $e) {

    echo "Erorr" . $e->getMessage();
}
?>
