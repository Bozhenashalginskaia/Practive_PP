<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Поиск</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
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

                 <div class="container bg-white rounded-border_ret my-4 ">
                    <div class="">
                        <div class="mb-3 mt-10 ">
                        <div class="search_box">
                             
                            <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                              <input
                                type="search"
                                name="search"
                                id="search"
                                autocomplete="off"
                                placeholder="Введите фамилию ..."
                                class="relative m-0 -mr-0.5 block min-w-0 flex-auto rounded-border_ret border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none "
                                aria-label="Search"
                                aria-describedby="button-addon1" />
                          
                              <!--Search button-->
                              <button
                              name="submit"
                                class="relative z-[2] ml-5 flex items-center rounded-border_ret bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                                type="button"
                                id="button-addon1"
                                data-te-ripple-init
                                data-te-ripple-color="light">
                               <img src="./img/clip.svg" alt="">
                              </button>
                           

                            

                        </div>
                            <!-- <div id="search_box-result"></div>
                            </div> -->
                          </div>
                    </div>
                    <div class="">
                        <h1 class="text-2xl text-h1_color font-bold text-center mt-12">Репетиторы</h1>
                    </div>
                    <div id="output">
                    <div class="mb-3
                            scrollbar-thin scrollbar-track-purple-200 scrollbar-thumb-dark-purple-400 scrollbar-hover-black
                            overflow-auto scrollbar scrollbar-corner-black h-full max-h-450 scroll-smooth focus:scroll-auto" >
                                
                    
                                
                                <?php
                                include("db.php");

                                $sql=$pdo->prepare("SELECT * FROM users inner join teacher_info on(users.id=teacher_info.id_teacher) WHERE role='teacher' LIMIT 100");
                                $sql->execute();
                                $result=$sql->fetchAll(PDO::FETCH_ASSOC);

                                foreach($result as $row){
                                    $teacher_name = $row['username'];
                                    $avatar = $row['avatar'];
                                    $id = $row['id'];
                                    $subject= $row['subject'];

                                    //$_SESSION['id'] = $id;

                                    echo '
                                    <div class="text-center mt-10 flex flex-col gap-x-15">
                                    <div class="mt-12 grid grid-rows-1 grid-flow-col justify-items-start ">
                                    <img width="65" height="65" class="rounded-full" src="'.$avatar.'" alt="">
                                    <div class="grid">
                                    <h2 class="text-lg text-focus">'.$teacher_name.'</h2>
                                    <span class="text-sm text-gray-500 ">'.$subject.'</span>
                                </div>
                                <div class="grid ">
                                <a href="./profile_teacher-public.php?Id='.$id.'" class="text-p_color_forms underline">посмотреть профиль</a>
                                </div>
                                </div>
                                </div>
                                    ';
                                }
                                ?>
                            
                  
                    
                    </div>
                </div>
                 </div>

                </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $("#search").keyup(function() {
                            var query = $(this).val();
                            if(query !=""){
                                $.ajax({
                                    url:'search-teacher.php',
                                    method: 'POST',
                                    data: {
                                        query:query
                                    },
                                    success:function(data) {
                                        $('#output').html(data);
                          // $('#output').css('display', 'block');

                            $("#search").focusout(function() {
                              // $('#output').css('display', 'none');
                            });
                            $("#search").focusin(function() {
                              //$('#output').css('display', 'block');
                                    });
                                }
                                });
                            } else {
                                //$('#output')
                            }
                        });
                    });
                </script>
           </body>
           </html>
        
        <!-- End left Navbar -->