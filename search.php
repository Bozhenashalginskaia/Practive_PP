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

     <!-- Color -->
    <div class="container mx-auto pr-4 bg-gradient-to-r from-grad_one_rectangle from-0.8% to-grad_two_rectangle to-97.53% rounded-border_ret mb-5 ">
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
                <a class="text-navbar hover:underline underline-offset-8 decoration-1.5 hover:text-white" href="./main.html">Главная</a>
                <a class="text-navbar hover:underline underline-offset-8 decoration-1.5 hover:text-white" href="./authorization.html">Личный кабинет</a>
                <a class="text-navbar hover:underline underline-offset-8 decoration-1.5 hover:text-white" href="./search.html">Поиск</a>
 
                </div>
                    <a class="text-navbar hover:underline underline-offset-8 decoration-1.5 hover:text-white" href="">Выход</a>
                </div>
                
                </div>
            </header>
            <!-- End left Navbar -->

                 <div class="container bg-white rounded-border_ret my-4 ">
                    <div class="">
                        <div class="mb-3 mt-10 ">
                            <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                              <input
                                type="search"
                                class="relative m-0 -mr-0.5 block min-w-0 flex-auto rounded-border_ret border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none "
                                placeholder="Search"
                                aria-label="Search"
                                aria-describedby="button-addon1" />
                          
                              <!--Search button-->
                              <button
                                class="relative z-[2] ml-5 flex items-center rounded-border_ret bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                                type="button"
                                id="button-addon1"
                                data-te-ripple-init
                                data-te-ripple-color="light">
                               <img src="./img/clip.svg" alt="">
                              </button>
                            </div>
                          </div>
                    </div>
                    <div class="">
                        <h1 class="text-2xl text-h1_color font-bold text-center mt-12">Репетиторы</h1>
                    </div>
                    <div class="overflow-auto h-2/4 grid">
                    <div class="mt-10 flex flex-col justify-items-start gap-x-10">
                                
                                <?php
                                include("db.php");

                                $sql=$pdo->prepare("SELECT * FROM users inner join teacher_info on(users.id=teacher_info.id_teacher) WHERE role='teacher'");
                                $sql->execute();
                                $result=$sql->fetchAll(PDO::FETCH_ASSOC);

                                foreach($result as $row){
                                    $username = $row['username'];
                                    $avatar = $row['avatar'];
                                    $id = $row['id'];
                                    $subject= $row['subject'];

                                    //$_SESSION['id'] = $id;

                                    echo '<div class="mt-12 grid grid-rows-1 grid-flow-col justify-items-start ">
                                    <img width="65" height="65" class="rounded-full" src="'.$avatar.'" alt="">
                                    <div class="flex flex-col">
                                    <h2 class="text-lg">'.$username.'</h2>
                                    <span class="text-sm text-center">'.$subject.'</span>
                                </div>
                                <a href="./profile_teacher.php?Id='.$id.'" class="text-p_color_forms underline">посмотреть профиль</a>
                                </div>
                                    ';
                                }
                                ?>
                            
                    </div>
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
        
        <!-- End left Navbar -->