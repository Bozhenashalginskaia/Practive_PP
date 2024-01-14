<?php
include("db.php");
 $id_from = $_SESSION['user']['id'];
 //$user =$_SESSION['teach']['id_to'];
 //print_r($user);
  if(  $_SESSION['user']['role'] !== "student"){ 
    header("Location: ./profile_teacher-private.php"); }
    
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
                        <img src="<?= $_SESSION['user']['avatar'] ?>" width="65" height="65" class="rounded-full" alt="avatar">
                        <div class="text-center">
                        <p class="mt-2 ml-3 text-h1_color text-lg mr-3">
                            <?= $_SESSION['user']['name']?>
                        </p>
                        
                        <span class="mt-2 ml-3 text-sm mr-3 text-gray-500 ">студент</span>
                        </div>
                    </div>

                 
                
                       
                       <!-- Message -->
                    <div class="">
                        <h1 class="text-xl text-h1_color font-bold text-center mt-20 ">Сообщения</h1>
                    </div>
                  
                            <?php

                            include("db.php");
                            
                                 //pages
                                 $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                 $limit = 2;
                                 $offset = ($page - 1) * $limit;
                                 $stmt = $pdo->prepare("SELECT COUNT(*) FROM messages where from_id='$id_from'");
                                 $stmt->execute();
                                 $total_pages = $stmt->fetchColumn();
                                 $total = round($total_pages / $limit, 0);
                                 //print_r($total);
                                 //pages
                               
                            $query=$pdo->prepare("SELECT DISTINCT to_user FROM messages WHERE from_id='$id_from'");
                            $query->execute();
                            
                            $data=$query->fetchAll(PDO::FETCH_ASSOC);

                            foreach($data as $user){
                                $to_id = $user['to_user'];
                            
                            
                                $sql= $pdo->prepare("SELECT * FROM users WHERE id='$to_id' LIMIT $limit OFFSET $offset");
                                $sql->execute();
                              
    
                                $result=$sql->fetchAll(PDO::FETCH_ASSOC);
    
                                if($result){
                                    foreach($result as $row){
                                        $_SESSION["teach"] = [
                                        "username" => $row["username"],
                                        "id" => $row["id"],
                                        "avatar" => $row["avatar"],
                                        ];
                            
                            echo '<div class="w-45 h-15 rounded-border_ret bg-EAE0F5 text-white text-center hover:text-active hover:bg-active_mes active:bg-active_mes focus:outline-none focus:bg-active_mes hover:font-bold ">
                            <a href="./message.php?Id='.$_SESSION['teach']['id'].'" 
                            class="w-85 h-15 rounded-border_ret bg-EAE0F5 text-white text-center hover:text-active
                             hover:bg-active_mes active:bg-active_mes focus:outline-none focus:bg-active_mes hover:font-bold ">
                            <div class="flex justify-around mt-2">
                            <p class="ml-3 text-sm text-BEACD2">'.$_SESSION['teach']['username'].'</p>
                        </div>
                       
                    </div>
                    </a>';
                       }
                              }
                            }
                            //пагинация
                            include('pagination.php');
                            ?>

                </div>

                <!-- Message -->
                
                    <div class="bg-white rounded-border_ret row-start-1 col-span-2 h-full">
                    <div class="">
                        
                        <h1 class="text-2xl text-h1_color font-bold text-center mt-6">Мои занятия</h1>
                        <div class="">
                        <div class="mb-3 ml-11 mt-10 flex justify-center">
                            
                            <div class="overflow-auto scrollbar scrollbar-corner-black h-full max-h-450 scroll-smooth focus:scroll-auto" >
                                <!-- max height 350px -->
                                
                            <?php
                            require_once("db.php");

                            $sql= $pdo->prepare("SELECT * FROM courses_status inner join courses 
                            on(courses_status.id_course=courses.id_course) where id_student = '$id_from'");
                            $sql->execute();
                            $data=$sql->fetchAll(PDO::FETCH_ASSOC);

                            foreach($data as $user){
                              $_SESSION ["data_course"] = [
                                  "name_course"=> $user["name"],
                                  "count" => $user["count"],
                                  "time" => $user["time"],
                                  "id_teacher" => $user["id_teacher"],
                                  
                              ];

                              $query =$pdo->prepare("SELECT * FROM courses_status inner join users on (courses_status.id_teacher=users.id)");
                              $query->execute();
                              $result=$query->fetchAll(PDO::FETCH_ASSOC);

                              foreach($result as $row){
                                $_SESSION["teacher_course"] = [
                                  "username_teacher" => $row["username"],
                                ];
                           
                                
                            ?>
                                    
                            <div class="mb-5 w-104 h-35 rounded-border_f bg-F4F4FE text-center flex">
                                <img class="mt-3 ml-3" src="./img/books.svg" alt="">
                                <div class="text-D1408C text-center">
                                    <p class="text-D1408C text-2xl text-center mt-6"><?=$_SESSION['data_course']['name_course']?></p>
                                    <p class="text-D1408C text-sm text-center mt-3"><?=$_SESSION['teacher_course']['username_teacher']?></p>
                                    <div class="flex text-sm justify-around mt-2">
                                        <div class="mb-4">
                                            <p>Время</p>
                                            <p><?=$_SESSION['data_course']['time']?></p>
                                        </div>
                                        
                                        <!-- <div class="">
                                            <p>Ср</p>
                                            <p>12:30</p>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                          }
                          
                            ?>
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
        <script>
  
        </script>
    </body>
    </html>