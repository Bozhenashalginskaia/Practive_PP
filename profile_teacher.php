<?php
session_start();
$id_t= $_GET['Id'];
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
        
        <div class="container mx-auto pr-4 bg-gradient-to-r from-grad_one_rectangle from-0.8% to-grad_two_rectangle to-97.53% rounded-border_ret mb-5">
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
                <a class="text-navbar hover:underline underline-offset-8 decoration-1.5 hover:text-white" href="./index.php">Главная</a>
                <a class="text-navbar hover:underline underline-offset-8 decoration-1.5 hover:text-white" href="./index.php">Личный кабинет</a>
                <a class="text-navbar hover:underline underline-offset-8 decoration-1.5 hover:text-white" href="./search.php">Поиск</a>
 
            </div>
            <a class="text-navbar hover:underline
                 underline-offset-8 decoration-1.5 
                 hover:text-white" href="./exit.php">Выход</a> </div>
            
            </div>
        </header>
        <!-- End left Navbar -->

        <!-- <div class="container mx-auto bg-gradient-to-r from-colors_left from-10% to-white to-90% rounded-border_ret my-4">
            <div class="flex flex-1">
                <p class="pr-6">Text</p>
                <div
                  class="inline-block h-[250px] min-h-[1em] w-0.5 self-stretch bg-black opacity-100 dark:opacity-50"></div>
                <p class="pl-6">Text</p>
              </div> -->

              <div class="container mx-auto grid rounded-border_ret bg-white my-4">
                    <div class="bg-colors_left -ml-5.5rem rounded-border_ret row-start-1 
                    col-span-3">
                    <div class="flex flex-col">
                    <div class="flex ml-6 mt-6">
                    <?php
                    include('db.php');
                    $query = "SELECT * FROM teacher_info where id_teacher='$id_t'";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();

                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if($result){
                        foreach($result as $row){
                            // $_SESSION['teacher'] = [
                            // "id" => $row['id'],
                            // "experience" =>$row['experience'],
                            // "age" => $row['age'],
                            // "choice" => $row['choice'],
                            // "about" => $row['about'],
                            // "practice" => $row['practice'],
                            // "skills" => $row['skills'],
                            // "subject" => $row['subject'],
                            // ];
                            
?>
                        <img class="rounded-full" src="<?=$_SESSION['user']['avatar']?>" width="145" height="145" alt="">
                        <div class="text-center">
                            <p class="mt-8 ml-3 text-h1_color text-lg mr-3">
                            <?= $_SESSION['user']['name']?>
                            </p>
                        <span class="text-sm text-gray-500"><?=$_SESSION['teacher']['subject']?></span>
                        </div>
                        </div>
                        <div class="text-text_color bold ml-8 mt-4">
                            <p>Стаж: <?=$row['experience']?></p>
                            <p>Возраст: <?=$row['age']?></p>
                            <p>Обучение: <?=$row['choice']?></p>
                        </div>
                    </div>
 
                    <div class="">
                        <h1 class="text-xl text-h1_color font-bold text-center mt-12">Занятия</h1>
                    </div>
                        <div class="grid grid-rows-1 px-3 mt-6 gap-y-5">

                            <div class="w-85 h-15 rounded-border_ret bg-EAE0F5 text-white text-center">
                                <div class="flex justify-around mt-2">
                                <p class="ml-3 text-sm text-BEACD2 font-bold">Индивидуальные занятия</p>
                            </div>
                            <p class="text-12px mt-2 mb-5 text-text_color">Информатика 7-9 классы</p>
                            <div class="w-6 h-6 bg-BEACD2 rounded-xl float-right -mt-12 mr-4"></div>
                            </div>
                           
                            <div class="w-85 h-15 rounded-border_ret bg-EAE0F5 text-white text-center">
                                <div class="flex justify-around mt-2">
                                <p class="ml-3 text-sm text-BEACD2 font-bold">Индивидуальные занятия</p>
                            </div>
                            <p class="text-12px mt-2 mb-5 text-text_color bold">Информатика 7-9 классы</p>
                            <div class="w-6 h-6 bg-BEACD2 rounded-xl float-right -mt-12 mr-4"></div>
                            </div>

                            <div class="w-85 h-15 rounded-border_ret bg-EAE0F5 text-white text-center">
                                <div class="flex justify-around mt-2">
                                <p class="ml-3 mb-2 text-sm text-BEACD2 font-bold">Индивидуальные занятия</p>
                            </div>
                            <p class="text-12px mt-2 mb-5 text-text_color bold">Информатика 7-9 классы</p>
                            <div class="w-6 h-6 bg-BEACD2 rounded-xl float-right -mt-12 mr-4"></div>
                            </div>
                    </div>


                    
                          <div class="flex justify-center items-center mb-5">
                            <a href="./edit.php<?=$_SESSION['user']['id']?>" class="mt-8 text-center text-D1408C underline">Редактировать</a>
                          </div>
<?php    
                        }
                    }
                    ?>

                  

                </div>

                
                    <div class="bg-white rounded-border_ret row-start-1 col-span-1 ml-14">
                    
                    <form action="">

                    <div class="">
                        <h1 class="text-2xl text-h1_color font-bold text-center mt-16">О себе</h1>
                        <p class="text-h1_color mt-6 text-base text-center"><?=$_SESSION['teacher']['about']?></p>
                                </div>

                                <div class="">
                                    <h1 class="text-2xl text-h1_color font-bold text-center mt-16">Опыт</h1>
                                    <p class="text-h1_color mt-6 text-base text-center"><?=$_SESSION['teacher']['practice']?></p>
                                            </div>

                                            <div class="">
                                                <h1 class="text-2xl text-h1_color font-bold text-center mt-16">Компетенции</h1>
                                                <p class="text-h1_color mt-6 text-base text-center"><?=$_SESSION['teacher']['skills']?></p>
                                                        </div>

                    </form>
                                                        <div class="flex justify-center text-center mt-10">
                                                        <a class="text-center text-p_color_forms underline" href="./search.html">Вернуться к поиску</a>
                                                        </div>
                            </div>

                         
                            
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- <div class="flex">
            <div class=""><img class="-ml-5.5rem  h-300" src="./img/ret.svg" alt=""></div>
                <div class=""><h1 class="text-2xl text-h1_color font-bold text-center">Мои занятия</h1>
                </div> -->
                </div>
                    <div class="">
                
            </div>
            </div>
                
                </div>
        </div>
<!--  
        <footer class="flex justify-between px-24 bg-footer_color text-white mt-24">
            <div class="mt-3 flex flex-col">
                Язык
                <div class="">English</div>
            <div class="">Русский</div>
            </div>
            
            <div class="flex items-center justify-center">Сервис создан с помощью...</div>
            </footer> -->

    </body>
    </html>