<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz. - Online Quiz & performance tracking application</title>
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
    <header class="fixed w-[100vw]">
        <nav class=" backdrop-filter backdrop-blur-sm  flex justify-between items-center gap-[4vw] p-2 px-[6vw]">
            <img class="size-[70px] " src="<?= ROOT ?>\PUBLIC\ASSETS\imgs\logo.png" alt="Quiz Tracker Logo"
                class="logo">
            <ul class="xcenter flex justify-between items-center gap-4 p-4 hidden md:flex">
                <li>
                    <a 
                        href="#hero "
                        class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                        <i class="ri-home-fill text-[1.6em] lg:text-[1em]"></i> <span class="hidden lg:block">Home</span> 
                    </a>
                </li>
                <li>
                    <a 
                        href="#features "
                        class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                        <i class="ri-draft-fill text-[1.6em] lg:text-[1em]"></i> <span class="hidden lg:block">Features</span> 
                    </a>
                </li>
                <li>
                    <a 
                        href="#how-it-works "
                        class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                        <i class="ri-question-answer-fill text-[1.6em] lg:text-[1em]"></i> <span class="hidden lg:block">How It Works</span> 
                    </a>
                </li>
                <li>
                    <a 
                        href="#leaderboard "
                        class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                        <i class="ri-dashboard-horizontal-fill text-[1.6em] lg:text-[1em]"></i> <span class="hidden lg:block">Leaderboard</span> 
                    </a>
                </li>
            </ul>

            <div class="auth-buttons flex justify-between items-center gap-2 p-2 ">
                <a 
                    href="<?= ROOT ?>\public\page\register"
                    class="flex gap-2 justify-center item-center bg-white btn hover:scale-105 w-fit">
                    <i class="ri-user-add-fill"></i> <span class="hidden lg:block">Register</span>  
                </a>
                <a 
                    href="<?= ROOT ?>\public\page\login"
                    class="flex gap-2 justify-center item-center btn btn-primary hover:scale-105">
                    <i class="ri-login-circle-fill"></i> Login
                </a>

                <div class="responsive-nav-cont">
                    <i class="ri-menu-fill text-[1.7em] cursor-pointer hover:text-orange-600 md:hidden"></i>
                    <i class="ri-close-large-line text-[1.7em] cursor-pointer hover:text-orange-600 hidden"></i>
                </div>
            </div>
        </nav>

        <ul class="responsive-nav-cont backdrop-blur-md border-2 border-orange-600 w-fit p-8 flex gap-4 flex-col justify-start items-start fixed right-[5vw] rounded-lg hidden">
            <!-- TODO : with jQuery make it toggle on menu icon click  -->
            <li>
                <a 
                    href="#hero "
                    class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                    <i class="ri-home-fill text-[1.6em] lg:text-[1em] mt-[-5px]"></i> Home
                </a>
            </li>
            <li>
                <a 
                    href="#features "
                    class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                    <i class="ri-draft-fill text-[1.6em] lg:text-[1em] mt-[-5px]"></i> Features
                </a>
            </li>
            <li>
                <a 
                    href="#how-it-works "
                    class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                    <i class="ri-question-answer-fill text-[1.6em] lg:text-[1em] mt-[-5px]"></i> How It Works
                </a>
            </li>
            <li>
                <a 
                    href="#leaderboard "
                    class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                    <i class="ri-dashboard-horizontal-fill text-[1.6em] lg:text-[1em] mt-[-5px]"></i> Leaderboard
                </a>
            </li>
        </ul>

