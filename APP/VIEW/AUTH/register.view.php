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

<body class="text-[clamp(0.8rem,1.3vw,0.9rem)]">
    <section class="mt-[2vh] px-[10vw] p-4 flex flex-col  justify-center items-center">
        <h3 class="uppercase text-[clamp(0.8em,1.5vw,1em)]">Authentication</h3>
        <h1 class="text-center mb-[-1em] text-[clamp(2em,3.4vw,2.8em)] flex justify-center items-center gap-4">Create Your</h1>
        <h1 class="text-center mb-[-1em] text-[clamp(2em,3.4vw,2.8em)] flex justify-center items-center gap-4"><img class="size-[clamp(3em,5vw,7vw)] " src="<?= ROOT ?>\PUBLIC\ASSETS\imgs\logo.png" alt="Quiz Tracker Logo"> Account</h1>
        <form method="post" action="<?= ROOT ?>/PUBLIC/auth/register" class="mt-4 relative border-2 pb-8 bg-white border-black flex flex-col  gap-2 p-4 rounded-lg mt-4">
            <a href="<?=ROOT?>/public/home" class=" hover:text-orange-600"><i class="ri-close-circle-line absolute text-[1.5em] right-2 top-0 z-50"></i></a>
            <div class="fields p-2 relative rounded-lg">
                <label class="uppercase font-bold" for="username"><i class="ri-edit-box-fill"></i> Username :</label>
                <input required class="w-full h-full outline-none bg-transparent border-b-2 pb-2 mt-2 border-orange-600" type="text" name="username" id="username" placeholder="Enter your unique username...">
            </div>
            <div class="fields p-2 relative rounded-lg">
                <label class="uppercase font-bold" for="fullname"><i class="ri-input-method-fill"></i> Full Name :</label>
                <input required class="w-full h-full outline-none bg-transparent border-b-2 pb-2 mt-2 border-orange-600" type="text" name="fullname" id="fullname" placeholder="Enter your unique username...">
            </div>
            <div class="fields p-2 relative rounded-lg">
                <label class="uppercase font-bold" for="password"><i class="ri-lock-password-fill"></i> password :</label>
                <input required class="w-full h-full outline-none bg-transparent border-b-2 pb-2 mt-2 border-orange-600" type="text" name="password" id="password" placeholder="Enter your unique username...">
            </div>

            <div class="fields p-2 relative rounded-lg">
                <label class="uppercase font-bold" for="confirm_password"><i class="ri-lock-password-fill"></i> confirm password :</label>
                <input required class="w-full h-full outline-none bg-transparent border-b-2 pb-2 mt-2 border-orange-600" type="text" id="confirm_password" placeholder="Enter your unique username...">
            </div>
            
            <button class="btn btn-primary w-full mt-4"><i class="ri-login-circle-fill"></i> Register</button>
            <div class="login-link flex flex-col justify-center items-center">
                <h4>Already have an Account?</h4>
                <a class="text-blue-800" href="<?= ROOT ?>/public/page/login">Login here</a>
            </div>

        </form>
    </section>
</body>
</html>