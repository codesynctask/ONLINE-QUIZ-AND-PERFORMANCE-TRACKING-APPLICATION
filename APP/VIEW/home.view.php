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

<body class="relative">
    <header class="fixed w-[100vw]">
        <nav class=" backdrop-filter backdrop-blur-sm  flex justify-between items-center gap-[4vw] p-2 px-[6vw]">
            <img class="size-[70px] " src="<?= ROOT ?>\PUBLIC\ASSETS\imgs\logo.png" alt="Quiz Tracker Logo"
                class="logo">
            <ul class="xcenter  flex justify-between items-center gap-10 p-4">
                <li>
                    <a 
                        href="#hero "
                        class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                        <i class="ri-home-fill"></i> Home 
                    </a>
                </li>
                <li>
                    <a 
                        href="#features "
                        class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                        <i class="ri-draft-fill"></i> Features 
                    </a>
                </li>
                <li>
                    <a 
                        href="#how-it-works "
                        class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                        <i class="ri-question-answer-fill"></i> How It Works 
                    </a>
                </li>
                <li>
                    <a 
                        href="#leaderboard "
                        class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                        <i class="ri-dashboard-horizontal-fill"></i> Leaderboard 
                    </a>
                </li>
            </ul>

            <div class="auth-buttons flex justify-between items-center gap-2 p-2 ">
                <a 
                    href="<?= ROOT ?>\public\page\register"
                    class="flex gap-2 justify-center item-center bg-white btn hover:scale-105">
                    <i class="ri-user-add-fill"></i> Register 
                </a>
                <a 
                    href="<?= ROOT ?>\public\page\login"
                    class="flex gap-2 justify-center item-center btn btn-primary hover:scale-105">
                    <i class="ri-login-circle-fill"></i> Login
                </a>
            </div>
        </nav>
