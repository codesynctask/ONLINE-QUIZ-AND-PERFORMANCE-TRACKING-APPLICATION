<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?= ROOT ?>\PUBLIC\ASSETS\imgs\favicon.png" type="image/x-icon">
    <!-- CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css" rel="stylesheet" />
    <!-- Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>\PUBLIC\ASSETS\styles\main.css">
    <link rel="stylesheet" href="<?= ROOT ?>\PUBLIC\ASSETS\styles\utility.css">
    <link rel="stylesheet" href="<?= ROOT ?>\PUBLIC\ASSETS\styles\component.css">
    <style>
        body {
            height: 300vh;
            position: relative;

        }
    </style>
</head>

<body>
    <header class="fixed w-[100vw]">
        <nav class=" relative border-black flex justify-between items-center gap-[4vw] p-2 px-[6vw]">
            <img class="size-[70px] " src="<?= ROOT ?>\PUBLIC\ASSETS\imgs\logo.png" alt="Quiz Tracker Logo"
                class="logo">
            <ul class="xcenter  flex justify-between items-center gap-10 p-4">
                <li>
                    <a href="#home "
                        class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate"><i
                            class="ri-home-fill"></i> Home </a>
                </li>
                <li>
                    <a href="#features "
                        class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate"><i
                            class="ri-draft-fill"></i> Features </a>
                </li>
                <li>
                    <a href="#how-it-works "
                        class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate"><i
                            class="ri-question-answer-fill"></i> How It Works </a>
                </li>
                <li>
                    <a href="#leaderboard "
                        class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate"><i
                            class="ri-dashboard-horizontal-fill"></i> Leaderboard </a>
                </li>
            </ul>

            <div class="auth-buttons flex justify-between items-center gap-2 p-2 ">
                <a href="<?= ROOT ?>\public\auth\register"
                    class="flex gap-2 justify-center item-center btn hover:scale-105"><i class="ri-user-add-fill"></i>
                    Register</a>
                <a href="<?= ROOT ?>\public\auth\login"
                    class="flex gap-2 justify-center item-center btn btn-primary hover:scale-105"><i
                        class="ri-login-circle-fill"></i> Login</a>
            </div>
        </nav>
</header>

    <section  class="pt-20 min-h-screen">


    </section>





    <footer class="bg-black text-white mt-10">
        <div class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- About -->
            <div>
                <img class="size-[100px] " src="<?= ROOT ?>\PUBLIC\ASSETS\imgs\dark-logo.png" alt="Quiz Tracker Logo"
                <img src="" alt="">
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
                    <li><a href="#" ">Quizzes</a></li>
                    <li><a href="#" ">Results</a></li>
                    <li><a href="#" ">Contact</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h2 class="text-white text-lg font-semibold mb-4">Contact</h2>
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