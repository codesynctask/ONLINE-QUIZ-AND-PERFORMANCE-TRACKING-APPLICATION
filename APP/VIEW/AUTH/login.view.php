<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        <h3 class="uppercase text-[clamp(0.8em,1.5vw,1em)]">Authentication</h3>
        <h1 class="text-center mb-[-1em] text-[clamp(2em,3.4vw,2.8em)] flex justify-center items-center gap-4"> Welcome Back to</h1>
        <h1 class="text-center mb-[-1em] text-[clamp(2em,3.4vw,2.8em)] flex justify-center items-center gap-4"><img class="size-[clamp(3em,5vw,7vw)] " src="<?= ROOT ?>\PUBLIC\ASSETS\imgs\logo.png" alt="Quiz Tracker Logo"> Account</h1>
        <form action="<?= ROOT ?>/public/auth/login" method="post" class="mt-4 relative border-2 pb-8 bg-white border-black flex flex-col  gap-2 p-4 rounded-lg mt-4">
            <a href="<?=ROOT?>/public/home" class=" hover:text-orange-600"><i class="ri-close-circle-line absolute text-[1.5em] right-2 top-0 z-50"></i></a>
            <div class="fields p-2 relative rounded-lg">
                <label class="uppercase font-bold" for="username"><i class="ri-edit-box-fill"></i> Username :</label>
                <input class="w-full h-full outline-none bg-transparent border-b-2 pb-2 mt-2 border-orange-600" type="text" name="username" id="username" placeholder="Enter your unique username...">
            </div>
            <div class="fields p-2 relative rounded-lg">
                <label class="uppercase font-bold" for="password"><i class="ri-lock-password-fill"></i> password :</label>
                <input class="w-full h-full outline-none bg-transparent border-b-2 pb-2 mt-2 border-orange-600" type="password" name="password" id="password" placeholder="Enter your unique username...">
            </div>
            <div class="fields p-2 relative rounded-lg">
                <label class="uppercase font-bold" for="confirm_password"><i class="ri-lock-password-fill"></i> confirm password :</label>
                <input class="w-full h-full outline-none bg-transparent border-b-2 pb-2 mt-2 border-orange-600" type="password" id="confirm_password" placeholder="Enter your unique username...">
            </div>


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

                <div class="signup-link ">
                    <h4>Don't have an account?</h4>
                    <a class="text-blue-800 text-center" href="<?= ROOT ?>/public/page/register">register here</a>
                </div>
            </div>

            <button class="btn btn-primary w-full mt-4"><i class="ri-login-circle-fill"></i> Login</button>
        </form>
    </section>
</body>
</html>