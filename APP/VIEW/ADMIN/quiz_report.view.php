<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard</title>
    <link rel="shortcut icon" href="<?= ROOT ?>\PUBLIC\ASSETS\imgs\favicon.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css" rel="stylesheet" />
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
                    <a href="<?= ROOT ?>/public/Admin/"
                        class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                        <i class="ri-dashboard-horizontal-fill text-[1.6em] lg:text-[1em]"></i> <span class="hidden lg:block">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?= ROOT ?>/public/Admin/report"
                        class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                        <i class="ri-a-b text-[1.6em] lg:text-[1em]"></i> <span class="hidden lg:block">Quiz Report</span>
                    </a>
                </li>
                <li>
                    <a href="<?= ROOT ?>/public/Admin/usermanagement"
                        class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                        <i class="ri-bar-chart-fill text-[1.6em] lg:text-[1em]"></i> <span class="hidden lg:block">User Management</span>
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

                <a href="<?= ROOT ?>\public\Admin\profile"
                    class="flex gap-2 justify-center item-center btn btn-primary hover:scale-105 w-fit">
                    <i class="ri-user-fill"></i> <span class="hidden lg:block">Admin Profile</span>
                </a>

                <div class="responsive-nav-cont">
                    <i class="ri-menu-fill text-[1.7em] cursor-pointer hover:text-orange-600 md:hidden"></i>
                    <i class="ri-close-large-line text-[1.7em] cursor-pointer hover:text-orange-600 hidden"></i>
                </div>
            </div>
        </nav>

        <ul class="responsive-nav-cont backdrop-blur-md border-2 border-orange-600 w-fit p-8 flex gap-4 flex-col justify-start items-start fixed right-[5vw] rounded-lg hidden ">
            <li>
                <a class="flex justify-start items-center gap-2" href="<?= ROOT ?>/public/Admin/"
                    class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                    <i class="ri-dashboard-horizontal-fill text-[1.6em] lg:text-[1em] "></i> Dashboard
                </a>
            </li>
            <li>
                <a class="flex justify-start items-center gap-2" href="<?= ROOT ?>/public/Admin/report"
                    class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                    <i class="ri-a-b text-[1.6em] lg:text-[1em] "></i> Quiz Report
                </a>
            </li>
            <li>
                <a class="flex justify-start items-center gap-2" href="<?= ROOT ?>/public/Admin/usermanagement"
                    class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                    <i class="ri-bar-chart-fill text-[1.6em] lg:text-[1em] "></i> User Management
                </a>
            </li>
        </ul>

    </header>

    <main class="pt-28 px-[5vw]">
        <section class="max-w-6xl mx-auto border-2 rounded-lg p-10 bg-white mb-20">
            <h1 class="text-4xl font-bold text-white bg-orange-600 text-center py-5 px-5 rounded mb-8 tracking-wide">Quiz Report</h1>

            <!-- First Report Card -->
            <div class=" p-6 mb-8 rounded-lg hover:shadow-md transition-shadow duration-200 last:mb-0">
                <div class="text-2xl font-semibold text-black pb-3 mb-5 border-b-4 border-orange-600">Most played quiz category</div>
                <h2 class="text-2xl mb-5 text-center"><?= $mostPlayed['category'] ?></h2>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse bg-white rounded overflow-hidden">
                        <thead class="bg-orange-50">
                            <tr>
                                <th class="px-4 py-3.5 text-left font-semibold text-black border-b-2 border-gray-800 text-sm tracking-wide">Difficulty</th>
                                <th class="px-4 py-3.5 text-left font-semibold text-black border-b-2 border-gray-800 text-sm tracking-wide">max.marks</th>
                                <th class="px-4 py-3.5 text-left font-semibold text-black border-b-2 border-gray-800 text-sm tracking-wide">min.marks</th>
                                <th class="px-4 py-3.5 text-left font-semibold text-black border-b-2 border-gray-800 text-sm tracking-wide">average.marks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($statsMostPlayed as $stat): ?>
                            <tr class="hover:bg-orange-100 transition-colors duration-150">
                                <td class="px-4 py-3 border-b border-gray-300 text-black text-sm"><?= $stat['difficulty'] ?></td>
                                <td class="px-4 py-3 border-b border-gray-300 text-black text-sm"><?= round($stat['max_marks'], 2) ?></td>
                                <td class="px-4 py-3 border-b border-gray-300 text-black text-sm"><?= round($stat['min_marks'], 2) ?></td>
                                <td class="px-4 py-3 border-b border-gray-300 text-black text-sm"><?= $stat['average_marks'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Second Report Card -->
            <div class=" p-6 rounded-lg hover:shadow-md transition-shadow duration-200">
                <div class="text-2xl font-semibold text-black pb-3 mb-5 border-b-4 border-orange-600">Least played quiz category</div>
                <h2 class="text-2xl mb-5 text-center"><?= $leastPlayed['category'] ?></h2>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse bg-white rounded overflow-hidden">
                        <thead class="bg-orange-50">
                            <tr>
                                <th class="px-4 py-3.5 text-left font-semibold text-black border-b-2 border-gray-800 text-sm tracking-wide">Difficulty</th>
                                <th class="px-4 py-3.5 text-left font-semibold text-black border-b-2 border-gray-800 text-sm tracking-wide">max.marks</th>
                                <th class="px-4 py-3.5 text-left font-semibold text-black border-b-2 border-gray-800 text-sm tracking-wide">min.marks</th>
                                <th class="px-4 py-3.5 text-left font-semibold text-black border-b-2 border-gray-800 text-sm tracking-wide">average.marks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($statsLeastPlayed as $stat): ?>
                            <tr class="hover:bg-orange-100 transition-colors duration-150">
                                <td class="px-4 py-3 border-b border-gray-300 text-black text-sm"><?= $stat['difficulty'] ?></td>
                                <td class="px-4 py-3 border-b border-gray-300 text-black text-sm"><?= round($stat['max_marks'], 2) ?></td>
                                <td class="px-4 py-3 border-b border-gray-300 text-black text-sm"><?= round($stat['min_marks'], 2) ?></td>
                                <td class="px-4 py-3 border-b border-gray-300 text-black text-sm"><?= $stat['average_marks'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

    <script src="https://code.jquery.com/jquery-4.0.0.js"></script>
    <script src="<?= ROOT ?>\PUBLIC\ASSETS\JS\main.js"></script>
</body>
</html>