</header>

    <section id="main"  class="py-4 px-[5vw] min-h-screen ">
        <section id="hero" class="h-fit min-h-[95vh]  flex justify-between items-center gap-10 ">
            <div class="h-fit w-3/5 left p-4">
                <h6 class="bg-white border-2 border-black flex justify-center items-center gap-3 badge text-[0.8vw] border-black rounded-full p-3 w-fit"><div class="circle relative size-[10px] rounded-full"></div>ONLINE QUIZ AND PERFORMANCE TRACKING APPLICATION </h6>
                <h1 class="leading-none my-8 text-[5vw] font-bold">Where knowledge meets <span class="text-orange-600 act-cursive text-[8vw]">measurable</span> progress</h1>
                <p class="text-black ">Quiz is a structured online quiz platform built for academic institutions. Students take quizzes, track performance, and compete on a shared leaderboard — all in one secure, role-based system.</p>
            </div>
            <div class="h-[60vh] w-2/5 border-2 border-black border-dashed bg-white"></div>
        </section>

        <section style="background-color: var(--orange);" id="stats"  class=" rounded-lg my-[5vh] flex justify-center item-center gap-[3vw] p-4 text-red-200">
            <div class="stat-cont p-4 flex justify-center items-center gap-4 flex-col ">
                <h2 class="text-[4vw] font-bold mb-[-10px] text-white">1,200+</h2>
                <h5 class="text-white text-lg">Registered Students</h5>
            </div>
            <div class="stat-cont p-4 flex justify-center items-center gap-4 flex-col ">
                <h2 class="text-[4vw] font-bold mb-[-10px] text-white ">18,400+</h2>
                <h5 class="text-white text-lg">Quizzes conducted</h5>
            </div>
            <div class="stat-cont p-4 flex justify-center items-center gap-4 flex-col ">
                <h2 class="text-[4vw] font-bold mb-[-10px] text-white">94%</h2>
                <h5 class="text-white text-lg">Average satisfaction rate</h5>
            </div>
            <div class="stat-cont p-4 flex justify-center items-center gap-4 flex-col ">
                <h2 class="text-[4vw] font-bold mb-[-10px] text-white">15+</h2>
                <h5 class="text-white text-lg">Subject categories</h5>
            </div>
        </section>


        <section id="features" class="mt-[15vh] p-4">
            <h3 id="features" class="uppercase">platform featurs</h3>
            <h1 class="text-[3em]">Everything a modern assessment platform needs</h1>
            <p>Designed around three roles — student, faculty, and administrator — so every user has exactly the tools they need and nothing more.</p>
            <div class="feature-cont grid grid-cols-3 gap-2 p-2 mt-4">
                <div class="feature bg-white border-black border h-[35vh] min-h-fit rounded-lg p-8">
                    <i class="ri-stack-fill text-orange-600 text-[2.5vw]"></i>
                    <h4 class="text-[1.5vw]">Role-based access control</h4>
                    <p>Admins, faculty, and students each see only the features relevant to their role. Secure from the ground up using PHP session authentication.</p>
                </div>
                <div class="feature bg-white border-black border h-[35vh] min-h-fit rounded-lg p-8">
                    <i class="ri-send-plane-fill text-orange-600 text-[2.5vw]"></i>
                    <h4 class="text-[1.5vw]">Live question fetching</h4>
                    <p>Questions are sourced from the Open Trivia Database API across 15+ categories, refreshed at the start of every new quiz session.</p>
                </div>
                <div class="feature bg-white border-black border h-[35vh] min-h-fit rounded-lg p-8">
                    <i class="ri-file-paper-2-fill text-orange-600 text-[2.5vw]"></i>
                    <h4 class="text-[1.5vw]">Instant results and scoring</h4>
                    <p>Answers are evaluated automatically the moment a quiz is submitted. Scores, percentages, and correct answers are displayed immediately.</p>
                </div>
                <div class="feature bg-white border-black border h-[35vh] min-h-fit rounded-lg p-8">
                    <i class="ri-bar-chart-2-fill text-orange-600 text-[2.5vw]"></i>
                    <h4 class="text-[1.5vw]">Dynamic leaderboard</h4>
                    <p>Rankings are computed in real time from the results database. No stale data — every new quiz submission updates the leaderboard instantly.</p>
                </div>
                <div class="feature bg-white border-black border h-[35vh] min-h-fit rounded-lg p-8">
                    <i class="ri-file-chart-line text-orange-600 text-[2.5vw]"></i>
                    <h4 class="text-[1.5vw]">Faculty performance reports</h4>
                    <p>Faculty can view per-student history, category-wise averages, and identify at-risk students without accessing any administrative controls.</p>
                </div>
                <div class="feature bg-white border-black border h-[35vh] min-h-fit rounded-lg p-8">
                    <i class="ri-syringe-fill text-orange-600 text-[2.5vw]"></i>
                    <h4 class="text-[1.5vw]">SQL injection protection</h4>
                    <p>All database operations use PHP PDO with prepared statements, ensuring student records and credentials are fully protected from injection attacks.</p>
                </div>
            </div>
        </section>


        <section id="how-it-works" class="mt-[15vh] p-4">
            <h3 id="features" class="uppercase">How it works</h3>
            <h1 class="text-[3em]">From login to leaderboard in four steps</h1>
            <p>The entire quiz lifecycle — authentication, question delivery, evaluation, and ranking — is handled automatically by the platform.</p>
            <div class="how-it-works-cont flex flex-col justify-center items-center my-4">
                <div class="steps-num-cont flex justify-center w-full items-center p-4 ">
                    <div class="steps size-[1vw] bg-white border-4 border-orange-600 rounded-full p-5 size-[5vw] text-[2vw] flex justify-center items-center bg-white">1</div>
                    <div class="steps-connect-line h-px border-2 border-orange-600 w-[16vw]"></div>
                    <div class="steps size-[1vw] bg-white border-4 border-orange-600 rounded-full p-5 size-[5vw] text-[2vw] flex justify-center items-center bg-white">2</div>
                    <div class="steps-connect-line h-px border-2 border-orange-600 w-[16vw]"></div>
                    <div class="steps size-[1vw] bg-white border-4 border-orange-600 rounded-full p-5 size-[5vw] text-[2vw] flex justify-center items-center bg-white">3</div>
                    <div class="steps-connect-line h-px border-2 border-orange-600 w-[16vw]"></div>
                    <div class="steps size-[1vw] bg-white border-4 border-orange-600 rounded-full p-5 size-[5vw] text-[2vw] flex justify-center items-center bg-white">4</div>
                </div>

                <div class="steps-desc-cont flex justify-center items-center px-4 gap-[1vw] ">
                    <div class="desc p-4 flex justify-center items-center flex-col h-fit min-h-[150px] min-w-[15vw]">
                        <h3 class="text-[1.5vw]">Login securely</h3>
                        <p class="text-center">Students authenticate using credentials created by the administrator. Role-based access is granted immediately upon login.</p>
                    </div>
                    <div class="desc p-4 flex justify-center items-center flex-col h-fit min-h-[150px] min-w-[15vw]">
                        <h3 class="text-[1.5vw]">Configure your quiz</h3>
                        <p class="text-center">Select a subject category, difficulty level, and number of questions. The system fetches a fresh set from the API.</p>
                    </div>
                    <div class="desc p-4 flex justify-center items-center flex-col h-fit min-h-[150px] min-w-[15vw]">
                        <h3 class="text-[1.5vw]">Attempt the quiz</h3>
                        <p class="text-center">Answer questions within the session. Your responses are stored securely in PHP session memory until submission.</p>
                    </div>
                    <div class="desc p-4 flex justify-center items-center flex-col h-fit min-h-[150px] min-w-[15vw]">
                        <h3 class="text-[1.5vw]">Review and rank</h3>
                        <p class="text-center">Scores are calculated instantly. Your result is saved to the database and the leaderboard is updated in real time.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="leaderboard" class="mt-[15vh] p-4">
            <h3 class="uppercase">Leaderboard</h3>
            <h1 class="text-[3em]">Compete, Rank, and Showcase Your Knowledge</h1>
            <p> Track top performers across quizzes and see how you rank against others. Our leaderboard highlights the highest scorers, fastest responders, and most consistent learners — encouraging healthy competition and continuous improvement.</p>
        </section>

        <section class="mt-[15vh] rounded-lg p-4 flex justify-center items-center gap-4 flex-col bg-orange-600">
            <h1 class="text-[4vw] text-white text-center ">Ready to begin your assessment journey?</h1>
            <p class="text-[1.1vw] text-white ">Log in with your institutional credentials to access your quizzes, track your progress, and see where you stand on the leaderboard.</p>
            <div class="p-4 flex justify-center items-center gap-4">
                <a href="<?= ROOT ?>\public\page\login" class="btn w-fit bg-white"><i class="ri-login-circle-fill text-lg"></i> Login to Quiz</a>
                <a href="" class="btn w-fit bg-white"><i class="ri-user-settings-fill text-lg"></i> Contact Admin</a>
            </div>
        </section>


    </section>





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
</body>

</html>