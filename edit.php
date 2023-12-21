<?php
session_start();
include("db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
</head>

<body class="bg-gradient-to-r from-grad_one from-0% to-grad_two to-94.79% font-Inter">

    <!-- Color -->
    <div
        class="container mx-auto pr-4 bg-gradient-to-r from-grad_one_rectangle from-0.8% to-grad_two_rectangle to-97.53% rounded-border_ret mb-5 ">
        <!-- Color -->



        <div class="flex mt-20">
            <!-- Start left Navbar -->
            <header class="mr-12">
                <div class="flex flex-col">
                    <div class="flex items-right  mb-25 -ml-4">
                        <img class="mt-12" src="./img/logo_2.svg" alt="">
                    </div>

                    <div class="flex flex-col space-y-44 text-white mt-14 text-2xl mb-14">
                        <div class="flex flex-col space-y-14 text-white mt-20 text-2xl">
                            <a class="text-navbar hover:underline underline-offset-8 decoration-1.5 hover:text-white"
                                href="./main.html">Главная</a>
                            <a class="text-navbar hover:underline underline-offset-8 decoration-1.5 hover:text-white"
                                href="./authorization.html">Личный кабинет</a>
                            <a class="text-navbar hover:underline underline-offset-8 decoration-1.5 hover:text-white"
                                href="./search.html">Поиск</a>

                        </div>
                        <a class="text-navbar hover:underline underline-offset-8 decoration-1.5 hover:text-white"
                            href="">Выход</a>
                    </div>

                </div>
            </header>
            <!-- End left Navbar -->

            <div class="container bg-white rounded-border_ret my-4 ">

                <div class="">
                    <h1 class="text-2xl text-h1_color font-bold text-center mt-12">Редактирование</h1>
                </div>
                <?php
                //присутствует ли id 
                if (isset($_GET['id'])) {

                    $teacher_id = $_GET['id'];

                    $query = "SELECT * FROM users WHERE id=? and role='teacher' LIMIT 1";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindParam(1, $teacher_id, PDO::PARAM_INT);
                    $stmt->execute();

                    $users = $stmt->fetch(PDO::FETCH_ASSOC);

                    $sql = "SELECT * FROM teacher_info WHERE id=? LIMIT 1";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(1, $teacher_id, PDO::PARAM_INT);
                    $stmt->execute();

                    $data = $stmt->fetch(PDO::FETCH_ASSOC);

                    ?>



                    <form action="./edit_teacher.php" method="POST">
                        <div class="mt-10 grid col-span-2">
                            <div class="">
                                <input type="text" name="teacher_id" value="<?=$users['id'] ?>">
                                <label>ФИО</label>
                                <input type="text" name="name" value="<?=$_SESSION['user']['name']; ?>">
                            </div>
                            <!-- <div class="">
                                    <label>Логин</label>
                                    <input type="text" name="login" value="<?=$_SESSION['user']['login']; ?>" >
                                </div> -->
                            <div class="">
                                <label>Фото</label>
                                <input type="file" name="avatar" value="<?=$_SESSION['user']['avatar']; ?>">
                            </div>
                            <div class="">
                                <label>Стаж</label>
                                <input type="text" name="expe" value="<?=$data['experience'] ?>">
                            </div>
                            <div class="">
                                <label>Возраст</label>
                                <input type="text" name="age" value="<?=$data['age'] ?>">
                            </div>
                            <div class="">
                                <label>Обучение</label>
                                <input type="text" name="choice" value="<?=$data['choice'] ?>">
                            </div>
                            <div class="">
                                <label>О себе</label>
                                <input type="text" name="about" value="<?= $data['about'] ?>">
                            </div>
                            <div class="">
                                <label>Опыт</label>
                                <input type="text" name="practice" value="<?= $data['practice'] ?>">
                            </div>
                            <div class="">
                                <label>Компетенции</label>
                                <input type="text" name="skills" value="<?= $data['skills'] ?>">
                            </div>
                            <div class="">
                                <label>Предмет</label>
                                <input type="text" name="subject" value="<?= $data['subject'] ?>">
                            </div>
                            <div class="">
                                <!-- Button -->
                                <button type="submit" name="update_teacher" class="text-center  text-white px-6 
                          py-3 bg-btn_color  rounded-border w-27 text-lg">Сохранить</button>
                                <!-- Button -->

                            </div>
                        </div>
                    </form>
                    <?php
                } else {
                    echo "<h5>No ID Found</h5>";
                }
                ?>

            </div>
        </div>

    </div>
    </div>
</body>

</html>