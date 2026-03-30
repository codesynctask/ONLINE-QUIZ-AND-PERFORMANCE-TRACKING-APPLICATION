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
    <style>
        /* Error message injected under each field */
        .field-error {
            display: none;
            color: #dc2626;
            font-size: 0.8em;
            margin-top: 4px;
        }

        /* Red bottom border on invalid field */
        .input-invalid {
            border-color: #dc2626 !important;
        }

        /* Shake animation on failed submit */
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%       { transform: translateX(-8px); }
            40%       { transform: translateX(8px); }
            60%       { transform: translateX(-5px); }
            80%       { transform: translateX(5px); }
        }

        .shake {
            animation: shake 0.4s ease;
        }
    </style>
</head>

<body class="text-[clamp(0.8rem,1.3vw,0.9rem)]">
    <section class="mt-[2vh] px-[10vw] p-4 flex flex-col  justify-center items-center">
        <h3 class="uppercase text-[clamp(0.8em,1.5vw,1em)]">Register</h3>
        <h1 class="text-center mb-[-1em] text-[clamp(2em,3.4vw,2.8em)] flex justify-center items-center gap-4">Create Your</h1>
        <h1 class="text-center mb-[-1em] text-[clamp(2em,3.4vw,2.8em)] flex justify-center items-center gap-4"><img class="size-[clamp(3em,5vw,7vw)] " src="<?= ROOT ?>\PUBLIC\ASSETS\imgs\logo.png" alt="Quiz Tracker Logo"> Account</h1>
        <form id="register-form" method="post" action="<?= ROOT ?>/PUBLIC/auth/register" class="mt-4 relative border-2 pb-8 bg-white border-black flex flex-col  gap-2 p-4 rounded-lg mt-4" novalidate>
            <a href="<?=ROOT?>/public/home" class=" hover:text-orange-600"><i class="ri-close-circle-line absolute text-[1.5em] right-2 top-0 z-50"></i></a>

            <div class="fields p-2 relative rounded-lg">
                <label class="uppercase font-bold" for="username"><i class="ri-edit-box-fill"></i> Username :</label>
                <input class="w-full h-full outline-none bg-transparent border-b-2 pb-2 mt-2 border-orange-600" type="text" name="username" id="username" placeholder="Enter your unique username...">
                <span class="field-error" id="error-username"></span>
            </div>

            <div class="fields p-2 relative rounded-lg">
                <label class="uppercase font-bold" for="fullname"><i class="ri-input-method-fill"></i> Full Name :</label>
                <input class="w-full h-full outline-none bg-transparent border-b-2 pb-2 mt-2 border-orange-600" type="text" name="fullname" id="fullname" placeholder="Enter your full name...">
                <span class="field-error" id="error-fullname"></span>
            </div>

            <div class="fields p-2 relative rounded-lg">
                <label class="uppercase font-bold" for="password"><i class="ri-lock-password-fill"></i> password :</label>
                <input class="w-full h-full outline-none bg-transparent border-b-2 pb-2 mt-2 border-orange-600" type="password" name="password" id="password" placeholder="Enter your password...">
                <span class="field-error" id="error-password"></span>
            </div>

            <div class="fields p-2 relative rounded-lg">
                <label class="uppercase font-bold" for="confirm_password"><i class="ri-lock-password-fill"></i> confirm password :</label>
                <input class="w-full h-full outline-none bg-transparent border-b-2 pb-2 mt-2 border-orange-600" type="password" id="confirm_password" placeholder="Re-enter your password...">
                <span class="field-error" id="error-confirm_password"></span>
            </div>
            
            <button type="submit" class="btn btn-primary w-full mt-4"><i class="ri-login-circle-fill"></i> Register</button>
            <div class="login-link flex flex-col justify-center items-center">
                <h4>Already have an Account?</h4>
                <a class="text-blue-800" href="<?= ROOT ?>/public/page/login">Login here</a>
            </div>

        </form>
    </section>

    <script src="https://code.jquery.com/jquery-4.0.0.js"></script>
    <script>
    $(function () {

        const $form      = $('#register-form');
        const $submitBtn = $form.find('button[type="submit"]');

        // Validation rules
        const rules = {
            username: [
                { test: v => v.length > 0,                msg: 'Username is required.' },
                { test: v => v.length >= 3,               msg: 'Username must be at least 3 characters.' },
                { test: v => /^[a-zA-Z0-9_]+$/.test(v),  msg: 'Only letters, numbers, and underscores allowed.' }
            ],
            fullname: [
                { test: v => v.length > 0,                msg: 'Full name is required.' },
                { test: v => v.length >= 2,               msg: 'Full name must be at least 2 characters.' },
                { test: v => /^[a-zA-Z\s]+$/.test(v),    msg: 'Full name may only contain letters and spaces.' }
            ],
            password: [
                { test: v => v.length > 0,                msg: 'Password is required.' },
                { test: v => v.length >= 6,               msg: 'Password must be at least 6 characters.' },
                { test: v => /[A-Z]/.test(v),             msg: 'Must contain at least one uppercase letter.' },
                { test: v => /[0-9]/.test(v),             msg: 'Must contain at least one number.' }
            ],
            confirm_password: [
                { test: v => v.length > 0,                       msg: 'Please confirm your password.' },
                { test: v => v === $('#password').val().trim(),  msg: 'Passwords do not match.' }
            ]
        };

        // Server error map (mirrors exact PHP controller strings)
        const serverErrorMap = {
            'missing fields':     { field: 'username', msg: 'All fields are required.' },
            'Duplicated entries': { field: 'username', msg: 'This username is already taken.' },
            'Password too short': { field: 'password', msg: 'Password must be at least 6 characters.' },
            'Method not allowed': { field: 'username', msg: 'Invalid request. Please refresh and try again.' }
        };

        // Validate one field, return true if valid
        function validateField(id) {
            const $input = $('#' + id);
            const $error = $('#error-' + id);
            const value  = $input.val().trim();

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

        // Showing a server error on a specific field─
        function showServerError(fieldId, msg) {
            $('#' + fieldId).addClass('input-invalid');
            $('#error-' + fieldId).text(msg).show();
        }

        // Handle server response message
        function handleServerError(msg) {
            const mapped = serverErrorMap[msg];
            if (mapped) {
                showServerError(mapped.field, mapped.msg);
            } else {
                showServerError('username', msg);
            }
            shakeForm();
        }

        // Shake the form
        function shakeForm() {
            $form.removeClass('shake');
            void $form[0].offsetWidth;      // force reflow to re-trigger animation
            $form.addClass('shake');
        }

        // Live validation on input and blur
        Object.keys(rules).forEach(function (id) {
            $('#' + id).on('input blur', function () { validateField(id); });
        });

        // Re-run confirm_password whenever password changes
        $('#password').on('input', function () {
            if ($('#confirm_password').val().length > 0) validateField('confirm_password');
        });

        // Form submit
        $form.on('submit', function (e) {
            e.preventDefault();

            // 1. Client-side validation
            const fieldIds = Object.keys(rules);
            const results  = fieldIds.map(id => validateField(id));
            const allValid = results.every(Boolean);

            if (!allValid) {
                shakeForm();
                $('#' + fieldIds[results.indexOf(false)])[0]
                    .scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            // 2. AJAX submit

            $.ajax({
                url:      $form.attr('action'),
                method:   'POST',
                dataType: 'json',         
                data:     $form.serialize(),

                // PHP returns { msg: "success" } on registration success
                success: function (response) {
                    if (response && response.msg === 'success') {
                        window.location.href = '<?= ROOT ?>/public/page/login';
                    } else if (response && response.msg) {
                        handleServerError(response.msg);
                    }
                },

                // Fires on 400 / 405 / 409 HTTP status codes from the controller
                error: function (xhr) {
                    try {
                        const body = JSON.parse(xhr.responseText);
                        if (body && body.msg) {
                            handleServerError(body.msg);
                            return;
                        }
                    } catch (_) {}

                    showServerError('username', 'Something went wrong. Please try again.');
                    shakeForm();
                },

            });
        });

    });
    </script>
</body>
</html>