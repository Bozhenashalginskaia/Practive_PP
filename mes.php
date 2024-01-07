<?php
date_default_timezone_set('Europe/Moscow');
$user = $_SESSION['id'];

include("db.php");

    if(!isset($_GET['action'])){

        $start = ($_GET['start']) ? $_GET['start'] :  0;
    $sql = ("SELECT * FROM messages INNER JOIN users on (messages.to_user=users.id) WHERE id_message > '$start' and ( to_user='$to_user' and from_id='$from_id') 
    or ( from_id='$to_user' and to_user='$from_id')");

    // $sql = "SELECT * from message inner join users on (users.Id=message.id_Fr)where 
    // Id_sms>'$start' and( (id_Fr='$Idfr' and  Id_Us='$id_us') or (Id_Us='$Idfr'and id_Fr='$id_us')) ";

    


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