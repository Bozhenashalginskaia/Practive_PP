<?php
session_start();
//date_default_timezone_set('Europe/Moscow');
$from_id = $_SESSION['user']['id'];
$to_user = $_SESSION['sms']['id'];

require_once("db.php");

    if(!isset($_GET['action'])){

        $start = ($_GET['start']) ? $_GET['start'] :  0;
    $sql = ("SELECT * FROM messages INNER JOIN users on (messages.to_user=users.id) WHERE id_message > '$start' 
    and ( to_user='$to_user' and from_id='$from_id') 
    or ( from_id='$to_user' and to_user='$from_id')");
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    try {
        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);

    }
    catch (PDOException $e) {
        echo '<pre>'; print_r($sql); echo '</pre>';
        $this->error ($e->getMessage());
    }
} 

//Добавление сообщения
elseif($_GET['action'] == 'add_message') {

    $message = ($_POST['message']) ? $_POST['message'] : '';
    $from_id = ($_POST['from_id']) ? $_POST['from_id'] :'Имя не указано';
    $datetime = time();

    $sql = $pdo->prepare("INSERT INTO messages (id_message, message, datetime, from_id, to_user) VALUES (NULL, ?, ?, ?, ?)");
    $sql->bindParam(1, $message);
    $sql->bindParam(2, $datetime);
    $sql->bindParam(3, $from_id);
    $sql->bindParam(4, $to_user);
    try {
        $result = $sql->execute();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);

    }
    catch (PDOException $e) {
        echo '<pre>'; print_r($sql); echo '</pre>';
        $this->error($e->getMessage());
    }
}
?>