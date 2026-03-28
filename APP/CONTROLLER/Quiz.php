<?php

class Quiz extends Controller{
    public function __construct() {
        $user_role = Authorization::get_user_role();
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
            $this->view("/quiz/questions");
            return;
        }

        $this->process_answer();
        $this->view("/quiz/questions");
    }

    private function load_question_into_session(int $num) {
        $session   = Session::get("current_quiz");
        $quiz_data = json_decode(File::read(QUIZ_DATA_FILE), true);

        $session["question"]["num"]            = $num;
        $session["question"]["label"]          = $quiz_data[$num]["question"];
        $session["question"]["options"]        = array_merge(
            $quiz_data[$num]["incorrect_answers"],
            [$quiz_data[$num]["correct_answer"]]
        );
        $session["solution"]["correct_option"] = $quiz_data[$num]["correct_answer"];

        Session::set("current_quiz", $session);
    }

    private function process_answer() {
        $session         = Session::get("current_quiz");
        $quiz_data       = json_decode(File::read(QUIZ_DATA_FILE), true);
        $total_questions = count($quiz_data);
        $current_num     = $session["question"]["num"];

        // 1. Saving answer for the CURRENT question
        if (isset($_POST["answer"])) {

            $correct = $quiz_data[$current_num]["correct_answer"] ?? null;

            $selected = trim(html_entity_decode($_POST["answer"]));
            $correct_clean = trim(html_entity_decode($correct));

            $session["solution"]["all_selected_options"][] = $selected;

            if ($correct_clean !== null && strtolower($selected) === strtolower($correct_clean)) {
                $session["solution"]["marks_obtained"] += 1;
            }
        }

        // 2.next question number
        $next_num = $current_num + 1;

        // 3. is quiz completed 
        if ($next_num >= $total_questions) {
            $session["is_completed"]    = true;
            $session["question"]["num"] = $next_num;
            Session::set("current_quiz", $session); // persist final answer + score
            header("Location: " . ROOT . "/public/students/result/");
            exit();
        }

        // 4. Loading next question into session
        $session["question"]["num"]            = $next_num;
        $session["question"]["label"]          = $quiz_data[$next_num]["question"];

        // 5. Suffle the options
        $options = array_merge(
            $quiz_data[$next_num]["incorrect_answers"],
            [$quiz_data[$next_num]["correct_answer"]]
        );
        shuffle($options);
        $session["question"]["options"] = $options;
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
        File::write(QUIZ_DATA_FILE,json_encode(($data["results"])));

        // Update to session
        Session::set("quiz_updated_at",time());
    }
}

