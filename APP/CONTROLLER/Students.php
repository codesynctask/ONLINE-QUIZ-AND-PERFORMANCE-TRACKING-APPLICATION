<?php

class Students extends Controller
{
    public function __construct() {
        AuthMiddleware::handle();
        Authorization::handle();
    }
    public function index()
    {
        $user_id = Session::get("user_id");

        $results_model = new Results();

        // Fetch user stats from DB
        $stats = $results_model->getUserStats($user_id);
        $rank  = $results_model->getUserRank($user_id);

        $total_quizzes   = $stats['total_quizzes']   ?? 0;
        $best_score      = $stats['best_score']       ?? 0;
        $best_percentage = $stats['best_percentage']  ?? 0;
        $avg_percentage  = $stats['avg_percentage']   ?? 0;

        $data = [
            "total_quizzes"   => $total_quizzes,
            "best_score"      => $best_score,
            "best_percentage" => round($best_percentage, 2),
            "avg_percentage"  => round($avg_percentage, 2),
            "user_rank"       => $rank,
        ];

        $this->view("students/home", $data);
    }
    public function result()
    {
        if (!Session::has("current_quiz")) {
            header("Location: " . ROOT . "/public/quiz/");
            exit();
        }
        $current_quiz_session = Session::get("current_quiz");
        $quiz_file_questions = json_decode(File::read(QUIZ_DATA_FILE), true) ?? [];
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
        $category_key  = (string)($current_quiz_session["category"] ?? "any");
        $category_name = $categories[$category_key] ?? "Unknown Category";

        $difficulty = $current_quiz_session["difficulty"] ?? "easy";
        $marks_obtained      = $current_quiz_session["solution"]["marks_obtained"] ?? 0;
        $all_selected_options = $current_quiz_session["solution"]["all_selected_options"] ?? [];
        $total_questions     = count($quiz_file_questions);

        foreach ($categories as $key => $value) {
            if ($key == $current_quiz_session["category"]) {
                $category_name = $value ;
            }
        }

        foreach ($quiz_file_questions as $index => $question) {
            $selected = $all_selected_options[$index] ?? null;

            if ($selected === null) continue;

            $correct  = trim(html_entity_decode($question["correct_answer"]));
            $selected = trim(html_entity_decode($selected));

            if (strtolower($selected) === strtolower($correct)) {
                $marks_obtained += 1;
            }
        }


        // Points allocation based on difficulty
        switch ($difficulty) {
            case 'hard':
                $score_obtained = $marks_obtained * 3;
                break;
            case 'medium':
                $score_obtained = $marks_obtained * 2;
                break;
            default:
                $score_obtained = $marks_obtained * 1;
                break;
        }

        // Marks calculation based on correct answers
        $current_quiz_session["solution"]["marks_obtained"] = $score_obtained;
        
        // Get current user ID and quiz ID from session
        $user_id = Session::get("user_id");
        
        // Calculate percentage
        $percentage = $total_questions > 0 ? ($marks_obtained / $total_questions) * 100 : 0;
        
        // Save quiz_data to database
        $quiz_data_model = new Quiz_data();
        $quiz_data = [
            "user_id" => $user_id,
            "category" => $category_name,
            "difficulty" => $difficulty,
            "start_time" => $current_quiz_session["quiz_updated_at"] ?? date('Y-m-d H:i:s')
        ];
        $quiz_data_model->create($quiz_data);
        $last_inserted_quiz_id = $quiz_data_model->lastInsertId();
        
        // Save result to database
        $results_model = new Results();
        $result_data = [
            "user_id" => $user_id,
            "quiz_id" => $last_inserted_quiz_id ,
            "score_obtained" => $score_obtained,
            "total_questions" => $total_questions,
            "percentage" => round($percentage, 2)
        ];
        $results_model->create($result_data);
        
        
        $data = [
            "result"=>[
                "score_obtained"=>$score_obtained,
                "marks"=> $marks_obtained
            ],
            "quiz_file_questions"=>$quiz_file_questions,
            "all_selected_options" => $all_selected_options,
            "difficulty"=> $difficulty,
            "category_name"=>$category_name,
        ];  
        $this->view("students/result",$data);
    }
    public function leaderboard()
    {
        $results_model = new Results();
        
        $leaderboard_data = $results_model->getLeaderboard();
        
        $leaderboard = $leaderboard_data;

        $this->view("students/leaderboard", ["leaderboard" => $leaderboard]);
    }
    public function profile()
    {
        $this->view("students/profile");
    }
}


