<?php


class Results extends Model{
    public function __construct(){
        parent::__construct();
        $this->table = "results";
    }

    public function getLeaderboard($limit = 10)
    {
        // Leaderboard  rank by average percentage
        $sql = "SELECT 
                    u.fullname AS user_name,
                    COUNT(r.result_id) AS total_quizzes,
                    MAX(r.score_obtained) AS best_score,
                    ROUND(AVG(r.percentage), 2) AS avg_percentage
                FROM results r
                JOIN users u ON r.user_id = u.user_id
                GROUP BY r.user_id, u.fullname
                ORDER BY avg_percentage DESC
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
        // Rank based on average percentage among all users
        $sql = "SELECT COUNT(*) + 1 AS user_rank
                FROM (
                    SELECT user_id, AVG(percentage) AS avg_percentage
                    FROM {$this->table}
                    GROUP BY user_id
                ) AS rankings
                WHERE avg_percentage > (
                    SELECT COALESCE(AVG(percentage), 0)
                    FROM {$this->table}
                    WHERE user_id = :user_id
                )";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)($row['user_rank'] ?? 1);
    }

    public function getUserRankInfo(int $user_id): array {
        // Get user rank with full stats like leaderboard
        $sql = "SELECT 
                    u.user_id,
                    u.fullname AS user_name,
                    COUNT(r.result_id) AS total_quizzes,
                    MAX(r.score_obtained) AS best_score,
                    ROUND(AVG(r.percentage), 2) AS avg_percentage,
                    (SELECT COUNT(*) + 1 
                     FROM (
                        SELECT user_id, AVG(percentage) AS avg_percentage
                        FROM results
                        GROUP BY user_id
                     ) AS rankings
                     WHERE avg_percentage > (
                        SELECT COALESCE(AVG(percentage), 0)
                        FROM results
                        WHERE user_id = :user_id
                     )) AS user_rank
                FROM results r
                JOIN users u ON r.user_id = u.user_id
                WHERE r.user_id = :user_id
                GROUP BY r.user_id, u.user_id, u.fullname";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?? [];
    }
}