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

if (strlen($login) < 4) {
    echo "Логин должен содержать минимум 3 символа.";
    exit();
   }

   if (strlen($password) < 6) {
    $_SESSION['message'] = 'Пароль должен содержать минимум 6 символов.';
    exit();
   }
   $passwordRegex = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/';
   if (!preg_match($passwordRegex, $password)) {
    $_SESSION['message'] = 'Неправильный формат пароля';
    header('Location: ./registration.php');
    exit();
   }
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

        $pdo->beginTransaction();

    $sql = "INSERT INTO users (id, username, password, login, role, avatar) VALUES (NULL, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $password);
    $stmt->bindParam(3, $login);
    $stmt->bindParam(4, $role);
    $stmt->bindParam(5, $path);
    $sql_execute = $stmt->execute();

    $insertId = $pdo->lastInsertId();

    $teacher ="INSERT INTO teacher_info (id_teacher) VALUES (:id)";

    $st = $pdo->prepare($teacher);
    $st->bindParam(":id", $insertId, PDO::PARAM_INT);
    $execute = $st->execute();
    $pdo->commit();


    if($sql_execute){
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
        }
        }
    $_SESSION['message'] = "Вы успешно зарегистрировались";
    header ("Location: ./authorization.php");
    }
    else{
        $_SESSION['message'] = "Не добавлено";
        exit(0);
    }

    if ($role == 'teacher'){
    header("Location: ./info_profile-teacher.php");
    exit(0);
    } else {
    header ("Location: ./authorization.php");
    exit(0);
    }
}
}
catch (PDOException $e) {

    echo "Erorr" . $e->getMessage();
}
?>
