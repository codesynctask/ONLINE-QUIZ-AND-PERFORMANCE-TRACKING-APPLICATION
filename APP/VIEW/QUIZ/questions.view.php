<?php

if (Session::has("current_quiz")) {
    $current_quiz                  = Session::get("current_quiz");
    $current_quiz_question_label   = $current_quiz["question"]["label"];
    $current_quiz_question_options = array_map('htmlspecialchars', $current_quiz["question"]["options"]);
    $current_quiz_question_num     = $current_quiz["question"]["num"] + 1;
    $total_questions               = 10; // matches API amount=10
} else {
    header("Location: " . ROOT . "/public/quiz/");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students - Quiz</title>
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
        * { user-select: none; }

        /* Validation error */
        #validation-error {
            display: none;
            animation: shake 0.4s ease;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%       { transform: translateX(-8px); }
            40%       { transform: translateX(8px); }
            60%       { transform: translateX(-5px); }
            80%       { transform: translateX(5px); }
        }

        /* Highlight unanswered options on failed submit */
        .option-error label {
            border-color: #ef4444 !important;
            background-color: #fef2f2 !important;
        }

        /* Timer turns red in last 60 seconds */
        .timer-warning {
            color: #ef4444;
            font-weight: bold;
        }
    </style>
</head>

