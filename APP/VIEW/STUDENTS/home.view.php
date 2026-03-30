<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students - Dashboard</title>
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
            <ul class="xcenter flex justify-between items-center gap-4 p-4 hidden md:flex">
                <li>
                    <a href="#hero"
                        class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                        <i class="ri-dashboard-horizontal-fill text-[1.6em] lg:text-[1em]"></i> <span class="hidden lg:block">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?= ROOT ?>/public/students/result"
                        class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                        <i class="ri-a-b text-[1.6em] lg:text-[1em]"></i> <span class="hidden lg:block">Result</span>
                    </a>
                </li>
                <li>
                    <a href="<?= ROOT ?>/public/students/leaderboard"
                        class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                        <i class="ri-bar-chart-fill text-[1.6em] lg:text-[1em]"></i> <span class="hidden lg:block">Leaderboard</span>
                    </a>
                </li>
            </ul>

            <div class="cta-buttons flex justify-between items-center gap-2 p-2 ">

                <!-- Logout -->
                <form id="logout-form" action="<?= ROOT ?>/public/auth/logout" method="post" class="hidden"></form>
                <button
                    id="logout-btn"
                    type="button"
                    class="flex gap-2 justify-center item-center bg-white btn hover:scale-105 w-fit">
                    <i class="ri-logout-box-line"></i> <span class="hidden lg:block">Logout</span>
                </button>

                <a href="<?= ROOT ?>\public\students\profile"
                    class="flex gap-2 justify-center item-center btn btn-primary hover:scale-105 w-fit">
                    <i class="ri-user-fill"></i> <span class="hidden lg:block">Profile</span>
                </a>

                <div class="responsive-nav-cont">
                    <i class="ri-menu-fill text-[1.7em] cursor-pointer hover:text-orange-600 md:hidden"></i>
                    <i class="ri-close-large-line text-[1.7em] cursor-pointer hover:text-orange-600 hidden"></i>
                </div>
            </div>
        </nav>

        <ul class="responsive-nav-cont backdrop-blur-md border-2 border-orange-600 w-fit p-8 flex gap-4 flex-col justify-start items-start fixed right-[5vw] rounded-lg hidden ">
            <li>
                <a href="#hero"
                    class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                    <i class="ri-dashboard-horizontal-fill text-[1.6em] lg:text-[1em] "></i> Home
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/public/students/result"
                    class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                    <i class="ri-a-b text-[1.6em] lg:text-[1em] "></i> Result
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/public/students/leaderboard"
                    class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                    <i class="ri-bar-chart-fill text-[1.6em] lg:text-[1em] "></i> Leaderboard
                </a>
            </li>
        </ul>

    </header>

    <section id="hero" class="py-4 px-[5vw] min-h-screen flex flex-col items-center justify-start ">
        <!-- STUDENT GREETINGS -->
        <section class="relative border-[var(--orange)] border-2 mt-[5rem] flex flex-col md:flex-row w-[90vw] rounded-lg justify-start md:justify-between item-center p-8">
            <div>
                <h1 class="leading-none text-[clamp(2em,2.5vw,3.5vw)] font-bold mb-4 ">Welcome back , Deepak Sharma 👋 </h1>
                <p class="">You have completed quiz n so far.<br> Your personal best is 90%. <br>You haven't taken any quizzes yet. Start your first one now.</p>
            </div>
            <a href="<?= ROOT ?>/public/quiz/" class="btn hover:bg-orange-600 hover:text-white text-[clamp(1.4em,1.5vw,1.8em)] truncate w-full md:w-fit h-fit mt-8 py-4 px-12 flex justify-center items-center gap-4">Start new Quiz <i class="ri-arrow-right-long-line "></i> </a>
        </section>

        <!-- STUDENTS STATS -->
        <section id="student-stats" class=" my-[5vh] flex flex-col md:flex-row w-[90vw] rounded-lg justify-center item-center gap-[3vw] p-4">
            <div class="stat-cont p-4 flex flex-col justify-start items-center gap-4">
                <h3 class="uppercase  text-[clamp(1em,1.5vw,1.3em)]">total quizes</h3>
                <h2 class="text-[clamp(2.5em,3vw,4em)] font-bold my-[-10px] ">1,200+</h2>
                <h5 class=" text-[clamp(0.8em,3vw,1em)] text-center ">Registered Students</h5>
            </div>
            <div class="stat-cont p-4 flex flex-col justify-start items-center gap-4">
                <h3 class="uppercase  text-[clamp(1em,1.5vw,1.3em)]">Best Score</h3>
                <h2 class="text-[clamp(2.5em,3vw,4em)] font-bold my-[-10px]  ">18,400+</h2>
                <h5 class=" text-[clamp(0.8em,3vw,1em)] text-center ">Quizzes conducted</h5>
            </div>
            <div class="stat-cont p-4 flex flex-col justify-start items-center gap-4">
                <h3 class="uppercase  text-[clamp(1em,1.5vw,1.3em)]">Average score</h3>
                <h2 class="text-[clamp(2.5em,3vw,4em)] font-bold my-[-10px] ">94%</h2>
                <h5 class=" text-[clamp(0.8em,3vw,1em)] text-center ">Average satisfaction rate</h5>
            </div>
            <div class="stat-cont p-4 flex flex-col justify-start items-center gap-4">
                <h3 class="uppercase  text-[clamp(1em,1.5vw,1.3em)]">current rank</h3>
                <h2 class="text-[clamp(2.5em,3vw,4em)] font-bold my-[-10px] ">15+</h2>
                <h5 class=" text-[clamp(0.8em,3vw,1em)] text-center ">Subject categories</h5>
            </div>
        </section>

        <!-- STUDY GUIDE : COMING SOON -->
        <section id="study-guide" class=" p-4 opacity-50 cursor-not-allowed">
            <h3 class="uppercase text-[clamp(1.2em,1.5vw,1.5em)]">Study Guide — Coming Soon</h3>
            <p>A smarter way to prepare is on the way. Our upcoming Study Guide will help students learn efficiently with structured content, guided practice, and progress tracking — all in one place.</p>
            <div class="feature-cont grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 p-2 mt-4">
                <div class="feature bg-white border-black border  min-h-fit rounded-lg p-8">
                    <i class="ri-stack-fill text-orange-600 text-[clamp(1.5rem,2vw,1.8rem)]"></i>
                    <h4 class="text-[clamp(1.2rem,1.5vw,1.5rem)]">Maths</h4>
                    <p class="text-[clamp(0.8em,1vw,1.2em)]">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                </div>
                <div class="feature bg-white border-black border  min-h-fit rounded-lg p-8">
                    <i class="ri-stack-fill text-orange-600 text-[clamp(1.5rem,2vw,1.8rem)]"></i>
                    <h4 class="text-[clamp(1.2rem,1.5vw,1.5rem)]">Maths</h4>
                    <p class="text-[clamp(0.8em,1vw,1.2em)]">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                </div>
                <div class="feature bg-white border-black border  min-h-fit rounded-lg p-8">
                    <i class="ri-stack-fill text-orange-600 text-[clamp(1.5rem,2vw,1.8rem)]"></i>
                    <h4 class="text-[clamp(1.2rem,1.5vw,1.5rem)]">Maths</h4>
                    <p class="text-[clamp(0.8em,1vw,1.2em)]">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                </div>
            </div>
        </section>
    </section>

    <!-- FOOTER -->
    <footer class="bg-black text-white mt-10">
        <div class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <img class="size-[100px] " src="<?= ROOT ?>\PUBLIC\ASSETS\imgs\dark-logo.png" alt="Quiz Tracker Logo">
                <p class="text-sm leading-relaxed">
                    Test your knowledge with interactive quizzes.
                    Improve skills, track progress, and challenge yourself daily.
                </p>
            </div>
            <div>
                <h2 class="text-white text-lg font-semibold mb-4">Quick Links</h2>
                <ul class="space-y-2 text-sm">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Quizzes</a></li>
                    <li><a href="#">Results</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div>
                <h2 class="text-white text-lg font-semibold mb-4">Contact</h2>
                <p class="text-sm">Email: code.deepak9899sharma@gmail.com</p>
                <p class="text-sm mt-2">Phone: +91 92059 75484</p>
            </div>
        </div>
        <div class="border-t border-gray-700">
            <div class="max-w-7xl mx-auto px-6 py-4 text-center text-sm">
                © 2026 Quiz. All Rights Reserved.
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-4.0.0.js"></script>
    <script>
    $(function () {

        // Responsive nav toggle 
        const $menuOpen  = $('.ri-menu-fill');
        const $menuClose = $('.ri-close-large-line');
        const $dropNav   = $('ul.responsive-nav-cont');

        $menuOpen.on('click', function () {
            $dropNav.removeClass('hidden');
            $menuOpen.addClass('hidden');
            $menuClose.removeClass('hidden');
        });

        $menuClose.on('click', function () {
            $dropNav.addClass('hidden');
            $menuOpen.removeClass('hidden');
            $menuClose.addClass('hidden');
        });

        $dropNav.find('a').on('click', function () {
            $dropNav.addClass('hidden');
            $menuOpen.removeClass('hidden');
            $menuClose.addClass('hidden');
        });

        $(document).on('click', function (e) {
            if (!$(e.target).closest('header').length) {
                $dropNav.addClass('hidden');
                $menuOpen.removeClass('hidden');
                $menuClose.addClass('hidden');
            }
        });

        // Logout confirmation → POST form submit
        $('#logout-btn').on('click', function () {
            const confirmed = window.confirm('Are you sure you want to logout?');
            if (confirmed) {
                $('#logout-form').submit();
            }
        });

    });
    </script>
</body>
</html>