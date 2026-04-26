<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty - Profile</title>
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
                    <a href="<?= ROOT ?>/public/Faculty/"
                        class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                        <i class="ri-dashboard-horizontal-fill text-[1.6em] lg:text-[1em]"></i> <span class="hidden lg:block">Dashboard</span>
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

                <a href="<?= ROOT ?>\public\Faculty\profile"
                    class="flex gap-2 justify-center item-center btn btn-primary hover:scale-105 w-fit">
                    <i class="ri-user-fill"></i> <span class="hidden lg:block">Faculty Profile</span>
                </a>

                <div class="responsive-nav-cont">
                    <i class="ri-menu-fill text-[1.7em] cursor-pointer hover:text-orange-600 md:hidden"></i>
                    <i class="ri-close-large-line text-[1.7em] cursor-pointer hover:text-orange-600 hidden"></i>
                </div>
            </div>
        </nav>

        <ul class="responsive-nav-cont backdrop-blur-md border-2 border-orange-600 w-fit p-8 flex gap-4 flex-col justify-start items-start fixed right-[5vw] rounded-lg hidden ">
            <li>
                <a class="flex justify-start items-center gap-2" href="<?= ROOT ?>/public/Faculty/"
                    class="flex gap-2 justify-center item-center text-black hover:text-blue-500 truncate">
                    <i class="ri-dashboard-horizontal-fill text-[1.6em] lg:text-[1em] "></i> Dashboard
                </a>
            </li>
        </ul>

    </header>

    <section id="hero" class="py-4 px-[5vw] min-h-screen flex flex-col items-center justify-start pt-28">
        
        <!-- Profile Container -->
        <div class="w-full max-w-4xl">
            
            <!-- Profile Header Card -->
            <div class="border-2 rounded-lg shadow-lg p-8 mb-8">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    
                    <!-- Profile Avatar -->
                    <div class="flex-shrink-0">
                        <div class="w-32 h-32 object-cover bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center shadow-lg" src="<?= ROOT ?>/public/assets/images/default-avatar.png" alt="Profile Avatar">
                        </div>
                    </div>
                    
                    <!-- Profile Info -->
                    <div class="flex-grow text-center md:text-left">
                        <h1 class="text-[clamp(2em,3vw,3em)] font-bold text-gray-900 mb-2"><?= Session::get("fullname") ?></h1>
                        <div class="flex gap-4 justify-center md:justify-start">
                            <span class="inline-block bg-orange-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">
                                <i class="ri-user-check-line"></i> Faculty
                            </span>
                            <span class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">
                                <i class="ri-id-card-line"></i> ID: <?= Session::get("student_id") ?? Session::get("user_id") ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Action Buttons -->
            <div class="flex flex-col md:flex-row gap-4 justify-center mb-8">
                <a href="<?= ROOT ?>/public/Faculty/" class="btn btn-primary flex items-center justify-center w-fit gap-2 hover:scale-105 transition-transform">
                    <i class="ri-arrow-left-line"></i> Back to Dashboard
                </a>
            </div>

        </div>

    </section>


    <script src="https://code.jquery.com/jquery-4.0.0.js"></script>
    <script src="<?= ROOT ?>\PUBLIC\ASSETS\JS\main.js"></script>
</body>
</html>