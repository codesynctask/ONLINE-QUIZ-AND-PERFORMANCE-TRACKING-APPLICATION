<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

<body>
    <section class="mt-[2vh] px-[10vw] p-4 flex flex-col  justify-center items-center">
        <h3 class="uppercase">Authentication</h3>
        <h1 class="text-[3em] flex justify-center items-center gap-4">Create Your <img class="size-[100px] " src="<?= ROOT ?>\PUBLIC\ASSETS\imgs\logo.png" alt="Quiz Tracker Logo"> Account</h1>
        <form class="border-2 pb-8 bg-white border-black flex flex-col  gap-2 p-4 rounded-lg mt-4">
            <div class="fields p-2 relative rounded-lg">
                <label class="uppercase font-bold" for="username">Username :</label>
                <input class="w-full h-full outline-none bg-transparent border-b-2 pb-2 mt-2 border-orange-600" type="text" name="username" id="username" placeholder="Enter your unique username...">
            </div>
            <div class="fields p-2 relative rounded-lg">
                <label class="uppercase font-bold" for="fullname">Full Name :</label>
                <input class="w-full h-full outline-none bg-transparent border-b-2 pb-2 mt-2 border-orange-600" type="text" name="fullname" id="fullname" placeholder="Enter your unique username...">
            </div>
            <div class="fields p-2 relative rounded-lg">
                <label class="uppercase font-bold" for="password">password :</label>
                <input class="w-full h-full outline-none bg-transparent border-b-2 pb-2 mt-2 border-orange-600" type="text" name="password" id="password" placeholder="Enter your unique username...">
            </div>
            <div class="fields p-2 relative rounded-lg">
                <label class="uppercase font-bold" for="confirm_password">confirm password :</label>
                <input class="w-full h-full outline-none bg-transparent border-b-2 pb-2 mt-2 border-orange-600" type="text" id="confirm_password" placeholder="Enter your unique username...">
            </div>

            <button class="btn btn-primary w-full mt-4">Register</button>

            <div class="fields flex justify-between">
                <div class="flex items-center gap-2 mt-3">
                    <input 
                        type="checkbox" 
                        id="remember" 
                        name="remember"
                        class="w-4 h-4 accent-blue-500 cursor-pointer"
                    >
                    <label for="remember" class="text-sm cursor-pointer">
                        Remember Me
                    </label>
                </div>

                <div class="login-link">
                    <h4>Already have an Account?</h4>
                    <a href="<?= ROOT ?>/public/page/login">Login here</a>
                </div>
            </div>
        </form>
    </section>
</body>
</html>