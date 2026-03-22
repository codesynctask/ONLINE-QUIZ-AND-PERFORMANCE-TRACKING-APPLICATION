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

    public function show_quiz_questions(){
        $updated_quiz_data = $this->update_quiz_data_file();
        show($updated_quiz_data);
        echo "Quiz is updated : tracking quiz updates usings ession";
    }

    private function update_quiz_data_file( $category = 19, $difficulty = "easy"){
        $timeout = 120; // 2 min
        if (Session::has("quiz_updated_at")) {
            $elapsed = time() - Session::get("quiz_updated_at");

            if (!($elapsed > $timeout)) {
                echo "quiz updated rescently. try again after 2 min";
                header(("Location: ".ROOT."/public/quiz/"));
                exit();
            }
        }

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
        return $data["results"];
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

