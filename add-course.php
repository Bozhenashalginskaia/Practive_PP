<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
</head>

<body class="bg-gradient-to-r from-grad_one from-0% to-grad_two to-94.79% font-Inter">

     <!-- Color -->
    <div class="container mx-auto pr-4 bg-gradient-to-r from-grad_one_rectangle from-0.8% to-grad_two_rectangle to-97.53% rounded-border_ret mb-5 ">
        <!-- Color -->



        <div class="flex mt-20">
    <!-- Start left Navbar -->
    <header class="mr-12">
        <div class="flex flex-col">
            <div class="flex items-right  mb-25 -ml-4">
                <img class="mt-12" src="/img/logo_2.svg" alt="">
            </div>

            <div class="flex flex-col space-y-44 text-white mt-14 text-2xl mb-14">
                <div class="flex flex-col space-y-14 text-white mt-20 text-2xl">
                <a class="text-navbar hover:underline underline-offset-8 decoration-1.5 hover:text-white" href="./index.php">Главная</a>
                <a class="text-navbar hover:underline underline-offset-8 decoration-1.5 hover:text-white" href="./index.php">Личный кабинет</a>
                <a class="text-navbar hover:underline underline-offset-8 decoration-1.5 hover:text-white" href="./search.php">Поиск</a>
 
                </div>
                    <a class="text-navbar hover:underline underline-offset-8 decoration-1.5 hover:text-white" href="./exit.php">Выход</a>
                </div>
                
                </div>
            </header>
            <!-- End left Navbar -->
            <div class="container bg-white rounded-border_ret my-4 ">
                <div class="">
                    
                </div>
                <div class="">
                    <h1 class="text-2xl text-h1_color font-bold text-center mt-12">Редактирование</h1>
                </div>

                <div class="grid">
                    
                         <form action="./add.php" method="POST">
                         <input type="text" name="name" placeholder="Название курса" required>
                         <input type="text" name="count" placeholder="Индивидуальное/Групповое занятие" required>
                          <input type="time" name="time" placeholder="Время" required>
                          <input type="date" name="day" placeholder="День" required>
                          
                            <div class="flex items-center justify-center mt-24">
                     <input type="submit" name="update_teacher" class="text-center  text-white px-6 
                     py-3 bg-btn_color  rounded-border w-27 text-xl">
                            </div>
                       
</form>
                            </div>
                            </div>
                            </div>
                            </div>
                            
</body>
</html>