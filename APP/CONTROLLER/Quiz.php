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
        $this->view("/quiz/home");
    }
    public function questions(){
        // Session::destroy();
        $this->quiz_session_validate();

        $current_quiz_session_data = Session::get("current_quiz");
        $current_quiz_session_data["question"]["num"] = ($current_quiz_session_data["question"]["num"] ?? 0) + 1;

        Session::set("current_quiz", $current_quiz_session_data);
        $this->view("/quiz/questions");
    }

    public function quiz_session_validate(){
            // quiz session data initialaize
            $current_quiz_data = $this->get_current_quiz_data();
            $current_quiz = [
                "is_completed" =>false,
                "question" => [
                    "num"=>$current_quiz_data["current_question_num"],
                    "label"=> $current_quiz_data["current_question_label"],
                    "options"=> $current_quiz_data["current_question_options"],
                ],
                "solution" => [
                    "marks_obtained" => 0,
                    "correct_option"=> $current_quiz_data["current_question_correct_option"],
                    "selected_option"=>"7"
                    ]
            ];
    
            // is solution correct
            if($current_quiz['solution']['correct_option']==$current_quiz['solution']['selected_option']){
                $current_quiz['solution']['marks_obtained'] +=1;
            }
            Session::set("current_quiz",$current_quiz);
    }

    private function get_current_quiz_data(){
        $quiz_all_question = File::read(QUIZ_DATA_FILE);
        $quiz_all_question = json_decode($quiz_all_question,true);

        // Question Index
        $current_question_num = Session::get("current_quiz");
        $current_question_num = $current_question_num["question"]["num"] ?? 0;
        
        // // quiz data
        $current_question_label = $quiz_all_question[$current_question_num]["question"];
        $current_question_options = array_merge($quiz_all_question[$current_question_num]["incorrect_answers"], [$quiz_all_question[$current_question_num]["correct_answer"]]);
        $current_question_correct_option = $quiz_all_question[$current_question_num]["correct_answer"];

        // // updating current quiz data
        $current_quiz_data = [
            "current_question_num" => $current_question_num,
            "current_question_label" => $current_question_label,
            "current_question_options" => $current_question_options,
            "current_question_correct_option" => $current_question_correct_option
        ];

        return $current_quiz_data;
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

    private function validate_quiz_request(){
        $timeout = 120; // 2 min
        if (Session::has("quiz_updated_at")) {
            $elapsed = time() - Session::get("quiz_updated_at");

            if (!($elapsed > $timeout)) {
                echo "quiz updated rescently. try again after 2 min";
                exit();
            }
        }
    }
}

