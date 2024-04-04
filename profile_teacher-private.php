<?php
session_start();
$id_t=$_SESSION['user']['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">

</head>


<body class="bg-gradient-to-r from-grad_one from-0% to-grad_two to-94.79% font-Inter">

    <div class="container mx-auto pr-4 bg-gradient-to-r from-grad_one_rectangle from-0.8% to-grad_two_rectangle to-97.53% rounded-border_ret mb-5">
        <!-- Color -->



        <div class="flex mt-10">
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

        <!-- Данные из бд о репетиторе -->

              <div class="container mx-auto grid rounded-border_ret bg-white my-4">
                    <div class="bg-colors_left -ml-5.5rem rounded-border_ret row-start-1 
                    col-span-1">
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
                            $_SESSION['teacher'] = [
                            "id" => $row['id_teacher'],
                            "experience" =>$row['experience'],
                            "age" => $row['age'],
                            "choice" => $row['choice'],
                            "about" => $row['about'],
                            "practice" => $row['practice'],
                            "skills" => $row['skills'],
                            "subject" => $row['subject'],
                            ];
                   
                            
?>
                        <img class="rounded-full" src="<?=$_SESSION['user']['avatar']?>" width="145" height="145" alt="">
                        <div class="text-center">
                            <p class="mt-8 ml-3 text-h1_color text-lg mr-3 break-words">
                            <?= $_SESSION['user']['name']?>
                            </p>
                        <span class="text-sm text-gray-500"><?=$_SESSION['teacher']['subject']?></span>
                        </div>
                        </div>
                        <div class="text-text_color bold ml-8 mt-4">
                            <p>Стаж: <?=$row['experience']?></p>
                            <p>Возраст: <?=$row['age']?></p>
                            <p>Обучение: <?=$row['choice']?></p>
                            <a href="./edit.php?id=<?=$_SESSION['user']['id']?>"
                               class="mt-8 text-center text-D1408C text-12px font-normal hover:font-bold">Редактировать</a>
                        </div>
                        <div class="flex justify-center items-center mb-5">
                           
                          </div>
                    </div>
                    <?php    
                        }
                    }
                    ?>
                    <!-- Занятия -->
                    <div class="">
                        <h1 class="text-xl text-h1_color font-bold text-center mt-12">Занятия</h1>
                    </div>
                    <?php
                    require_once("db.php");
                    $query=$pdo->prepare("SELECT * FROM courses inner join teacher_info on(teacher_info.id_teacher = courses.id_teach) where id_teach='$id_t'");
                    $query->execute();
                    $result=$query->fetchAll(PDO::FETCH_ASSOC);

                    if($result){
                        foreach($result as $row){
                            $_SESSION['courses'] = [
                            "name_courses" => $row["name"],
                            "count" => $row["count"],
                            "time" => $row['time'],
                            "data" => $row["day"],
                            ];
                    ?>
                     <!-- <div class="
                            scrollbar-thin scrollbar-track-purple-200 scrollbar-thumb-dark-purple-400 scrollbar-hover-black
                            overflow-auto scrollbar scrollbar-corner-black h-full max-h-50 scroll-smooth focus:scroll-auto" > -->
                  <div class="grid grid-rows-1 px-3 mt-6 gap-y-5">
                            <div class="w-85 h-15 rounded-border_ret bg-EAE0F5 text-white text-center">
                                <div class="flex justify-around mt-2">
                                <p class="ml-3 text-sm text-BEACD2 font-bold"><?=$_SESSION['courses']['name_courses']?></p>
                            </div>
                            <p class="text-12px mt-2 mb-2 text-text_color"><?=$_SESSION['courses']['count']?></p>
                            <div class="flex justify-center mr-2">
                            <p class="text-12px mt-2 mb-5 text-text_color"><?=$_SESSION['courses']['time']?></p>
                            <p class="text-12px mt-2 mb-5 text-text_color"><?=$_SESSION['courses']['data']?></p>
                            </div>
                           
                            </div>
                            </div>
                     <!-- </div>    -->
<?php    
                        }
                    }
                    ?>

                      
                          <div class="flex justify-center items-center mb-5">
                            <a href="./add-course.php?id=<?=$_SESSION['user']['id']?>" class="mt-4 text-center  text-white px-10 
                          py-2 bg-btn_color  rounded-border  text-12px">Добавить занятие</a>
                          </div>
                         
                          <!-- Вывод заявок -->
                          <div class="">
                        <h1 class="text-xl text-h1_color font-bold text-center mt-12">Заявки</h1>
                    </div>

                    <?php
                    require_once("db.php");
                    $query=$pdo->prepare("SELECT * FROM requests inner join users on(requests.taker=users.id) where accept = 0 ");
                    $query->execute();

                    $result=$query->fetchAll(PDO::FETCH_ASSOC);

                    
                        foreach($result as $row){
                            $_SESSION['requests'] = [
                            "username" => $row["username"],
                            "id" => $row["taker"],
                            // добавить курс который он выбрал
                            ];

                            $course = $pdo->prepare("SELECT * FROM courses WHERE id_teach = $id_t limit 1");
                            $course->execute();
                            $res = $course->fetchAll(PDO::FETCH_ASSOC);

                                foreach($res as $info){ 
                                    $_SESSION["course"] = [
                                    "course_id" => $info['id_course'],
                                    "course_name" => $info['name'],
                                    ]

                    ?>
                  <div class="grid px-3 mt-6 gap-y-5">
                            <div class="w-85 h-15 mb-4 rounded-border_ret bg-EAE0F5 text-white text-center">
                                <div class=" justify-around mt-2">
                                <p class="ml-3 text-sm text-m745998 font-bold"><?=$_SESSION['course']['course_name']?></p>
                                <p class="ml-3 text-12px text-text_color"><?=$_SESSION['requests']['username']?></p>
                                <div class="flex justify-center gap-y-4 px-2">
                                <a href="profile_teacher.php?ok=<?=$_SESSION['requests']['id']?>" class="mt-4 mb-4 mr-4 text-center  text-white px-2 
                          py-1 bg-btn_color  rounded-border text-12px">Принять</a>
                                <a href="profile_teacher.php?no=<?=$_SESSION['requests']['id']?>" class="mt-4 mb-4  text-center  text-white px-2 
                          py-1 bg-btn_color  rounded-border text-12px">Отклонить</a>
                                </div>
                            </div>
                            
                            </div>
                            </div>

                         
<?php    
                          }
                        }
                    // echo $_SESSION['requests']['id'];
            
                    ?>

                </div>

                
                    <div class="bg-white rounded-border_ret row-start-1 col-span-2 ml-14">
                    

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
                                                        <div class="">

                        <h1 class="text-xl text-h1_color font-bold text-center mt-12">Сообщения</h1>
                        <div class="grid grid-rows-1 px-3 mt-12 gap-y-5">
                            <?php

                            include("db.php");
                            
                               
                               
                            $query=$pdo->prepare("SELECT DISTINCT from_id FROM messages WHERE to_user='$id_t'");
                            $query->execute();
                            
                            $data=$query->fetchAll(PDO::FETCH_ASSOC);

                            foreach($data as $user){
                                $from_id = $user['from_id'];
                            
                            
                                $sql= $pdo->prepare("SELECT * FROM users WHERE id='$from_id'");
                                $sql->execute();
                              
    
                                $result=$sql->fetchAll(PDO::FETCH_ASSOC);
    
                                if($result){
                                    foreach($result as $row){
                                        $_SESSION["teach"] = [
                                        "username" => $row["username"],
                                        "id" => $row["id"],
                                        "avatar" => $row["avatar"],
                                        ];
                            
                                        echo '<a href="./message.php?Id='.$_SESSION['teach']['id'].'" >
                                        <div class="rounded-border_ret bg-EAE0F5 text-white text-center hover:text-active hover:bg-active_mes active:bg-active_mes focus:outline-none focus:bg-active_mes hover:font-bold ">
                            
                            <p class="text-sm px-3 py-3 text-BEACD2 ">'.$_SESSION['teach']['username'].'</p>
                        
                       
                    </div>
                    </a>';
                       }
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
        </div>
    </body>
    </html>