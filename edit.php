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
                <img class="mt-12" src="./img/logo_2.svg" alt="">
            </div>

        
            </header>
            <!-- End left Navbar -->
            <div class="container bg-white rounded-border_ret my-4 ">
                <div class="">
                    
                </div>
                <div class="">
                    <h1 class="text-2xl text-h1_color font-bold text-center mt-12">Редактирование</h1>
                </div>

                
                
                    
                         <form action="./edit_teacher.php" method="POST">
                         
                         <div class="grid mb-5">
                         <div class="grid grid-cols-2 gap-x-7 gap-y-7 mt-9 mb-15">
    
                         <div class="relative h-11 w-full min-w-[200px]">
                                    <input 
                                    type="text"
                                    name="name"
                                      placeholder="ФИО"
                                      required
                                      class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-focus outline outline-0 transition-all placeholder-shown:border-focus
                                       focus:border-focus focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" />
                                    <label
                                      class="after:content[' '] pointer-events-none absolute left-0  -top-2.5 flex h-full w-full select-none !overflow-visible truncate text-sm font-normal leading-tight text-focus transition-all after:absolute after:-bottom-2.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-focus after:transition-transform after:duration-300 peer-placeholder-shown:leading-tight peer-placeholder-shown:text-focus peer-focus:text-sm peer-focus:leading-tight peer-focus:text-focus peer-focus:after:scale-x-100 peer-focus:after:border-focus peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                      ФИО
                                    </label>
                         </div>

                         <div class="relative h-11 w-full min-w-[200px]">
                         <label for="upload-photo" class="flex h-full w-full select-none !overflow-visible truncate text-sm font-normal leading-tight text-focus transition-all after:absolute after:-bottom-2.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-focus after:transition-transform after:duration-300 peer-placeholder-shown:leading-tight peer-placeholder-shown:text-focus peer-focus:text-sm peer-focus:leading-tight peer-focus:text-focus peer-focus:after:scale-x-100 peer-focus:after:border-focus peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                            Загрузить фото</label>
                            <input type="file" hidden name="avatar" required id="upload-photo"/>
                         </div>

                         <div class="relative h-11 w-full min-w-[200px]">
                                    <input 
                                    type="text"
                                    name="subject"
                                      placeholder="Предмет"
                                      required
                                      class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-focus outline outline-0 transition-all placeholder-shown:border-focus
                                       focus:border-focus focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" />
                                    <label
                                      class="after:content[' '] pointer-events-none absolute left-0  -top-2.5 flex h-full w-full select-none !overflow-visible truncate text-sm font-normal leading-tight text-focus transition-all after:absolute after:-bottom-2.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-focus after:transition-transform after:duration-300 peer-placeholder-shown:leading-tight peer-placeholder-shown:text-focus peer-focus:text-sm peer-focus:leading-tight peer-focus:text-focus peer-focus:after:scale-x-100 peer-focus:after:border-focus peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                      Предмет
                                    </label>
                         </div>

                         <div class="relative h-11 w-full min-w-[200px]">
                                    <input 
                                    type="text"
                                    name="experience"
                                      placeholder="Стаж"
                                      required
                                      class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-focus outline outline-0 transition-all placeholder-shown:border-focus
                                       focus:border-focus focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" />
                                    <label
                                      class="after:content[' '] pointer-events-none absolute left-0  -top-2.5 flex h-full w-full select-none !overflow-visible truncate text-sm font-normal leading-tight text-focus transition-all after:absolute after:-bottom-2.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-focus after:transition-transform after:duration-300 peer-placeholder-shown:leading-tight peer-placeholder-shown:text-focus peer-focus:text-sm peer-focus:leading-tight peer-focus:text-focus peer-focus:after:scale-x-100 peer-focus:after:border-focus peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                      Стаж
                                    </label>
                         </div>

                         <div class="relative h-11 w-full min-w-[200px]">
                                    <input 
                                    type="text"
                                    name="age"
                                      placeholder="Возраст"
                                      required
                                      class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-focus outline outline-0 transition-all placeholder-shown:border-focus
                                       focus:border-focus focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" />
                                    <label
                                      class="after:content[' '] pointer-events-none absolute left-0  -top-2.5 flex h-full w-full select-none !overflow-visible truncate text-sm font-normal leading-tight text-focus transition-all after:absolute after:-bottom-2.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-focus after:transition-transform after:duration-300 peer-placeholder-shown:leading-tight peer-placeholder-shown:text-focus peer-focus:text-sm peer-focus:leading-tight peer-focus:text-focus peer-focus:after:scale-x-100 peer-focus:after:border-focus peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                      Возраст
                                    </label>
                         </div>
                         
                         <div class="relative h-11 w-full min-w-[200px]">
                                    <input 
                                    type="text"
                                    name="choice"
                                      placeholder="Формат обучения (онланй/оффлайн)"
                                      required
                                      class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-focus outline outline-0 transition-all placeholder-shown:border-focus
                                       focus:border-focus focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" />
                                    <label
                                      class="after:content[' '] pointer-events-none absolute left-0  -top-2.5 flex h-full w-full select-none !overflow-visible truncate text-sm font-normal leading-tight text-focus transition-all after:absolute after:-bottom-2.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-focus after:transition-transform after:duration-300 peer-placeholder-shown:leading-tight peer-placeholder-shown:text-focus peer-focus:text-sm peer-focus:leading-tight peer-focus:text-focus peer-focus:after:scale-x-100 peer-focus:after:border-focus peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                      Формат обучения 
                                    </label>
                         </div>
                         
                         <div class="relative h-11 w-full min-w-[200px]">
                                    <input 
                                    type="text"
                                    name="about"
                                      placeholder="О себе"
                                      required
                                      class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-focus outline outline-0 transition-all placeholder-shown:border-focus
                                       focus:border-focus focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" />
                                    <label
                                      class="after:content[' '] pointer-events-none absolute left-0  -top-2.5 flex h-full w-full select-none !overflow-visible truncate text-sm font-normal leading-tight text-focus transition-all after:absolute after:-bottom-2.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-focus after:transition-transform after:duration-300 peer-placeholder-shown:leading-tight peer-placeholder-shown:text-focus peer-focus:text-sm peer-focus:leading-tight peer-focus:text-focus peer-focus:after:scale-x-100 peer-focus:after:border-focus peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                      О себе (биография)
                                    </label>
                         </div>

                         <div class="relative h-11 w-full min-w-[200px]">
                                    <input 
                                    type="text"
                                    name="practice"
                                      placeholder="Опыт"
                                      required
                                      class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-focus outline outline-0 transition-all placeholder-shown:border-focus
                                       focus:border-focus focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" />
                                    <label
                                      class="after:content[' '] pointer-events-none absolute left-0  -top-2.5 flex h-full w-full select-none !overflow-visible truncate text-sm font-normal leading-tight text-focus transition-all after:absolute after:-bottom-2.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-focus after:transition-transform after:duration-300 peer-placeholder-shown:leading-tight peer-placeholder-shown:text-focus peer-focus:text-sm peer-focus:leading-tight peer-focus:text-focus peer-focus:after:scale-x-100 peer-focus:after:border-focus peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                      Опыт
                                    </label>
                         </div>

                         <div class="relative h-11 w-full min-w-[200px]">
                                    <input 
                                    type="text"
                                    name="skills"
                                      placeholder="Компетенции"
                                      required
                                      class="peer h-full w-full border-b border-blue-gray-200 bg-transparent pt-4 pb-1.5 font-sans text-sm font-normal text-focus outline outline-0 transition-all placeholder-shown:border-focus
                                       focus:border-focus focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" />
                                    <label
                                      class="after:content[' '] pointer-events-none absolute left-0  -top-2.5 flex h-full w-full select-none !overflow-visible truncate text-sm font-normal leading-tight text-focus transition-all after:absolute after:-bottom-2.5 after:block after:w-full after:scale-x-0 after:border-b-2 after:border-focus after:transition-transform after:duration-300 peer-placeholder-shown:leading-tight peer-placeholder-shown:text-focus peer-focus:text-sm peer-focus:leading-tight peer-focus:text-focus peer-focus:after:scale-x-100 peer-focus:after:border-focus peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                      Компетенции
                                    </label>
                         </div>
  
                         <input type="submit" name="update_teacher" class="text-center  text-white px-6 
                     py-3 bg-btn_color  rounded-border w-27 text-xl">
                            
    </div>
                         </div>    
                        
                         
                     
                            </div>
                       
</form>
                </div>
                            </div>
                            </div>
                            </div>
                            
</body>
</html>