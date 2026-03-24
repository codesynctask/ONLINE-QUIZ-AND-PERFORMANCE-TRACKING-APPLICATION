<?php

if (Session::has("current_quiz")) {
    $current_quiz = Session::get("current_quiz");
    $current_quiz_question_label = $current_quiz["question"]["label"];
    $current_quiz_question_options = $current_quiz["question"]["options"];
    $current_quiz_question_num = $current_quiz["question"]["num"] ;
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

    <section id="hero" class=" min-h-screen flex flex-col items-center justify-center lg:justify-start lg:mt-[100px]">
        <div class="border-2 border-gray shadow-lg rounded-lg bg-white flex justify-center items-center flex-col m-4 p-4 lg:px-8 min-w-[200px] max-w-[700px]">
            <h3 class="uppercase text-[clamp(1.2em,1.5vw,1.5em)] p-4">question <i class="ri-number-<?= $current_quiz_question_num?>"></i> </h3>
            <h1 class="px-px mx-px md:px-4 lg:px-8  text-[clamp(1.5em,1.3vw,2.4vw)] shrink-0  w-full text-start "><?= $current_quiz_question_label ?></h1>
            
            <form action="<?= ROOT ?>/public/quiz/questions" class=" w-full py-4 px-px m-px md:p-4 lg:p-8 flex justify-center items-center gap-2 flex-col">
                
                <ul class="w-full flex justify-center items-center gap-4 flex-col">
                    <li class="w-full bg-red-100 flex my-px ">
                        <input class="radio-elm" type="radio" name="questions_no" value="answer_no" id="question_a">
                        <label
                            class="p-4 bg-white cursor-pointer border-white hover:shadow-lg hover:border-black border-2 rounded-lg block w-full justify-center items-start hover:font-bold"
                            for="question_a"> A. <?= $current_quiz_question_options[0] ?></label>
                    </li>
                    <li class="w-full bg-red-100 flex my-px ">
                        <input class="radio-elm" type="radio" name="questions_no" value="answer_no" id="question_b">
                        <label
                            class="p-4 bg-white cursor-pointer border-white hover:shadow-lg hover:border-black border-2 rounded-lg block w-full justify-center items-start hover:font-bold"
                            for="question_b"> B.  <?= $current_quiz_question_options[1] ?></label>
                    </li>
                    <li class="w-full bg-red-100 flex my-px ">
                        <input class="radio-elm" type="radio" name="questions_no" value="answer_no" id="questions_c">
                        <label
                            class="p-4 bg-white cursor-pointer border-white hover:shadow-lg hover:border-black border-2 rounded-lg block w-full justify-center items-start hover:font-bold"
                            for="questions_c"> C.  <?= $current_quiz_question_options[2] ?></label>
                    </li>
                    <li class="w-full bg-red-100 flex my-px ">
                        <input class="radio-elm" type="radio" name="questions_no" value="answer_no" id="question_d">
                        <label
                            class="p-4 bg-white cursor-pointer border-white hover:shadow-lg hover:border-black border-2 rounded-lg block w-full justify-center items-start hover:font-bold"
                            for="question_d"> D.  <?= $current_quiz_question_options[3] ?></label>
                    </li>
                </ul>
                

                <div class="mt-4 flex gap-4  w-full">
                    <button class="btn w-full flex justify-center items-center gap-2 md:gap-4"><i class="ri-arrow-left-long-fill text-[1.7em]"></i> Previus</button>
                    <button class="btn w-full flex justify-center items-center gap-2 md:gap-4 btn-primary"> Next <i class="ri-arrow-right-long-fill text-[1.7em]"></i> </button>
                </div>

            </form>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-black text-white mt-10">
        <div class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- About -->
            <div>
                <img class="size-[100px] " src="<?= ROOT ?>\PUBLIC\ASSETS\imgs\dark-logo.png" alt="Quiz Tracker Logo">
                <p class="text-sm leading-relaxed">
                    Test your knowledge with interactive quizzes.
                    Improve skills, track progress, and challenge yourself daily.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h2 class="text-white text-lg font-semibold mb-4">Quick Links</h2>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" ">Home</a></li>
                    <li><a href=" #" ">Quizzes</a></li>
                    <li><a href=" #" ">Results</a></li>
                    <li><a href=" #" ">Contact</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h2 class=" text-white text-lg font-semibold mb-4">Contact</h2>
                            <p class="text-sm">Email: code.deepak9899sharma@gmail.com</p>
                            <p class="text-sm mt-2">Phone: +91 92059 75484</p>
            </div>

        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-gray-700">
            <div class="max-w-7xl mx-auto px-6 py-4 text-center text-sm">
                © 2026 Quiz. All Rights Reserved.
            </div>
        </div>
    </footer>
</body>

</html>