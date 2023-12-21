<?php
include("db.php");
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/air-datepicker.css">
</head>


<body class="bg-gradient-to-r from-grad_one from-0% to-grad_two to-94.79% font-Inter">

    <div
        class="container mx-auto pr-4 bg-gradient-to-r from-grad_one_rectangle from-0.8% to-grad_two_rectangle to-97.53% rounded-border_ret mb-5">
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

                        <a class="text-navbar hover:underline
                 underline-offset-8 decoration-1.5 
                 hover:text-white" href="./exit.php">Выход</a>

                    </div>

                </div>
            </header>
            <!-- End left Navbar -->

            <!-- Blocks -->
            <div class="container mx-auto grid rounded-border_ret bg-white my-4">
                <div class="bg-colors_left -ml-5.5rem rounded-border_ret row-start-1 
                    col-span-2">
                    <div class="flex ml-6 mt-6">
                        <!-- avatar -->
                        <img class="" src="./img/pic.svg" alt="">
                        <div class="text-center">
                            <p class="mt-2 ml-3 text-h1_color text-lg mr-3">
                                <?= $_SESSION['user']['name'] ?>
                            </p>
                            <span class="-ml-2 text-sm text-gray-500">студент</span>
                        </div>
                    </div>




                    <!-- Message -->
                    <div class="">
                        <h1 class="text-xl text-h1_color font-bold text-center mt-20 ">Сообщения</h1>
                    </div>
                    <div class="grid grid-rows-1 px-3 mt-12 gap-y-5">
                        <a href="./message.html"
                            class="w-85 h-15 rounded-border_ret bg-EAE0F5 text-white text-center hover:text-active hover:bg-active_mes active:bg-active_mes focus:outline-none focus:bg-active_mes hover:font-bold ">
                            <div class="flex justify-around mt-2">
                                <p class="ml-3 text-sm text-BEACD2">Карачаева Т.В.</p>
                                <p class="text-sm text-BEACD2">12:06</p>
                            </div>
                            <p class="text-12px text-white mt-2 mb-4">Перенос занятия на другое вр...</p>
                        </a>

                        <a href="./message.html"
                            class="w-85 h-15 rounded-border_ret bg-EAE0F5 text-white text-center hover:text-active hover:bg-active_mes active:bg-active_mes focus:outline-none focus:bg-active_mes hover:font-bold ">
                            <div class="flex justify-around mt-2">
                                <p class="ml-3 text-sm text-BEACD2">Карачаева Т.В.</p>
                                <p class="text-sm text-BEACD2">12:06</p>
                            </div>
                            <p class="text-12px text-white mt-2 mb-4">Перенос занятия на другое вр...</p>
                        </a>

                        <a href="./message.html"
                            class="w-85 h-15 rounded-border_ret bg-EAE0F5 text-white text-center hover:text-active hover:bg-active_mes active:bg-active_mes focus:outline-none focus:bg-active_mes hover:font-bold ">
                            <div class="flex justify-around mt-2">
                                <p class="ml-3 text-sm text-BEACD2">Карачаева Т.В.</p>
                                <p class="text-sm text-BEACD2">12:06</p>
                            </div>
                            <p class="text-12px text-white mt-2 mb-4">Перенос занятия на другое вр...</p>
                        </a>
                    </div>

                    <div class="flex justify-around mt-7">
                        <nav aria-label="Page navigation example">
                            <ul class="list-style-none flex">
                                <li>
                                    <a
                                        class="pointer-events-none relative block rounded-full bg-transparent px-3 py-1.5 text-sm text-D1408C transition-all duration-300 ">Назад</a>
                                </li>
                                <li>
                                    <a class="relative block rounded-full bg-transparent px-3 py-1.5 text-sm text-D1408C transition-all duration-300 hover:bg-active_mes"
                                        href="#!">1</a>
                                </li>
                                <li aria-current="page">
                                    <a class="relative block rounded-full bg-primary-100 px-3 py-1.5 text-sm font-medium text-primary-700 transition-all duration-300 text-BEACD2 focus:bg-active_mes"
                                        href="#!">2
                                        <span
                                            class="absolute -m-px h-px w-px overflow-hidden whitespace-nowrap border-0 p-0 [clip:rect(0,0,0,0)]">(current)</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="relative block rounded-full bg-transparent px-3 py-1.5 text-sm text-D1408C transition-all duration-300 hover:bg-active_mes"
                                        href="#!">3</a>
                                </li>
                                <li>
                                    <a class="relative block rounded-full bg-transparent px-3 py-1.5 text-sm text-D1408C transition-all duration-300 hover:bg-active_mes"
                                        href="#!">Следующая</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="flex justify-center items-center">

                        <a href="student-edit.php?id=<?= $row['id'] ?>"
                            class="mt-8 text-center text-D1408C underline">Редактировать</a>
                    </div>
                </div>

                <!-- Message -->

                <div class="bg-white rounded-border_ret row-start-1 col-span-2">
                    <div class="">

                        <h1 class="text-2xl text-h1_color font-bold text-center mt-6">Мои занятия</h1>
                        <div class="">
                            <div class="mb-3 ml-11 mt-10 flex justify-center">
                                <div class="relative mb-4 flex w-full flex-wrap">
                                    <input type="search"
                                        class="relative m-0 -mr-0.5 block min-w-0 flex-auto rounded-border_ret border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none "
                                        placeholder="Search" aria-label="Search" aria-describedby="button-addon1" />

                                    <!--Search button-->
                                    <button
                                        class="relative z-[2] ml-5 flex items-center rounded-border_ret bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                                        type="button" id="button-addon1" data-te-ripple-init
                                        data-te-ripple-color="light">
                                        <img src="./img/clip.svg" alt="">
                                    </button>
                                </div>
                            </div>

                            <div class="grid grid-rows-1  ml-8 mt-16">

                                <div class="overflow-auto h-2/4 scroll-smooth">

                                    <div class="w-104 h-35 rounded-border_f bg-F4F4FE text-center flex">
                                        <img class="mt-5 ml-3" src="./img/books.svg" alt="">
                                        <div class="text-D1408C text-center">
                                            <p class="text-D1408C text-2xl text-center mt-6">Программирование</p>
                                            <p class="text-D1408C text-sm text-center mt-3">Сидоров И.И</p>
                                            <div class="flex text-sm justify-around mt-2">
                                                <div class="mb-4">
                                                    <p>Пн</p>
                                                    <p>12:30</p>
                                                </div>

                                                <div class="">
                                                    <p>Ср</p>
                                                    <p>12:30</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-5 w-85 h-35 rounded-border_ret bg-F4F4FE text-center flex">
                                        <img class="mt-8 ml-8" src="./img/books.svg" alt="">
                                        <div class="text-D1408C text-center">
                                            <p class="text-D1408C text-2xl text-center mt-6">Программирование</p>
                                            <p class="text-D1408C text-sm text-center mt-3">Сидоров И.И</p>
                                            <div class="flex text-sm justify-around mt-2">
                                                <div class="mb-4">
                                                    <p>Пн</p>
                                                    <p>12:30</p>
                                                </div>

                                                <div class="">
                                                    <p>Ср</p>
                                                    <p>12:30</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-5 w-85 h-35 rounded-border_ret bg-F4F4FE text-center flex">
                                        <img class="mt-8 ml-8" src="./img/books.svg" alt="">
                                        <div class="text-D1408C text-center">
                                            <p class="text-D1408C text-2xl text-center mt-6">Программирование</p>
                                            <p class="text-D1408C text-sm text-center mt-3">Сидоров И.И</p>
                                            <div class="flex text-sm justify-around mt-2">
                                                <div class="mb-4">
                                                    <p>Пн</p>
                                                    <p>12:30</p>
                                                </div>

                                                <div class="">
                                                    <p>Ср</p>
                                                    <p>12:30</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-5 w-85 h-35 rounded-border_ret bg-F4F4FE text-center flex">
                                        <img class="mt-8 ml-8" src="./img/books.svg" alt="">
                                        <div class="text-D1408C text-center">
                                            <p class="text-D1408C text-2xl text-center mt-6">Программирование</p>
                                            <p class="text-D1408C text-sm text-center mt-3">Сидоров И.И</p>
                                            <div class="flex text-sm justify-around mt-2">
                                                <div class="mb-4">
                                                    <p>Пн</p>
                                                    <p>12:30</p>
                                                </div>

                                                <div class="">
                                                    <p>Ср</p>
                                                    <p>12:30</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-5 w-85 h-35 rounded-border_ret bg-F4F4FE text-center flex">
                                        <img class="mt-8 ml-8" src="./img/books.svg" alt="">
                                        <div class="text-D1408C text-center">
                                            <p class="text-D1408C text-2xl text-center mt-6">Программирование</p>
                                            <p class="text-D1408C text-sm text-center mt-3">Сидоров И.И</p>
                                            <div class="flex text-sm justify-around mt-2">
                                                <div class="mb-4">
                                                    <p>Пн</p>
                                                    <p>12:30</p>
                                                </div>

                                                <div class="">
                                                    <p>Ср</p>
                                                    <p>12:30</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-5 w-85 h-35 rounded-border_ret bg-F4F4FE text-center flex">
                                        <img class="mt-8 ml-8" src="./img/books.svg" alt="">
                                        <div class="text-D1408C text-center">
                                            <p class="text-D1408C text-2xl text-center mt-6">Программирование</p>
                                            <p class="text-D1408C text-sm text-center mt-3">Сидоров И.И</p>
                                            <div class="flex text-sm justify-around mt-2">
                                                <div class="mb-4">
                                                    <p>Пн</p>
                                                    <p>12:30</p>
                                                </div>

                                                <div class="">
                                                    <p>Ср</p>
                                                    <p>12:30</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>
    </div>

</body>

</html>