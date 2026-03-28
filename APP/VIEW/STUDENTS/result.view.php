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
                    <a 
                        href="<?= ROOT ?>/public/students/"
                        class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                        <i class="ri-dashboard-horizontal-fill text-[1.6em] lg:text-[1em]"></i> <span class="hidden lg:block">Dashboard</span> 
                    </a>
                </li>
                <li>
                    <a 
                        href="<?= ROOT ?>/public/students/result"
                        class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                        <i class="ri-a-b text-[1.6em] lg:text-[1em]"></i> <span class="hidden lg:block">Result</span> 
                    </a>
                </li>
                <li>
                    <a 
                        href="<?= ROOT ?>/public/students/leaderboard"
                        class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                        <i class="ri-bar-chart-fill text-[1.6em] lg:text-[1em]"></i> <span class="hidden lg:block">Leaderboard</span> 
                    </a>
                </li>
            </ul>

            <div class="cta-buttons flex justify-between items-center gap-2 p-2 ">
                <a 
                    href="<?= ROOT ?>\public\auth\logout"
                    class="flex gap-2 justify-center item-center bg-white btn hover:scale-105 w-fit">
                    <i class="ri-logout-box-line"></i> <span class="hidden lg:block">Logout</span>  
                </a>
                <a 
                    href="<?= ROOT ?>\public\students\profile"
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
            <!-- TODO : with jQuery make it toggle on menu icon click  -->
            <li>
                <a 
                    href="<?= ROOT ?>/public/students "
                    class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                    <i class="ri-dashboard-horizontal-fill text-[1.6em] lg:text-[1em] "></i> Home
                </a>
            </li>
            <li>
                <a 
                    href="<?= ROOT ?>/public/students/result"
                    class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                    <i class="ri-a-b text-[1.6em] lg:text-[1em] "></i> Result
                </a>
            </li>
            <li>
                <a 
                    href="<?= ROOT ?>/public/students/leaderboard"
                    class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                    <i class="ri-bar-chart-fill text-[1.6em] lg:text-[1em] "></i> Leaderboard
                </a>
            </li>
        </ul>

    </header>

<section id="hero" class="py-4 px-[5vw] min-h-screen flex flex-col items-center justify-start pt-28">

<!-- Result cont -->
    <div class="w-full  h-content  rounded-3xl p-1 rounded-[22px]  flex flex-col md:flex-row justify-center items-center p-4">

        <!-- top img -->
        <div class=" rounded-3xl px-6 pt-8 text-center relative overflow-hidden">
            <p class="relative z-10 text-purple-700 text-sm font-semibold uppercase tracking-widest mb-1">Quiz Complete</p>
            <div class="relative z-10 mt-4 flex justify-center">
                <img src="<?= ROOT ?>\PUBLIC\ASSETS\imgs\result-header.png" class="w-[30vw] max-w-[250px] min-w-[150px] drop-shadow-lg">
            </div>
        </div>

        <!-- White overlap card -->
        <div class=" mx-4 bg-white rounded-2xl shadow-xl p-6 relative z-10 w-[40vw] w-full max-w-[450px] min-w-fit my-8">

            <!-- Share button -->
            <button class="absolute top-4 right-4 w-9 h-9 bg-purple-50 hover:bg-purple-100 rounded-full flex items-center justify-center transition-colors">
                <i class="ri-share-forward-line text-purple-500"></i>
            </button>

            <!-- Congrats -->
            <div class="text-center mb-5">
                <span class="btn btn-primary ">
                    Excellent!
                </span>
                <h2 class="text-[clamp(1.8em,3.8vw,5.5vw)] font-black text-gray-900 mt-2">Congratulations!</h2>
                <p class="text-gray-400 font-semibold mt-1">
                    You've scored <span class="text-orange-600 font-black text-lg">+<?= $data["result"]["marks"] ?></span> points
                </p>
            </div>

            <!-- Stats row -->
            <div class="grid grid-cols-3 gap-2">
                <div class="flex flex-col items-center gap-1 bg-purple-50 rounded-2xl py-4">
                    <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center">
                        <span class="text-purple-600 font-black text-sm">Q</span>
                    </div>
                    <span class="text-2xl font-black text-gray-900">10</span>
                    <span class="text-xs text-gray-400 font-bold">Total Que</span>
                </div>
                <div class="flex flex-col items-center gap-1 bg-green-50 rounded-2xl py-4">
                    <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
                        <i class="ri-checkbox-circle-fill text-green-500"></i>
                    </div>
                    <span class="text-2xl font-black text-green-600"><?= $data["result"]["marks"] ?></span>
                    <span class="text-xs text-gray-400 font-bold">Correct</span>
                </div>
                <div class="flex flex-col items-center gap-1 bg-red-50 rounded-2xl py-4">
                    <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center">
                        <i class="ri-close-circle-fill text-red-500"></i>
                    </div>
                    <span class="text-2xl font-black text-red-500"><?= 10 - $data["result"]["marks"] ?></span>
                    <span class="text-xs text-gray-400 font-bold">Wrong</span>
                </div>
            </div>

            <!-- Meta info -->
            <div class="flex justify-between mt-4 px-2 text-xs text-gray-400 font-semibold">
                <span><i class="ri-bookmark-fill text-purple-400 mr-1"></i>Category: <span class="text-gray-600"><?= $data["category_name"] ?></span></span>
                <span><i class="ri-bar-chart-fill text-purple-400 mr-1"></i>Difficulty: <span class="text-gray-600"><?= $data["difficulty"] ?></span></span>
            </div>
        </div>

    </div>
    <!-- Answer Review -->
    <div class="overflow-x-auto">
        <table class="w-[80vw] border border-gray-300 border-collapse text-left">
            
            <thead class="bg-orange-600 text-white">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Q.No.</th>
                    <th class="border border-gray-300 px-4 py-2">Question</th>
                    <th class="border border-gray-300 px-4 py-2">Correct Answer</th>
                    <th class="border border-gray-300 px-4 py-2">Selected Answer</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                </tr>
            </thead>

            <tbody>
        <?php
        for ($i = 0; $i < count($data["quiz_file_questions"]); $i++) {

            $correct = trim(html_entity_decode($data['quiz_file_questions'][$i]['correct_answer']));
            $selected = trim(html_entity_decode($data['all_selected_options'][$i]));

            echo "
            <tr class='odd:bg-white even:bg-gray-50 hover:bg-gray-200'>
                <td class='border border-gray-300 px-4 py-2'>" . ($i + 1) . "</td>
                <td class='border border-gray-300 px-4 py-2'>{$data['quiz_file_questions'][$i]['question']}</td>
                <td class='border border-gray-300 px-4 py-2'>{$correct}</td>
                <td class='border border-gray-300 px-4 py-2'>{$selected}</td>
                <td class='border border-gray-300 px-4 py-2 font-semibold'>" .
                    (strtolower($correct) == strtolower($selected)
                        ? "<span class='text-green-600'>Pass</span>"
                        : "<span class='text-red-600'>Fail</span>"
                    ) .
                "</td>
            </tr>";
        }


            ?>
            </tbody>

        </table>
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
</body>
</html>