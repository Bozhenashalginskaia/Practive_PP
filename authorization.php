<?php
session_start();
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

    <div class="flex items-center justify-center mt-8 mb-3">
        <img src="./img/logo.svg" alt="">
    </div>
    <div
        class="container mx-auto bg-gradient-to-r from-grad_one_rectangle from-0.8% to-grad_two_rectangle to-97.53% rounded-border_ret">
        <!-- Start header -->
        <header class="">
            <div class="flex justify-center">
                <div class="space-x-20 text-white mt-20 text-2xl">
                    <a class="hover:underline underline-offset-8 decoration-1.5" href="./index.php">Главная</a>
                    <a class="hover:underline underline-offset-8 decoration-1.5" href="./">Личный
                        кабинет</a>
                    <a class="hover:underline underline-offset-8 decoration-1.5" href="./search.php">Поиск</a>
                </div>
            </div>
        </header>

        <!-- Start main regist_form -->
        <h1 class="text-4xl text-white text-center mt-12">Вход</h1>
        <div class="w-122 flex justify-center items-center  rounded-border_forms mt-8">
            <!-- Start form -->
            <form action="./login.php" method="POST" class="mt-4 bg-forms rounded-border_forms px-32 pt-6 pb-8 mb-4"
                >
                <?php
                          if (isset($_SESSION['message'])) {
                              echo '<p class="text-center text-h1_color font-bold mt-7 rounded-input_forms
                               px-3 py-2 border-white border"> ' . $_SESSION['message'] . ' </p>';
                             }
                              unset($_SESSION['message']);
                            ?>
                <label class="">
                    <input placeholder="Логин" type="text" name="login"
                        class="rounded-input_forms placeholder-white focus:placeholder-place_color placeholder-text-3xl mt-10 px-3 py-2 bg-input_forms border shadow-sm border-input_forms focus:outline-none focus:border-input_forms focus:ring-input_forms block w-full sm:text-sm focus:ring-1" />
                </label>

                <label class="">
                    <input placeholder="Пароль" type="password" name="password"
                        class="mt-7 rounded-input_forms placeholder-white focus:placeholder-place_color text-3xl px-3 py-2 bg-input_forms border shadow-sm border-input_forms focus:outline-none focus:border-input_forms focus:ring-input_forms block w-full  sm:text-sm focus:ring-1" />
                </label>

                <div class="flex justify-center text-center mt-10">
                    <!-- Button -->
                    <input type="submit" name="submit" class="text-center  text-white px-6 
                          py-3 bg-btn_color  rounded-border w-27 text-xl" placeholder="Войти">
                    <!-- Button -->
                </div>

                <div class="flex mt-6 mb-4">
                    <p class="text-place_color">Нет профиля?</p><a class="italic text-p_color_forms underline"
                        href="./registration.php">Зарегистрируйтесь</a>
                </div>



            </form>
            <!-- End form -->
        </div>
        <div class="grid grid-rows-1 grid-flow-col justify-items-center -mt-9">
            <div class="ml-16">
                <img class="w-64 h-17 mt-8" src="./img/sky_small.svg" alt="">
            </div>
            <div class="ml-3">
                <img class="w-129 h-36" src="./img/sky_big.svg" alt="">
            </div>
        </div>
    </div>
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