</header>

    <section id="main"  class="py-4 px-[5vw] min-h-screen flex flex-col items-center justify-center ">
        <!-- HERO -->
        <section id="hero" class="mt-[5rem] h-fit flex flex-col md:flex-row  justify-center w-fit  items-center gap-10 ">
            <div class="h-fit p-4 md:w-[55%]">
                <h6 class="bg-white border-2 border-black flex justify-center items-center gap-3 truncate badge text-[clamp(0.6em,0.8vw,1.2em)] border-black rounded-full p-3 px-7 w-fit"><div class="circle relative size-[10px] rounded-full"></div>ONLINE QUIZ AND PERFORMANCE TRACKING APPLICATION </h6>
                <h1 class="leading-none my-8 text-[clamp(1.8em,3.8vw,5.5vw)] font-bold">Where knowledge meets <span class="text-orange-600 act-cursive text-[clamp(2.5em,7vw,9vw)]">measurable</span> progress</h1>
                <p>Quiz is a structured online quiz platform built for academic institutions. Students take quizzes, track performance, and compete on a shared leaderboard — all in one secure, role-based system.</p>
            </div>
            <img src="<?= ROOT ?>/public/assets/imgs/hero-img.png" alt="" class=" w-full md:w-[45%] ">
        </section>

        <!-- STATS -->
        <section id="stats"  class="bg-orange-600 lg:mb-[5vh] lg:mt-[25vh] flex flex-col md:flex-row w-[90vw] rounded-lg justify-center item-center gap-[3vw] p-4">
            <div class="stat-cont p-4 flex flex-col justify-start items-center gap-4">
                <h2 class="text-[clamp(2.5em,3vw,4em)] font-bold mb-[-10px] text-white">1,200+</h2>
                <h5 class="text-white text-[clamp(0.8em,3vw,1em)] text-center ">Registered Students</h5>
            </div>
            <div class="stat-cont p-4 flex flex-col justify-start items-center gap-4">
                <h2 class="text-[clamp(2.5em,3vw,4em)] font-bold mb-[-10px] text-white ">18,400+</h2>
                <h5 class="text-white text-[clamp(0.8em,3vw,1em)] text-center ">Quizzes conducted</h5>
            </div>
            <div class="stat-cont p-4 flex flex-col justify-start items-center gap-4">
                <h2 class="text-[clamp(2.5em,3vw,4em)] font-bold mb-[-10px] text-white">94%</h2>
                <h5 class="text-white text-[clamp(0.8em,3vw,1em)] text-center ">Average satisfaction rate</h5>
            </div>
            <div class="stat-cont p-4 flex flex-col justify-start items-center gap-4">
                <h2 class="text-[clamp(2.5em,3vw,4em)] font-bold mb-[-10px] text-white">15+</h2>
                <h5 class="text-white text-[clamp(0.8em,3vw,1em)] text-center ">Subject categories</h5>
            </div>
        </section>

        <!-- FEATURES -->
        <section id="features" class="mt-[15vh] p-4">
            <h3 id="features" class="uppercase text-[clamp(1.2em,1.5vw,1.5em)]">platform featurs</h3>
            <h1 class="text-[clamp(1.8em,3.8vw,5.5vw)]">Everything a modern assessment platform needs</h1>
            <p>Designed around three roles — student, faculty, and administrator — so every user has exactly the tools they need and nothing more.</p>
            <div class="feature-cont grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 p-2 mt-4">
                <div class="feature bg-white border-black border  min-h-fit rounded-lg p-8">
                    <i class="ri-stack-fill text-orange-600 text-[clamp(1.5rem,2vw,1.8rem)]"></i>
                    <h4 class="text-[clamp(1.2rem,1.5vw,1.5rem)]">Role-based access control</h4>
                    <p class="text-[clamp(0.8em,1vw,1.2em)]">Admins, faculty, and students each see only the features relevant to their role. Secure from the ground up using PHP session authentication.</p>
                </div>
                <div class="feature bg-white border-black border  min-h-fit rounded-lg p-8">
                    <i class="ri-send-plane-fill text-orange-600 text-[clamp(1.5rem,2vw,1.8rem)]"></i>
                    <h4 class="text-[clamp(1.2rem,1.5vw,1.5rem)]">Live question fetching</h4>
                    <p class="text-[clamp(0.8em,1vw,1.2em)]">Questions are sourced from the Open Trivia Database API across 15+ categories, refreshed at the start of every new quiz session.</p>
                </div>
                <div class="feature bg-white border-black border  min-h-fit rounded-lg p-8">
                    <i class="ri-file-paper-2-fill text-orange-600 text-[clamp(1.5rem,2vw,1.8rem)]"></i>
                    <h4 class="text-[clamp(1.2rem,1.5vw,1.5rem)]">Instant results and scoring</h4>
                    <p class="text-[clamp(0.8em,1vw,1.2em)]">Answers are evaluated automatically the moment a quiz is submitted. Scores, percentages, and correct answers are displayed immediately.</p>
                </div>
                <div class="feature bg-white border-black border  min-h-fit rounded-lg p-8">
                    <i class="ri-bar-chart-2-fill text-orange-600 text-[clamp(1.5rem,2vw,1.8rem)]"></i>
                    <h4 class="text-[clamp(1.2rem,1.5vw,1.5rem)]">Dynamic leaderboard</h4>
                    <p class="text-[clamp(0.8em,1vw,1.2em)]">Rankings are computed in real time from the results database. No stale data — every new quiz submission updates the leaderboard instantly.</p>
                </div>
                <div class="feature bg-white border-black border  min-h-fit rounded-lg p-8">
                    <i class="ri-file-chart-line text-orange-600 text-[clamp(1.5rem,2vw,1.8rem)]"></i>
                    <h4 class="text-[clamp(1.2rem,1.5vw,1.5rem)]">Faculty performance reports</h4>
                    <p class="text-[clamp(0.8em,1vw,1.2em)]">Faculty can view per-student history, category-wise averages, and identify at-risk students without accessing any administrative controls.</p>
                </div>
                <div class="feature bg-white border-black border  min-h-fit rounded-lg p-8">
                    <i class="ri-syringe-fill text-orange-600 text-[clamp(1.5rem,2vw,1.8rem)]"></i>
                    <h4 class="text-[clamp(1.2rem,1.5vw,1.5rem)]">SQL injection protection</h4>
                    <p class="text-[clamp(0.8em,1vw,1.2em)]">All database operations use PHP PDO with prepared statements, ensuring student records and credentials are fully protected from injection attacks.</p>
                </div>
            </div>
        </section>

        <!-- HOW IT WORKS -->
        <section id="how-it-works" class="mt-[15vh] p-4">
            <h3 id="features" class="uppercase text-[clamp(1.2rem,1.5vw,1.5rem)]">How it works</h3>
            <h1 class="text-[clamp(1.8em,3.8vw,5.5vw)]">From login to leaderboard in four steps</h1>
            <p>The entire quiz lifecycle — authentication, question delivery, evaluation, and ranking — is handled automatically by the platform.</p>
            <div class="how-it-works-cont h-fit flex flex-row  justify-center items-center my-4  md:flex-col">
                <div class=" steps-num-cont flex justify-center items-center p-4 flex-col md:flex-row ">
                    <div class="steps bg-white border-4 border-orange-600 rounded-full p-5 size-[clamp(4rem,3vw,4rem)] text-[clamp(2em,2vw,4em)] flex justify-center items-center bg-white">1</div>
                    <div class="steps-connect-line w-px h-[120px] md:h-px md:w-[17vw] border-2 border-orange-600 w-[16vw]"></div>
                    <div class="steps bg-white border-4 border-orange-600 rounded-full p-5 size-[clamp(4rem,3vw,4rem)] text-[clamp(2em,2vw,4em)] flex justify-center items-center bg-white">2</div>
                    <div class="steps-connect-line w-px h-[120px] md:h-px md:w-[17vw] border-2 border-orange-600 w-[16vw]"></div>
                    <div class="steps bg-white border-4 border-orange-600 rounded-full p-5 size-[clamp(4rem,3vw,4rem)] text-[clamp(2em,2vw,4em)] flex justify-center items-center bg-white">3</div>
                    <div class="steps-connect-line w-px h-[120px] md:h-px md:w-[17vw] border-2 border-orange-600 w-[16vw]"></div>
                    <div class="steps bg-white border-4 border-orange-600 rounded-full p-5 size-[clamp(4rem,3vw,4rem)] text-[clamp(2em,2vw,4em)] flex justify-center items-center bg-white">4</div>
                </div>

                <div class="steps-desc-cont h-full flex justify-center items-center flex-col px-4 gap-[10px] md:flex-row">
                    <div class="desc p-2 flex justify-center items-center flex-col h-fit min-h-[150px] min-w-[15vw]">
                        <h3 class="text-[clamp(1.2rem,1.5vw,1.5rem)] text-center font-bold">Login securely</h3>
                        <p class="text-center">Students authenticate using credentials created by the administrator. Role-based access is granted immediately upon login.</p>
                    </div>
                    <div class="desc p-2 flex justify-center items-center flex-col h-fit min-h-[150px] min-w-[15vw]">
                        <h3 class="text-[clamp(1.2rem,1.5vw,1.5rem)] text-center font-bold">Configure your quiz</h3>
                        <p class="text-center">Select a subject category, difficulty level, and number of questions. The system fetches a fresh set from the API.</p>
                    </div>
                    <div class="desc p-2 flex justify-center items-center flex-col h-fit min-h-[150px] min-w-[15vw]">
                        <h3 class="text-[clamp(1.2rem,1.5vw,1.5rem)] text-center font-bold">Attempt the quiz</h3>
                        <p class="text-center">Answer questions within the session. Your responses are stored securely in PHP session memory until submission.</p>
                    </div>
                    <div class="desc p-2 flex justify-center items-center flex-col h-fit min-h-[150px] min-w-[15vw]">
                        <h3 class="text-[clamp(1.2rem,1.5vw,1.5rem)] text-center font-bold">Review and rank</h3>
                        <p class="text-center">Scores are calculated instantly. Your result is saved to the database and the leaderboard is updated in real time.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- LEADERBOARD -->
        <section id="leaderboard" class="mt-[15vh] p-4">
            <h3 class="uppercase text-[clamp(1.2rem,1.5vw,1.5rem)]">Leaderboard</h3>
            <h1 class="text-[clamp(1.8em,3.8vw,5.5vw)]">Compete, Rank, and Showcase Your Knowledge</h1>
            <p> Track top performers across quizzes and see how you rank against others. Our leaderboard highlights the highest scorers, fastest responders, and most consistent learners — encouraging healthy competition and continuous improvement.</p>
        </section>

        <!-- READY CTA -->
        <section class="mt-[15vh] rounded-lg p-4 flex justify-center items-center gap-4 flex-col bg-orange-600">
            <h1 class="px-[5vw] text-[clamp(1.8em,3.8vw,5.5vw)] text-white text-center ">Ready to begin your assessment journey?</h1>
            <p class=" text-center px-8 text-white ">Log in with your institutional credentials to access your quizzes, track your progress, and see where you stand on the leaderboard.</p>
            <div class="p-4 flex justify-center items-center flex-col gap-4 w-full sm:flex-row">
                <a href="<?= ROOT ?>\public\page\login" class="btn bg-white w-full md:w-fit text-[clamp(1.2rem,1.5vw,1.5rem)]">
                    <i class="ri-login-circle-fill text-lg"></i> Login to Quiz
                </a>
                <a href="" class="btn bg-white w-full md:w-fit text-[clamp(1.2rem,1.5vw,1.5rem)]">
                    <i class="ri-user-settings-fill text-lg"></i> Contact Admin
                </a>
            </div>
        </section>
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


    <script src="https://code.jquery.com/jquery-4.0.0.js"></script>;
    <script src="<?= ROOT ?>\PUBLIC\ASSETS\JS\main.js"></script>
</body>

</html>