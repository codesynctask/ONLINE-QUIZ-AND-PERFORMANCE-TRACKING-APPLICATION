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

    public function getUserStats(int $user_id): array {
        // Total quizzes taken by user
        $sql = "SELECT 
                    COUNT(*) AS total_quizzes,
                    MAX(percentage) AS best_percentage,
                    MAX(score_obtained) AS best_score,
                    AVG(percentage) AS avg_percentage
                FROM {$this->table}
                WHERE user_id = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?? [];
    }

    public function getUserRank(int $user_id): int {
        // Rank based on average score among all users
        $sql = "SELECT COUNT(*) + 1 AS user_rank
                FROM (
                    SELECT user_id, AVG(score_obtained) AS avg_score
                    FROM {$this->table}
                    GROUP BY user_id
                ) AS rankings
                WHERE avg_score > (
                    SELECT COALESCE(AVG(score_obtained), 0)
                    FROM {$this->table}
                    WHERE user_id = :user_id
                )";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)($row['user_rank'] ?? 1);
    }
}