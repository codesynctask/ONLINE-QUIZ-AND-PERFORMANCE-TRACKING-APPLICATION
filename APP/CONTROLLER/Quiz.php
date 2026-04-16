<?php

class Quiz extends Controller{
    public function __construct() {
        $user_role = Authorization::get_user_role(); //todo: debug autherization
        if(!($user_role == "students")){
            header("Location: ".ROOT."/public/page/login");
            exit();
        }
    }
    public function index(){
        Session::remove("current_quiz");
        $this->view("/quiz/home");
    }
    public function questions() {
        if (!Session::has("current_quiz")) {
            if ($_SERVER["REQUEST_METHOD"] !== "POST") {
                header("Location: " . ROOT . "/public/quiz/");
                exit();
            }

            $this->update_quiz_data_file();
            Session::set("current_quiz", [
                "is_completed" => false,
                "question"     => ["num" => 0],
                "solution"     => [
                    "marks_obtained"       => 0,
                    "all_selected_options" => [],
                ],
                "category"   => $_POST["category"]  ?? 18,
                "difficulty" => $_POST["difficulty"] ?? "easy",
            ]);

            $this->load_question_into_session(0);
            header("Location: " . ROOT . "/public/quiz/questions");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->process_answer();
            header("Location: " . ROOT . "/public/quiz/questions");
            exit();
        }

        // GET — render current question view
        $this->view("/quiz/questions");
    }

    private function load_question_into_session(int $num) {
        $session   = Session::get("current_quiz");
        $quiz_data = json_decode(File::read(QUIZ_DATA_FILE), true);
        $options = array_merge(
            $quiz_data[$num]["incorrect_answers"],
            [$quiz_data[$num]["correct_answer"]]
        );
        shuffle($options);

        $session["question"]["num"]            = $num;
        $session["question"]["label"]          = $quiz_data[$num]["question"];
        $session["question"]["options"]        = $options;
        $session["solution"]["correct_option"] = $quiz_data[$num]["correct_answer"];

        Session::set("current_quiz", $session);
    }


    private function process_answer() {
        $session         = Session::get("current_quiz");
        $quiz_data       = json_decode(File::read(QUIZ_DATA_FILE), true);
        $total_questions = count($quiz_data);
        $current_num     = $session["question"]["num"];
        $direction       = $_POST["direction"] ?? "next";

        // ── Timer expired — save current answer (if any) and go to results ──
        if (!empty($_POST["timed_out"])) {
            if (isset($_POST["answer"])) {
                $selected = trim(html_entity_decode($_POST["answer"]));
                $session["solution"]["all_selected_options"][$current_num] = $selected;
            }
            $session["is_completed"]    = true;
            $session["question"]["num"] = $current_num;
            Session::set("current_quiz", $session);
            header("Location: " . ROOT . "/public/students/result/");
            exit();
        }

        // ── Going back — reload previous question, don't save answer ──
        if ($direction === "prev" && $current_num > 0) {
            $this->load_question_into_session($current_num - 1);
            return;
        }

        // ── 1. Save answer for the current question ──
        if ($direction === "next" && isset($_POST["answer"])) {
            $selected = trim(html_entity_decode($_POST["answer"]));
            $session["solution"]["all_selected_options"][$current_num] = $selected;
        }

        // ── 2. Calculate next question number ──
        $next_num = $current_num + 1;

        // ── 3. Quiz completed ──
        if ($next_num >= $total_questions) {
            $session["is_completed"]    = true;
            $session["question"]["num"] = $next_num;
            Session::set("current_quiz", $session);
            header("Location: " . ROOT . "/public/students/result/");
            exit();
        }

        // ── 4. Load next question into session ──
        $options = array_merge(
            $quiz_data[$next_num]["incorrect_answers"],
            [$quiz_data[$next_num]["correct_answer"]]
        );
        shuffle($options);

        $session["question"]["num"]            = $next_num;
        $session["question"]["label"]          = $quiz_data[$next_num]["question"];
        $session["question"]["options"]        = $options;
        $session["solution"]["correct_option"] = $quiz_data[$next_num]["correct_answer"];

        Session::set("current_quiz", $session);
    }



    private function update_quiz_data_file( $category = 19, $difficulty = "easy"){
        // Getting data from POST
        $category = $_POST["category"] ?? $category;
        $difficulty = $_POST["difficulty"] ?? $difficulty;

        // requesting and updating
        $api = "https://opentdb.com/api.php?amount=10&category=$category&difficulty=$difficulty&type=multiple";
        $api_data = File::read($api);
        $data = json_decode($api_data,true);

        if (
            empty($data) ||
            !isset($data["response_code"]) ||
            $data["response_code"] !== 0   ||
            empty($data["results"])
        ) {
            // Redirecting with an error message if API call fails or returns invalid data
            header("Location: " . ROOT . "/public/quiz/?error=api_failed");
            exit();
        }

        // Update to session and file
        File::write(QUIZ_DATA_FILE, json_encode($data["results"]));
        Session::set("quiz_updated_at",time());
    }
}

