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

        </section>
    </main>

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
