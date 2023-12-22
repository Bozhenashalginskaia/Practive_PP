<?php
session_start();
// echo $_SESSION['user']['id'];
if (!empty($_SESSION['user']['id'])) {
    include ('./personal_account.php');
} else {


echo <<<HTML

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
</head>

<body class="bg-gradient-to-r from-grad_one from-0% to-grad_two to-94.79%">

    <!-- Logo -->
    <div class="flex items-center justify-center mt-8 mb-3">
        <img src="./img/logo.svg" alt="">
    </div>
    <!-- Logo -->

    <!-- Color -->
    <div
        class="container mx-auto bg-gradient-to-r from-grad_one_rectangle from-0.8% to-grad_two_rectangle to-97.53% rounded-border_ret">
        <!-- Color -->

        <!-- Start header -->
        <header class="container mx-auto font-Inter">
            <div class="flex justify-center">
                <div class="space-x-20 text-white mt-20 text-2xl">
                    <a class="hover:underline underline-offset-8 decoration-1.5" href="main.php">Главная</a>
                    <a class="hover:underline underline-offset-8 decoration-1.5" href="authorization.php">Личный
                        кабинет</a>
                    <a class="hover:underline underline-offset-8 decoration-1.5" href="search.php">Поиск</a>
                </div>
            </div>
        </header>
        <!-- End header -->

        <!-- Start main -->
        <div class="container mx-auto mt-20 grid grid-rows-1 grid-flow-col gap-x-4 justify-items-center">
            <div>
                <img src="./img/education.svg" alt="">
            </div>
            <div class="w-3/4 -mt-5">
                <div class="">
                    <p class="mt-3 whitespace-normal font-Inter text-white text-3xl text-center leading-extra-loose">
                        Находите, задавайте вопросы получайте новые знания
                        от профессионалов</p>
                </div>
                <div class="flex justify-center text-center mt-6">
                    <!-- Button -->
                    <a href="" class="text-center  text-white px-6 font-Inter
                      py-3 bg-btn_color  rounded-border w-27 text-2xl hover:bg-btn_hover">Найти</a>
                    <!-- Button -->
                </div>
            </div>
        </div>
        <div class="grid grid-rows-1 grid-flow-col justify-items-center">
            <div class="ml-16">
                <img class="w-64 h-17 mt-8" src="./img/sky_small.svg" alt="">
            </div>
            <div class="ml-3">
                <img class="w-129 h-36" src="./img/sky_big.svg" alt="">
            </div>
        </div>
        <!-- End main -->

    </div>

    <!-- <footer class="flex justify-between px-24 bg-footer_color text-white mt-24">
<div class="mt-3 flex flex-col">
    Язык
    <div class="">English</div>
<div class="">Русский</div>
</div>

<div class="flex items-center justify-center">Сервис создан с помощью...</div>
</footer> -->
</body>

</html>

HTML;}
?>