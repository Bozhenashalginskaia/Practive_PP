<?php
session_start();
require_once("db.php");

if(isset($_POST['query'])) {
    $query = $pdo->prepare("SELECT * FROM users inner join teacher_info on (users.id=teacher_info.id_teacher) Where username LIKE '{$_POST['query']}%' and role='teacher' LIMIT 100");

    $execute = $query->execute();
    $result=$query->fetchAll(PDO::FETCH_ASSOC);

    foreach($result as $row) {
        $name =$row["username"];
        $avatar = $row["avatar"];
        $subject = $row["subject"];
        $id = $row['id'];
        echo '<div class="overflow-auto h-full max-h-450 scroll-smooth focus:scroll-auto">
        <div class="mt-10 flex flex-col justify-items-start gap-x-10">
        <div class="mt-12 grid grid-rows-1 grid-flow-col justify-items-start ">
                                    <img width="65" height="65" class="rounded-full" src="'.$avatar.'" alt="">
                                    <div class="flex flex-col">
                                    <h2 class="text-lg">'.$name.'</h2>
                                    <span class="text-sm text-center">'.$subject.'</span>
                                </div>
                                <a href="./profile_teacher-public.php?Id='.$id.'" class="text-p_color_forms underline">посмотреть профиль</a>
                                </div>
                                </div>
                                </div>
                                    ';
    }
} else {
    echo "<p style='color:red'>User not found...</p>";
}
?>
