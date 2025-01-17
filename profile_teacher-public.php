<?php
session_start();
$id = $_GET["Id"];
$id_user=$_SESSION['user']['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.14/dist/tailwind.min.css" />
</head>

<body class="bg-gradient-to-r from-grad_one from-0% to-grad_two to-94.79% font-Inter">

     <!-- Color -->
    <div class="container mx-auto pr-4 bg-gradient-to-r from-grad_one_rectangle from-0.8% to-grad_two_rectangle to-97.53% rounded-border_ret mb-5 ">
        <!-- Color -->



        <div class="flex mt-16">
    <!-- Start left Navbar -->
    <header class="mr-12">
        <div class="flex flex-col">
            <div class="flex items-right  mb-25 -ml-4">
                <img class="mt-12" src="./img/logo_2.svg" alt="">
            </div>

            <div class="flex flex-col space-y-44 text-white mt-8 text-2xl mb-10">
                <div class="flex flex-col space-y-14 text-white mt-12 text-2xl">
                <a class="text-navbar hover:underline underline-offset-8 decoration-1.5 hover:text-white" href="./index.php">Главная</a>
                <a class="text-navbar hover:underline underline-offset-8 decoration-1.5 hover:text-white" href="./index.php">Личный кабинет</a>
                <a class="text-navbar hover:underline underline-offset-8 decoration-1.5 hover:text-white" href="./search.php">Поиск</a>
                </div>
                    <a class="text-navbar hover:underline underline-offset-8 decoration-1.5 hover:text-white" href="./exit.php">Выход</a>
                </div>
                
                </div>
        </header>
        <!-- End left Navbar -->

        

              <div class="container grid rounded-border_ret bg-white my-4">
                    <div class="bg-colors_left -ml-5.5rem rounded-border_ret row-start-1 
                    col-span-3">
                    <div class="flex flex-col">
                    <div class="flex ml-6 mt-6">
                        <!-- Данные репетитора -->
                    <?php
                    include('db.php');
                    $query = "SELECT * FROM users inner join teacher_info on(users.id=teacher_info.id_teacher) where id_teacher='$id'";
                    
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();

                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if($result){
                        foreach($result as $row){
                            $_SESSION['teacher'] = [
                            "ava_teacher" => $row["avatar"],
                            "name_teacher" => $row["username"],
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
                        <img class="rounded-full" src="<?=$_SESSION['teacher']['ava_teacher']?>" width="145" height="145" alt="">
                        <div class="text-center">
                            <p class="mt-8 ml-3 text-h1_color text-lg mr-3">
                            <?=$_SESSION['teacher']['name_teacher']?>
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
                    <?php    
                        }
                    }
                    ?>
                    <!-- Данные репетитора -->
 
                    <div class="">
                        <h1 class="text-xl text-h1_color font-bold text-center mt-12">Занятия</h1>
                    </div>

                    <!-- Занятия -->
                    
                            <?php
                    require_once("db.php");
                    $query=$pdo->prepare("SELECT * FROM courses inner join teacher_info on(teacher_info.id_teacher = courses.id_teach) where id_teach='$id'");
                    $query->execute();
                    $result=$query->fetchAll(PDO::FETCH_ASSOC);

                    if($result){
                        foreach($result as $row){
                            $_SESSION['courses'] = [
                            "name_courses" => $row["name"],
                            "count" => $row["count"],
                            "time" => $row['time'],
                            "data" => $row["day"],
                            "id_course" => $row["id_course"],
                            "id_teacher" => $row["id_teacher"],
                            ];
                    ?>
                    <div class="">
                        <!-- Add overflow -->
                  <div class="grid grid-rows-1 px-3 mt-6 gap-y-5">
                            <div class="w-82 h-15 rounded-border_ret bg-EAE0F5 text-white text-center">
                                <div class="flex justify-around mt-2">
                                <p class="ml-3 text-sm text-BEACD2 font-bold"><?=$_SESSION['courses']['name_courses']?></p>
                            </div>
                            <p class="text-12px mt-2 mb-2 text-text_color"><?=$_SESSION['courses']['count']?></p>
                            <div class="flex justify-center mr-2">
                            <p class="text-12px mt-2 mb-5 text-text_color"><?=$_SESSION['courses']['time']?></p>
                            <p class="text-12px mt-2 mb-5 text-text_color"><?=$_SESSION['courses']['data']?></p>
                            </div>



                            
                            <a id="openModal" href="./application.php?Id=<?=$_SESSION['courses']['id_course']?>" class="w-6 h-6 bg-BEACD2 rounded-xl float-right -mt-16 mr-8 hover:bg-purple-500 focus:bg-purple-900"></a>
                            
               
                        
                     
                        </div>
                            </div>
                    </div>
                    <div id="modal" class=" fixed h-screen w-full  left-0 top-0 flex justify-center items-center bg-opacity-50 hidden">
                    

           
              <!-- modal -->
              <div class=" bg-purple-900 bg-opacity-50 text-white rounded-border_f shadow-lg w-10/12 md:w-1/3">
                <!-- modal header -->
                <div class="rounded-border_f border-b px-4 py-2 flex flex-col justify-between items-center bg-purple-600 bg-opacity-25">
                  <h3 class="mt-10 font-semibold text-2xl px-10 break-words">Ваша заявка отправлена!</h3>
                  <!-- <button class="text-white close-modal">&cross;</button> -->
                
                <!-- modal body -->
                <div class="p-3 text-12px text-center mt-3 px-3 py-3">
                    ожидайте одобрение репетитора, занятие появится в личном кабинете</div>
                <div class="flex justify-center items-center w-100  p-3">
                  <a href="./" id="closeModal" class="bg-purple-500 bg-opacity-75 hover:bg-purple-700 px-3 py-1 rounded-border_f text-white mr-1 close-modal">
                  Okay</a>
                 
                </div>
              </div>
            </div>
            </div>
            
    
  
                         
<?php    
                        }
                    }
                    ?>
                         

                    </div>
                    <div class="bg-white rounded-border_ret row-start-1 col-span-1 ml-14">
                    

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

                
                                                       
                                                        <div class="flex justify-center text-center mt-10">
                                                        <?php

include("db.php");

                    // $query = $pdo->prepare("SELECT * FROM teacher_info ");
    

echo '  <button type="submit" name="submit" class="text-center  text-white px-6 
py-3 bg-btn_color  rounded-border w-27 text-sm">
<a href="./message.php?Id='.$_SESSION['courses']['id_teacher'].'" >Написать репетитору
</a></button>
                     ';

?>
                                                             </div>
                                                        <div class="flex justify-center text-center mt-10">
                                                        <a class="text-center text-p_color_forms underline" href="./search.php">Вернуться к поиску</a>
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
        <script>
            const openModalButton = document.getElementById("openModal");
const closeModalButton = document.getElementById("closeModal");
const modal = document.getElementById("modal");

openModalButton.addEventListener("click", (event) => {
    event.preventDefault();
    modal.classList.remove("hidden");
});

closeModalButton.addEventListener("click", () => {
    
    modal.classList.add("hidden");
});

document.addEventListener("click", (event) => {
    if (event.target === modal) {
        modal.classList.add("hidden");
    }
});
        </script>
    </body>
    </html>