<?php

class Faculty extends Controller {
    public function __construct() {
        AuthMiddleware::handle();
        Authorization::handle();

        $faculty_permissions = new FacultyPermissions();
        $catageory = $faculty_permissions->findOneBy("user_id",Session::get("user_id"))["category"];
        Session::set("faculty_category",$catageory);
    }

    function index() {
        $database = new Database();
        $db = $database->getConnection();
        // finding total students
        $sql = "select count(*) student_count from users where role='student'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $res1 = $stmt->fetchAll();

        // finding total quizzes played for catageory of faculty
        $faculty_category = Session::get("faculty_category");
        $sql = "select category , count(*) count from quiz_data where category='$faculty_category'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $res2 = $stmt->fetchAll();

        // finding total quizzes contribution for catageory of faculty
        $faculty_category = Session::get("faculty_category");
        $sql = "SELECT 
            category,
            COUNT(*) AS total_quizzes,
            ROUND(COUNT(*) * 100.0 / (SELECT COUNT(*) FROM quiz_data), 2) AS contribution_percentage
            FROM quiz_data
            WHERE category = '$faculty_category'
            GROUP BY category
            ORDER BY contribution_percentage";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $res3 = $stmt->fetchAll();

        // getting student leaderboard for catageory of faculty
        $faculty_category = Session::get("faculty_category");
        $sql = "SELECT 
                u.fullname,
                ROUND(MAX(r.percentage), 2) AS max_score,
                ROUND(AVG(r.percentage), 2) AS avg_percentage,
                COUNT(r.result_id) AS attempts
            FROM results r
            JOIN quiz_data q ON r.quiz_id = q.quiz_id
            JOIN users u ON r.user_id = u.user_id
            WHERE q.category = '$faculty_category'
            GROUP BY u.user_id, u.username, u.fullname
            ORDER BY avg_percentage DESC
            LIMIT 10";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $res4 = $stmt->fetchAll();


        $data = [
            "student_count" =>$res1[0]["student_count"],
            "student_count_for_current_category"=>$res2[0]["count"],
            "quiz_contribution" =>  $res3[0]["contribution_percentage"],
            "student_leaderboard"   =>$res4
        ];

        $this->view("faculty/dashboard",$data);
    }
    function profile() {
        $this->view("faculty/profile");
    }




}