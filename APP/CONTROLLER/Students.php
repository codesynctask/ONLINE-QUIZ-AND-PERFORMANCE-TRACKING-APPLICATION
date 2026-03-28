<?php

class Students extends Controller
{
    public function __construct() {
        AuthMiddleware::handle();
        Authorization::handle();
    }
    public function index()
    {
        $this->view("students/home");
    }
    public function result()
    {
        $current_quiz_session = Session::get("current_quiz");
        $quiz_file_questions = File::read(QUIZ_DATA_FILE);
        $quiz_file_questions = json_decode($quiz_file_questions,true);
        $categories = [
            "any" => "Any Category",
            "9" => "General Knowledge",
            "10" => "Entertainment: Books",
            "11" => "Entertainment: Film",
            "12" => "Entertainment: Music",
            "13" => "Entertainment: Musicals & Theatres",
            "14" => "Entertainment: Television",
            "15" => "Entertainment: Video Games",
            "16" => "Entertainment: Board Games",
            "17" => "Science & Nature",
            "18" => "Science: Computers",
            "19" => "Science: Mathematics",
            "20" => "Mythology",
            "21" => "Sports",
            "22" => "Geography",
            "23" => "History",
            "24" => "Politics",
            "25" => "Art",
            "26" => "Celebrities",
            "27" => "Animals",
            "28" => "Vehicles",
            "29" => "Entertainment: Comics",
            "30" => "Science: Gadgets",
            "31" => "Entertainment: Japanese Anime & Manga",
            "32" => "Entertainment: Cartoon & Animations"
        ];
        $category_name = "Unknown Category";
        $difficulty = $current_quiz_session["difficulty"] ?? "easy";
        $score_obtained = $current_quiz_session["solution"]["marks_obtained"] ?? 0;

        foreach ($categories as $key => $value) {
            if ($key == $current_quiz_session["category"]) {
                $category_name = $value ;
            }
        }

        // Points allocation based on difficulty
        switch ($difficulty) {
            case 'hard':
                $score_obtained *= 3;
                break;
            case 'medium':
                $score_obtained *= 2;
                break;
            default:
                $score_obtained *= 1;
                break;
        }
        
        $data = [
            "result"=>[
                "score_obtained"=>$score_obtained,
                "marks"=> $current_quiz_session["solution"]["marks_obtained"]
            ],
            "quiz_file_questions"=>$quiz_file_questions,
            "all_selected_options" => $current_quiz_session["solution"]["all_selected_options"],
            "difficulty"=> $difficulty,
            "category_name"=>$category_name,
        ];  
        $this->view("students/result",$data);
    }
    public function leaderboard()
    {
        $this->view("students/leaderboard");
    }
    public function profile()
    {
        $this->view("students/profile");
    }
}


