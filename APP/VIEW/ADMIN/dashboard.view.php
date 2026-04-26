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
        <section class="max-w-6xl mx-auto">
            <h1 class="text-3xl font-bold mb-4">Admin Dashboard</h1>
            <p class="mb-6">Welcome, <?= Session::get("fullname") ?></p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="p-4 bg-white rounded-lg shadow">
                    <h3 class="text-sm text-gray-500">Total Users</h3>
                    <p class="text-2xl font-bold"><?= isset($counts['users']) ? $counts['users'] : 0 ?></p>
                </div>
                <div class="p-4 bg-white rounded-lg shadow">
                    <h3 class="text-sm text-gray-500">Total Quizzes</h3>
                    <p class="text-2xl font-bold"><?= isset($counts['quizzes']) ? $counts['quizzes'] : 0 ?></p>
                </div>
                <div class="p-4 bg-white rounded-lg shadow">
                    <h3 class="text-sm text-gray-500">Total Results</h3>
                    <p class="text-2xl font-bold"><?= isset($counts['results']) ? $counts['results'] : 0 ?></p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-4">
                <h2 class="text-xl font-semibold mb-2">Top Students (Leaderboard)</h2>
                <?php if (!empty($leaderboard)): ?>
                <div class="w-full overflow-x-auto rounded-xl shadow-md p-4">
                    <table class="w-full m-auto text-left border-collapse">
                        <thead>
                            <tr class="bg-black text-white text-center">
                                <th class="py-3 px-4">Rank</th>
                                <th class="py-3 px-4 text-left">Student Name</th>
                                <th class="py-3 px-4">Quizzes Taken</th>
                                <th class="py-3 px-4">Best Score</th>
                                <th class="py-3 px-4">Avg Percentage</th>
                            </tr>
                        </thead>
                        <tbody class="text-[clamp(1rem,1.5vw,1.3rem)]">
                            
                            <?php
                                $prev_avg = null;
                                $prev_rank = 0;
                            ?>

                            <?php foreach ($leaderboard as $index => $row): ?>
                            <?php
                                $position = $index + 1;
                                $avg = isset($row['avg_percentage']) ? (float)$row['avg_percentage'] : null;

                                // Tie ranking logic
                                if ($prev_avg !== null && $avg === $prev_avg) {
                                    $display_rank = $prev_rank;
                                } else {
                                    $display_rank = $position;
                                }

                                // Medal logic
                                $medal = match($display_rank) {
                                    1 => "🥇",
                                    2 => "🥈",
                                    3 => "🥉",
                                    default => $display_rank
                                };

                                // Row color
                                $rowClass = match($display_rank) {
                                    1 => "bg-green-300 font-semibold",
                                    2 => "bg-green-200 font-semibold",
                                    3 => "bg-green-100 font-semibold",
                                    default => "bg-white hover:bg-gray-50"
                                };

                                $prev_avg = $avg;
                                $prev_rank = $display_rank;
                            ?>

                            <tr class="<?= $rowClass ?> border-b text-center transition">
                                <td class="py-3 px-4"><?= $medal ?></td>
                                <td class="py-3 px-4 text-left"><?= htmlspecialchars($row['user_name']) ?></td>
                                <td class="py-3 px-4"><?= $row['total_quizzes'] ?></td>
                                <td class="py-3 px-4"><?= $row['best_score'] ?></td>
                                <td class="py-3 px-4"><?= $row['avg_percentage'] ?>%</td>
                            </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <?php else: ?>
                <div class="flex flex-col items-center gap-3 mt-10 text-gray-400">
                    <i class="ri-bar-chart-fill text-6xl"></i>
                    <p class="text-lg font-medium">
                        No leaderboard data available yet.
                    </p>
                </div>
                <?php endif; ?>
            </div>

        </section>
    </main>

    <script src="https://code.jquery.com/jquery-4.0.0.js"></script>
    <script src="<?= ROOT ?>\PUBLIC\ASSETS\JS\main.js"></script>
</body>
</html>
