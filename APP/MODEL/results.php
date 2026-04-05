<?php


class Results extends Model{
    public function __construct(){
        parent::__construct();
        $this->table = "results";
    }

    public function getLeaderboard($limit = 10)
    {
        $sql = "SELECT 
                    u.fullname AS user_name,
                    COUNT(r.result_id) AS total_quizzes,
                    ROUND(AVG(r.score_obtained), 2) AS avg_score,
                    ROUND(AVG(r.percentage), 2) AS avg_percentage
                FROM results r
                JOIN users u ON r.user_id = u.user_id
                GROUP BY r.user_id, u.fullname
                ORDER BY avg_score DESC
                LIMIT $limit";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}