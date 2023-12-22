<?php
date_default_timezone_set('Europe/Moscow');
//$user = $_SESSION['id'];

include("db.php");

    if(!isset($_GET['action'])){

        $start = ($_GET['start']) ? $_GET['start'] :  0;
    $sql = ("SELECT * FROM messages INNER JOIN users on (messages.from_id=users.username) WHERE id > $start LIMIT 100");


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

//add message
elseif($_GET['action'] == 'add_message') {

    $message = ($_POST['message']) ? $_POST['message'] :'';
    $username = ($_POST['username']) ? $_POST['username'] :'Имя не указано';
    $datetime = time();

    $sql = "INSERT INTO messages (message, from_id, datetime) VALUES ('$message', '$from_id', '$datetime')";

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