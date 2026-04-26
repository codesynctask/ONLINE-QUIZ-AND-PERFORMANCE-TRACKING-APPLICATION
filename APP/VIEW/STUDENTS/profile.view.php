<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students - Result</title>
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
                    <a href="<?= ROOT ?>/public/students/"
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
                <a href="<?= ROOT ?>/public/students/"
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

    <section id="hero" class="py-4 px-[5vw] min-h-screen flex flex-col items-center justify-start pt-28">
        
        <!-- Profile Container -->
        <div class="w-full max-w-4xl">
            
            <!-- Profile Header Card -->
            <div class="border-2 border-orange-600 rounded-lg shadow-lg p-8 mb-8">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    
                    <!-- Profile Avatar -->
                    <div class="flex-shrink-0">
                        <div class="w-32 h-32 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center shadow-lg">
                            <i class="ri-user-3-fill text-white text-5xl"></i>
                        </div>
                    </div>
                    
                    <!-- Profile Info -->
                    <div class="flex-grow text-center md:text-left">
                        <h1 class="text-[clamp(2em,3vw,3em)] font-bold text-gray-900 mb-2"><?= Session::get("fullname") ?></h1>
                        <p class="text-gray-600 text-lg mb-4"><i class="ri-mail-line"></i> <?= Session::get("email") ?? "Nill" ?></p>
                        <div class="flex gap-4 justify-center md:justify-start">
                            <span class="inline-block bg-orange-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">
                                <i class="ri-user-check-line"></i> Student
                            </span>
                            <span class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">
                                <i class="ri-id-card-line"></i> ID: <?= Session::get("student_id") ?? Session::get("user_id") ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                
                <!-- Quick Stats Cards -->
                <div class="bg-white border-2 border-gray-200 rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-semibold uppercase">Total Quizzes Taken</p>
                            <p class="text-4xl font-bold text-orange-600 mt-2"><?= isset($total_quizzes) ? $total_quizzes : '0' ?></p>
                        </div>
                        <i class="ri-file-list-3-line text-5xl text-orange-200"></i>
                    </div>
                </div>

                <div class="bg-white border-2 border-gray-200 rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-semibold uppercase">Best Score</p>
                            <p class="text-4xl font-bold text-green-600 mt-2"><?= isset($best_score) ? $best_score : '0' ?></p>
                        </div>
                        <i class="ri-trophy-fill text-5xl text-green-200"></i>
                    </div>
                </div>

                <div class="bg-white border-2 border-gray-200 rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-semibold uppercase">Average Score</p>
                            <p class="text-4xl font-bold text-blue-600 mt-2"><?= isset($avg_percentage) ? $avg_percentage : '0' ?></p>
                        </div>
                        <i class="ri-bar-chart-fill text-5xl text-blue-200"></i>
                    </div>
                </div>

                <div class="bg-white border-2 border-gray-200 rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-semibold uppercase">Current Rank</p>
                            <p class="text-4xl font-bold text-purple-600 mt-2"><?= isset($user_rank) ? '#' . $user_rank : 'N/A' ?></p>
                        </div>
                        <i class="ri-medal-fill text-5xl text-purple-200"></i>
                    </div>
                </div>

            </div>

            <!-- Account Information Section -->
            <div class="bg-white border-2 border-gray-200 rounded-lg shadow-md p-8 mb-8">
                <div class="flex items-center mb-6 pb-4 border-b-2 border-gray-200">
                    <i class="ri-information-line text-2xl text-orange-600 mr-3"></i>
                    <h2 class="text-2xl font-bold text-gray-900">Account Information</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <div>
                        <label class="text-sm font-semibold text-gray-600 uppercase mb-2 block">Full Name</label>
                        <div class="bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 text-gray-800">
                            <?= Session::get("fullname") ?? "Nill" ?>
                        </div>
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-gray-600 uppercase mb-2 block">Email Address</label>
                        <div class="bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 text-gray-800">
                            <?= Session::get("email") ?? "Nill" ?>
                        </div>
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-gray-600 uppercase mb-2 block">Student ID</label>
                        <div class="bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 text-gray-800">
                            <?= Session::get("student_id") ?? "Nill" ?>
                        </div>
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-gray-600 uppercase mb-2 block">Account Type</label>
                        <div class="bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 text-gray-800">
                            <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-semibold">
                                Student
                            </span>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Achievement Section -->
            <div class="bg-white border-2 border-gray-200 rounded-lg shadow-md p-8 mb-8 opacity-50 cursor-not-allowed ">
                <div class="flex items-center mb-6 pb-4 border-b-2 border-gray-200">
                    <i class="ri-award-fill text-2xl text-orange-600 mr-3"></i>
                    <h2 class="text-2xl font-bold text-gray-900">Achievements</h2>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    
                    <div class="flex flex-col items-center p-4 bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-lg border border-yellow-200 hover:shadow-md transition-shadow">
                        <i class="ri-star-fill text-3xl text-yellow-500 mb-2"></i>
                        <p class="text-xs font-semibold text-center text-gray-700">Quiz Master</p>
                    </div>

                    <div class="flex flex-col items-center p-4 bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg border border-blue-200 hover:shadow-md transition-shadow">
                        <i class="ri-fire-fill text-3xl text-blue-500 mb-2"></i>
                        <p class="text-xs font-semibold text-center text-gray-700">Streak Warrior</p>
                    </div>

                    <div class="flex flex-col items-center p-4 bg-gradient-to-br from-green-50 to-green-100 rounded-lg border border-green-200 hover:shadow-md transition-shadow">
                        <i class="ri-hearts-fill text-3xl text-green-500 mb-2"></i>
                        <p class="text-xs font-semibold text-center text-gray-700">Quiz Lover</p>
                    </div>

                    <div class="flex flex-col items-center p-4 bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg border border-purple-200 hover:shadow-md transition-shadow">
                        <i class="ri-trophy-fill text-3xl text-purple-500 mb-2"></i>
                        <p class="text-xs font-semibold text-center text-gray-700">Top Performer</p>
                    </div>

                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col md:flex-row gap-4 justify-center mb-8">
                <a href="<?= ROOT ?>/public/students/" class="btn btn-primary flex items-center justify-center w-fit gap-2 hover:scale-105 transition-transform">
                    <i class="ri-arrow-left-line"></i> Back to Dashboard
                </a>
            </div>

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

        <script src="https://code.jquery.com/jquery-4.0.0.js"></script>
    <script src="<?= ROOT ?>\PUBLIC\ASSETS\JS\main.js"></script>
</body>
</html>