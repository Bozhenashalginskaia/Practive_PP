<?php
session_start();
$from_id = $_SESSION['user']['id'];
$users =$_SESSION['sms']['id'];
//print_r($users);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <title>Сообщения</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
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
                <a class="text-navbar hover:underline underline-offset-8 decoration-1.5 hover:text-white" href="./exit.php">Выход</a>
            </div>

            </div>
        </header>
        <!-- End left Navbar -->

        <!-- Blocks -->
              <div class="container mx-auto grid rounded-border_ret bg-white my-4">
                    <div class="bg-colors_left -ml-5.5rem rounded-border_ret row-start-1 
                    col-span-2 ">
                    <div class="flex ml-6 mt-6">
                    <img src="<?= $_SESSION['user']['avatar'] ?>" width="65" height="65" class="rounded-full" alt="avatar">
                        <div class="text-center">
                        <p class="mt-2 ml-3 text-h1_color text-lg mr-3">
                        <?= $_SESSION['user']['name']?>
                        </p>
                        <span class="-ml-2 text-sm text-gray-500">студент</span>
                        </div>
                    </div>

                 
                        <div class="grid grid-rows-3 px-3 mt-12 gap-y-5">
                            <?php

                            include("db.php");

                           // $sql=$pdo->prepare("SELECT DISTINCT to_user FROM messages inner join users on(users.id = messages.to_user) WHERE from_id='$id_from'");
                            $query=$pdo->prepare("SELECT DISTINCT to_user FROM messages WHERE from_id='$from_id'");
                            $query->execute();
                            
                            $data=$query->fetchAll(PDO::FETCH_ASSOC);

                            foreach($data as $user){
                                $to_user = $user['to_user'];
                            

                            $sql= $pdo->prepare("SELECT * FROM users WHERE id='$to_user'");
                            $sql->execute();

                            $result=$sql->fetchAll(PDO::FETCH_ASSOC);

                            foreach($result as $row){
                                $_SESSION['sms'] = [
                                    "username" => $row["username"],
                                   "id" => $row["id"],
                              
                                ];
                            //     foreach($result as $row){
                            //  $username = $row['username'];
                            //     $avatar = $row['avatar'];
                            //     $id = $row['id'];

                                //$_SESSION['id'] = $id
                           
                            echo '<div class="w-85 h-15 rounded-border_ret bg-EAE0F5 text-white text-center hover:text-active hover:bg-active_mes active:bg-active_mes focus:outline-none focus:bg-active_mes hover:font-bold ">
                            <div class="flex justify-around mt-2">
                            <p class="ml-3 text-sm text-BEACD2">'.$_SESSION['sms']['username'].'</p>

                           
                        </div>
                    </div>';
                                }
                            }
                            
                        
                            ?>
                <!--  <img class="ml-3 rounded-full" width="20" height="20" src='.$_SESSION['sms']['avatar'].' -->

            <div class="flex items-center justify-center mt-7 mb-3">
                <a href="./index.php"><img class="active:mr-3 hover:mr-2" src="./img/arrow_back.svg" alt=""></a>
            </div>

                        
            </div>

                   
                </div>

                <!-- Message -->
                
                    <div class=" bg-white rounded-border_ret row-start-1 col-span-4">
                        <div class="">
                        <div class="overflow-auto mt-4 flex justify-center items-center ml-8 py-2 rounded-border_ret bg-EAE0F5 text-white text-center">
                            <div class="flex justify-center mt-2">
                            <p class="ml-3 text-xl text-message text-center"><?=$_SESSION['sms']['username']?></p>
                        </div>
                    </div>
                        </div>
                        <!-- Вывод сообщений -->
                        <div class="mt-16 ml-6 messages-wrap overflow-y-auto h-2/4">
                       
                        </div>
                         <!--Вывод сообщений -->

                            <div class="">
                                <form id="chat-click" action="">
                                <div class=" ml-8 mb-3 mt-10 ">
                            <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                              <input
                               id = "message_text"
                                type="text"
                                class="relative m-0 -mr-0.5 block min-w-0 flex-auto rounded-border_ret border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[rgb(64, 27, 113)] focus:outline-none "
                                placeholder="Печатать..."
                                aria-label="Search"
                                aria-describedby="button-addon1" />
                          <!-- focus class input shadow поменять цвет -->
                              <!--button-->
                              <button
                                class="relative z-[2] ml-5 flex items-center rounded-border_ret bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                                type="button"
                                id="button-addon1"
                                data-te-ripple-init
                                data-te-ripple-color="light">
                               <img src="./img/icon-message.svg" alt="">
                              </button>
                            </div>
                          </div>
                            </form>
                            </div>
                                
                    
                </div>
            </div>
                        </div>
            </div>  
                </div>
        </div>

        <script>
            $(document).ready(function() {

                let start = 0;

                setInterval(loadMessages, 1000);

                function loadMessages() {
          
                $.ajax({

                    url: "ajax.php?start=" +start,
                    dataType: 'json',
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log(XMLHttpRequest);
                    }
                })
                .done(function(data) {
                    //console.log(data);
                    data.forEach(item => {
                        $(".messages-wrap").append(renderMessage(item));
                        start = item.id_message;
                        console.log(start);
                    })
                });   
                console.log('обновлено...');         
            }
            });

            function renderMessage(item){
               let params=(new URL(document.location)).searchParams;
                let from_id=params.get("from_id");


              if(item.from_id == from_id) {

                    return `
            <h1 class="px-8 mt-4 text-left text-gray-500 text-xs">${item.datetime}</h1>
        <div class="w-3/4 mt-1 ml-6 py-13 rounded-border_ret bg-F4F4FE text-left flex">
        <h1 class="px-8 py-4 text-left text-message text-sm">${item.message}</h1>
                            </div>
                `;
           }
        else {
           return `<div class="float-right w-3/4 mt-5 rounded-border_ret bg-F4F4FE text-right flex -mr-14">
                <h1 class="px-8 py-4 text-right text-message text-sm">${item.message}</h1>
                </div>`;
            
            
       }
    }

            // добавление сообщения в БД
    $('#chat-click').submit(function(e){
        let params=(new URL(document.location)).searchParams;
        let from_id=params.get("from_id");
        $.post("ajax.php?action=add_message", {
        //текст сообщения введенного в input
            message: $('#message_text').val(),
            from_id: from_id
            //айди пользователя 
        }).done(function(data) {$('#message_text').val('')});

        return false;
    })   

        </script>
        </body>
    </html>