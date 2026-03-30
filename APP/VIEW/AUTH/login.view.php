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
    <style>
        .field-error {
            display: none;
            color: #dc2626;
            font-size: 0.8em;
            margin-top: 4px;
        }

        .input-invalid {
            border-color: #dc2626 !important;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            20% {
                transform: translateX(-8px);
            }

            40% {
                transform: translateX(8px);
            }

            60% {
                transform: translateX(-5px);
            }

            80% {
                transform: translateX(5px);
            }
        }

        .shake {
            animation: shake 0.4s ease;
        }
    </style>
</head>

<body class="text-[clamp(0.8rem,1.3vw,0.9rem)]">
    <section class="mt-[2vh] px-[10vw] p-4 flex flex-col justify-center items-center">
        <h3 class="uppercase text-[clamp(0.8em,1.5vw,1em)]">login</h3>
        <h1 class="text-center mb-[-1em] text-[clamp(2em,3.4vw,2.8em)] flex justify-center items-center gap-4">Welcome
            Back to</h1>
        <h1 class="text-center mb-[-1em] text-[clamp(2em,3.4vw,2.8em)] flex justify-center items-center gap-4">
            <img class="size-[clamp(3em,5vw,7vw)]" src="<?= ROOT ?>\PUBLIC\ASSETS\imgs\logo.png"
                alt="Quiz Tracker Logo"> Account
        </h1>

        <form id="login-form" action="<?= ROOT ?>/public/auth/login" method="post"
            class="mt-4 relative border-2 pb-8 bg-white border-black flex flex-col gap-2 p-4 rounded-lg" novalidate>

            <a href="<?= ROOT ?>/public/home" class="hover:text-orange-600">
                <i class="ri-close-circle-line absolute text-[1.5em] right-2 top-0 z-50"></i>
            </a>

            <!-- Username -->
            <div class="fields p-2 relative rounded-lg">
                <label class="uppercase font-bold" for="username">
                    <i class="ri-edit-box-fill"></i> Username :
                </label>
                <input class="w-full h-full outline-none bg-transparent border-b-2 pb-2 mt-2 border-orange-600"
                    type="text" name="username" id="username" placeholder="Enter your username...">
                <span class="field-error" id="error-username"></span>
            </div>

            <!-- Password -->
            <div class="fields p-2 relative rounded-lg">
                <label class="uppercase font-bold" for="password">
                    <i class="ri-lock-password-fill"></i> Password :
                </label>
                <input class="w-full h-full outline-none bg-transparent border-b-2 pb-2 mt-2 border-orange-600"
                    type="password" name="password" id="password" placeholder="Enter your password...">
                <span class="field-error" id="error-password"></span>
            </div>

            <!-- Register link -->
            <!-- Global server error (like-  Invalid credentials) -->
            <span class="field-error text-center" id="error-global"></span>

            <button type="submit" class="btn btn-primary w-full mt-4">
                <i class="ri-login-circle-fill"></i> Login
            </button>
            <div class="signup-link flex flex-col justify-center items-center gap-2">
                <h4>Don't have an account?</h4>
                <a class="text-blue-800 text-center" href="<?= ROOT ?>/public/page/register">Register here</a>
            </div>

        </form>
    </section>

    <script src="https://code.jquery.com/jquery-4.0.0.js"></script>
    <script>
        $(function () {

            const $form = $('#login-form');
            const $submitBtn = $form.find('button[type="submit"]');

            // Validation rules 
            const rules = {
                username: [
                    { test: v => v.length > 0, msg: 'Username is required.' },
                    { test: v => v.length >= 3, msg: 'Username must be at least 3 characters.' }
                ],
                password: [
                    { test: v => v.length > 0, msg: 'Password is required.' },
                    { test: v => v.length >= 6, msg: 'Password must be at least 6 characters.' }
                ]
            };

            // Server error map (mirrors PHP controller strings) 
            const serverErrorMap = {
                'Invalid credentials': { field: 'global', msg: 'Incorrect username or password.' },
                'username and password required': { field: 'global', msg: 'Please fill in all fields.' },
                'Method not allowed': { field: 'global', msg: 'Invalid request. Please refresh and try again.' },
                'Cookie error. Please try again.': { field: 'global', msg: 'Login failed. Please try again.' },
                'Unauthorized': { field: 'global', msg: 'Session expired. Please log in again.' }
            };

            // Validate one field 
            function validateField(id) {
                const $input = $('#' + id);
                const $error = $('#error-' + id);
                const value = $input.val().trim();

                for (const rule of rules[id]) {
                    if (!rule.test(value)) {
                        $input.addClass('input-invalid');
                        $error.text(rule.msg).show();
                        return false;
                    }
                }

                $input.removeClass('input-invalid');
                $error.text('').hide();
                return true;
            }

            // Show a field or global error 
            function showError(fieldId, msg) {
                if (fieldId === 'global') {
                    $('#error-global').text(msg).show();
                } else {
                    $('#' + fieldId).addClass('input-invalid');
                    $('#error-' + fieldId).text(msg).show();
                    $('#' + fieldId)[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }

            // Clear all errors 
            function clearAllErrors() {
                Object.keys(rules).forEach(function (id) {
                    $('#' + id).removeClass('input-invalid');
                    $('#error-' + id).text('').hide();
                });
                $('#error-global').text('').hide();
            }

            // Handle server error message ─
            function handleServerError(msg) {
                const mapped = serverErrorMap[msg];
                if (mapped) {
                    showError(mapped.field, mapped.msg);
                } else {
                    showError('global', msg);
                }
                shakeForm();
            }

            // Shake the form 
            function shakeForm() {
                $form.removeClass('shake');
                void $form[0].offsetWidth;
                $form.addClass('shake');
            }

            // Live validation ─
            Object.keys(rules).forEach(function (id) {
                $('#' + id).on('input blur', function () { validateField(id); });
            });

            // Form submit 
            $form.on('submit', function (e) {
                e.preventDefault();
                clearAllErrors();

                // 1. Client-side validation
                const fieldIds = Object.keys(rules);
                const results = fieldIds.map(id => validateField(id));
                const allValid = results.every(Boolean);

                if (!allValid) {
                    shakeForm();
                    $('#' + fieldIds[results.indexOf(false)])[0]
                        .scrollIntoView({ behavior: 'smooth', block: 'center' });
                    return;
                }

                // 2. AJAX submit

                $.ajax({
                    url: $form.attr('action'),
                    method: 'POST',
                    dataType: 'json',
                    data: $form.serialize(),

                    success: function (response) {
                        if (response && response.msg === 'success') {
                            // AuthMiddleware::handle() inside the dashboard
                            // will validate the JWT cookie from here on
                            window.location.href = '<?= ROOT ?>/public/students';
                            return;
                        }
                        if (response && response.msg) {
                            handleServerError(response.msg);
                        }
                    },

                    error: function (xhr) {
                        try {
                            const body = JSON.parse(xhr.responseText);
                            if (body && body.msg) {
                                handleServerError(body.msg);
                                return;
                            }
                        } catch (_) { }

                        showError('global', 'Something went wrong. Please try again.');
                        shakeForm();
                    }
                });
            });

        });
    </script>
</body>

</html>