<body class="relative text-[clamp(0.8rem,1.3vw,1rem)]">
    <header class="fixed w-[100vw] z-[999]">
        <nav class="backdrop-filter backdrop-blur-sm flex justify-between items-center gap-[4vw] p-2 px-[6vw]">
            <img class="size-[70px]" src="<?= ROOT ?>\PUBLIC\ASSETS\imgs\logo.png" alt="Quiz Tracker Logo">

            <div class="auth-buttons flex justify-between items-center gap-2 p-2">
                <!-- Timer -->
                <div id="quiz-timer"
                    class="flex gap-2 justify-center item-center text-[clamp(1.2em,1.5vw,1.5em)]">
                    <i class="ri-timer-flash-line"></i>
                    <span id="timer-display">5:00</span>
                </div>

                <!-- Cancel button — confirm before leaving -->
                <button
                    id="cancel-btn"
                    type="button"
                    class="flex gap-2 justify-center item-center bg-white btn hover:scale-105 w-fit">
                    <i class="ri-close-fill"></i> <span class="hidden lg:block">Cancel</span>
                </button>
            </div>
        </nav>
    </header>

    <section id="hero" class="flex flex-col items-center justify-center lg:justify-start p-4 pt-[100px]">
        <div class="border-2 border-gray shadow-lg rounded-lg bg-white flex justify-center items-center flex-col p-8 lg:px-8 w-full lg:w-[80vw] max-w-[900px]">

            <!-- Progress indicator -->
            <h3 class="uppercase text-[clamp(1.2em,1.5vw,1.5em)] p-4">
                Question <?= $current_quiz_question_num ?> / <?= $total_questions ?>
            </h3>

            <h1 class="px-px mx-px md:px-4 lg:px-8 text-[clamp(1.5em,1.3vw,2.4vw)] shrink-0 w-full text-start">
                <?= $current_quiz_question_label ?>
            </h1>

            <form id="quiz-form" action="<?= ROOT ?>/public/quiz/questions" method="post"
                class="w-full py-4 px-px m-px md:p-4 lg:p-8 flex justify-center items-center gap-2 flex-col"
                novalidate>

                <input type="hidden" name="direction" id="direction-input" value="next">

                <ul class="w-full flex justify-center items-center gap-4 flex-col">
                    <li class="w-full flex my-px">
                        <input class="radio-elm" type="radio" name="answer"
                            value="<?= $current_quiz_question_options[0] ?>" id="question_a">
                        <label class="p-4 bg-white cursor-pointer border-white hover:shadow-lg hover:border-black border-2 rounded-lg block w-full justify-center items-start hover:font-bold"
                            for="question_a">A. <?= $current_quiz_question_options[0] ?></label>
                    </li>
                    <li class="w-full flex my-px">
                        <input class="radio-elm" type="radio" name="answer"
                            value="<?= $current_quiz_question_options[1] ?>" id="question_b">
                        <label class="p-4 bg-white cursor-pointer border-white hover:shadow-lg hover:border-black border-2 rounded-lg block w-full justify-center items-start hover:font-bold"
                            for="question_b">B. <?= $current_quiz_question_options[1] ?></label>
                    </li>
                    <li class="w-full flex my-px">
                        <input class="radio-elm" type="radio" name="answer"
                            value="<?= $current_quiz_question_options[2] ?>" id="question_c">
                        <label class="p-4 bg-white cursor-pointer border-white hover:shadow-lg hover:border-black border-2 rounded-lg block w-full justify-center items-start hover:font-bold"
                            for="question_c">C. <?= $current_quiz_question_options[2] ?></label>
                    </li>
                    <li class="w-full flex my-px">
                        <input class="radio-elm" type="radio" name="answer"
                            value="<?= $current_quiz_question_options[3] ?>" id="question_d">
                        <label class="p-4 bg-white cursor-pointer border-white hover:shadow-lg hover:border-black border-2 rounded-lg block w-full justify-center items-start hover:font-bold"
                            for="question_d">D. <?= $current_quiz_question_options[3] ?></label>
                    </li>
                </ul>

                <!-- Validation error message -->
                <p id="validation-error" class="text-red-500 text-sm flex items-center gap-2 w-full mt-2">
                    <i class="ri-error-warning-line text-[1.2em]"></i>
                    Please select an answer before continuing.
                </p>

                <div class="mt-4 flex gap-4 w-full">
                    <button type="button" id="btn-prev"
                        class="btn w-full flex justify-center items-center gap-2 md:gap-4 <?= $current_quiz_question_num === 1 ? 'opacity-50 cursor-not-allowed' : '' ?>"
                        <?= $current_quiz_question_num === 1 ? 'disabled' : '' ?>>
                        <i class="ri-arrow-left-long-fill text-[1.7em]"></i> Previous
                    </button>
                    <button type="submit" id="btn-next"
                        class="btn w-full flex justify-center items-center gap-2 md:gap-4 btn-primary">
                        <?= $current_quiz_question_num === $total_questions ? 'Finish' : 'Next' ?>
                        <i class="ri-arrow-right-long-fill text-[1.7em]"></i>
                    </button>
                </div>

            </form>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-4.0.0.js"></script>
    <script>
    $(function () {

        const $form        = $('#quiz-form');
        const $radios      = $form.find('input[name="answer"]');
        const $optionItems = $radios.closest('li');
        const $errorMsg    = $('#validation-error');
        const $direction   = $('#direction-input');

        // 1. Clear error state on user selectection
        $radios.on('change', function () {
            $errorMsg.hide();
            $optionItems.removeClass('option-error');
        });

        // 2. Previous button 
        $('#btn-prev').on('click', function () {
            if ($(this).prop('disabled')) return;
            $direction.val('prev');
            $form.off('submit').submit();
        });

        // 3. Next — validate + submitting
        $form.on('submit', function (e) {
            if ($direction.val() === 'prev') return;

            if (!$radios.is(':checked')) {
                e.preventDefault();

                // Show error + shake
                $errorMsg.hide().show();
                $optionItems.addClass('option-error');
                $errorMsg[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
                return false;
            }

            $direction.val('next');
        });

        // 4. Cancel button 
        $('#cancel-btn').on('click', function () {
            const confirmed = window.confirm('Are you sure you want to cancel the quiz? Your progress will be lost.');
            if (confirmed) {
                window.location.href = '<?= ROOT ?>/public/quiz/';
            }
        });

        // 5. Countdown timer (5 minutes)
        let totalSeconds = 5 * 60;
        const $display   = $('#timer-display');
        const $timer     = $('#quiz-timer');

        function updateTimer() {
            const mins = Math.floor(totalSeconds / 60);
            const secs = totalSeconds % 60;
            $display.text(mins + ':' + String(secs).padStart(2, '0'));

            // Warn at 60 seconds remaining
            if (totalSeconds <= 60) {
                $timer.addClass('timer-warning');
            }

            // Time's up — auto submit with whatever answer is selected
            if (totalSeconds <= 0) {
                clearInterval(timerInterval);
                $direction.val('next');
                $form.off('submit').submit();
                return;
            }

            totalSeconds--;
        }

        updateTimer(); // run immediately so there's no 1s blank delay
        const timerInterval = setInterval(updateTimer, 1000);

    });
    </script>
</body>

</html>