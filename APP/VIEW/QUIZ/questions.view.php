<?php

if (Session::has("current_quiz")) {
    $current_quiz = Session::get("current_quiz");
    $current_quiz_question_label = $current_quiz["question"]["label"];
    $current_quiz_question_options = $current_quiz["question"]["options"];
    $current_quiz_question_num = $current_quiz["question"]["num"] + 1 ;
}else{
    //redirect to /quiz : no session found for quiz data
    echo "<h1>start new quiz with new session";
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students - Quiz</title>
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?= ROOT ?>\PUBLIC\ASSETS\imgs\favicon.png" type="image/x-icon">
    <!-- CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css" rel="stylesheet" />
    <!-- Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>\PUBLIC\ASSETS\styles\main.css">
    <link rel="stylesheet" href="<?= ROOT ?>\PUBLIC\ASSETS\styles\style.css">
    <link rel="stylesheet" href="<?= ROOT ?>\PUBLIC\ASSETS\styles\animation.css">
    <link rel="stylesheet" href="<?= ROOT ?>\PUBLIC\ASSETS\styles\utility.css">
    <link rel="stylesheet" href="<?= ROOT ?>\PUBLIC\ASSETS\styles\component.css">
    <style>
        *{
            user-select: none;
        }
    </style>
</head>

<body class="relative text-[clamp(0.8rem,1.3vw,1rem)]">
    <header class="fixed w-[100vw] z-[999]">
        <nav class=" backdrop-filter backdrop-blur-sm  flex justify-between items-center gap-[4vw] p-2 px-[6vw]">
            <img class="size-[70px] " src="<?= ROOT ?>\PUBLIC\ASSETS\imgs\logo.png" alt="Quiz Tracker Logo"
                class="logo">

            <div class="auth-buttons flex justify-between items-center gap-2 p-2 ">
                <div 
                    class="flex gap-2 justify-center item-center text-[clamp(1.2em,1.5vw,1.5em)]">
                    <i class="ri-timer-flash-line"></i> 5:00:00
                </div>
                <div 
                    class="flex gap-2 justify-center item-center bg-white btn hover:scale-105 w-fit">
                    <i class="ri-close-fill"></i> <span class="hidden lg:block">Cancel</span>  
                </div>
            </div>
        </nav>
    </header>

    <section id="hero" class=" flex flex-col items-center justify-center lg:justify-start  p-4 pt-[100px]">
        <div class="border-2 border-gray shadow-lg rounded-lg bg-white flex justify-center items-center flex-col  p-8 lg:px-8 w-full lg:w-[80vw] max-w-[900px] ">
            <h3 class="uppercase text-[clamp(1.2em,1.5vw,1.5em)] p-4">question <?= $current_quiz_question_num?></h3>
            <h1 class="px-px mx-px md:px-4 lg:px-8  text-[clamp(1.5em,1.3vw,2.4vw)] shrink-0  w-full text-start "><?= $current_quiz_question_label ?></h1>
            
            <form action="<?= ROOT ?>/public/quiz/questions" method="post" class=" w-full py-4 px-px m-px md:p-4 lg:p-8 flex justify-center items-center gap-2 flex-col">
                
                <ul class="w-full flex justify-center items-center gap-4 flex-col">
                    <li class="w-full bg-red-100 flex my-px ">
                        <input class="radio-elm" type="radio" name="answer" value="<?= $current_quiz_question_options[0]?>" id="question_a" required>
                        <label
                            class="p-4 bg-white cursor-pointer border-white hover:shadow-lg hover:border-black border-2 rounded-lg block w-full justify-center items-start hover:font-bold"
                            for="question_a"> A. <?= $current_quiz_question_options[0] ?></label>
                    </li>
                    <li class="w-full bg-red-100 flex my-px ">
                        <input class="radio-elm" type="radio" name="answer" value="<?= $current_quiz_question_options[1]?>" id="question_b">
                        <label
                            class="p-4 bg-white cursor-pointer border-white hover:shadow-lg hover:border-black border-2 rounded-lg block w-full justify-center items-start hover:font-bold"
                            for="question_b"> B.  <?= $current_quiz_question_options[1] ?></label>
                    </li>
                    <li class="w-full bg-red-100 flex my-px ">
                        <input class="radio-elm" type="radio" name="answer" value="<?= $current_quiz_question_options[2]?>" id="questions_c">
                        <label
                            class="p-4 bg-white cursor-pointer border-white hover:shadow-lg hover:border-black border-2 rounded-lg block w-full justify-center items-start hover:font-bold"
                            for="questions_c"> C.  <?= $current_quiz_question_options[2] ?></label>
                    </li>
                    <li class="w-full bg-red-100 flex my-px ">
                        <input class="radio-elm" type="radio" name="answer" value="<?= $current_quiz_question_options[3]?>" id="question_d">
                        <label
                            class="p-4 bg-white cursor-pointer border-white hover:shadow-lg hover:border-black border-2 rounded-lg block w-full justify-center items-start hover:font-bold"
                            for="question_d"> D.  <?= $current_quiz_question_options[3] ?></label>
                    </li>
                </ul>
                

                <div class="mt-4 flex gap-4  w-full">
                    <button class="btn w-full flex justify-center items-center gap-2 md:gap-4" aria-readonly="true"><i class="ri-arrow-left-long-fill text-[1.7em]"></i> Previus</button>
                    <button class="btn w-full flex justify-center items-center gap-2 md:gap-4 btn-primary"> Next <i class="ri-arrow-right-long-fill text-[1.7em]"></i> </button>
                </div>

            </form>
        </div>
    </section>




    <script src="https://code.jquery.com/jquery-4.0.0.js"></script>
    <script>

    </script>
</body>

</html>