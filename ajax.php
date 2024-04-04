<?php
session_start();
require_once("db.php");

$to_user = $_SESSION['teacher_id_sms'];
$from_id = $_SESSION['user']['id'];


 if(!isset($_GET['action'])) {


    $start = ($_GET['start']) ? $_GET['start'] : 0;
    $sql = ("SELECT * FROM messages INNER JOIN users on (messages.to_user=users.id) WHERE id_message > '$start' and ((to_user='$to_user' and from_id='$from_id') 
    or (from_id='$to_user' and to_user='$from_id'))"); 
    
 try {
     
     $result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
     header('Content-Type: application/json; charset=utf-8');
     echo json_encode($result);

 }
 catch (PDOException $e) {
     echo '<pre>'; print_r($sql); echo '</pre>';
     $this->error ($e->getMessage());
 }
}

 elseif($_GET['action'] == 'add_message') {

    $message = ($_POST['message']) ? $_POST['message'] : '';
    $from_id = ($_POST['from_id']) ? $_POST['from_id'] :'Имя не указано';
    $datetime = time();

    $sql = "INSERT INTO messages (message, datetime, from_id, to_user) VALUES ( '$message', '$datetime', '$from_id', '$to_user')";

    try {
        $result = $pdo->exec($sql);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);

    }
    catch (PDOException $e) {
        echo '<pre>'; print_r($sql); echo '</pre>';
        $this->error($e->getMessage());
    }
}
?>