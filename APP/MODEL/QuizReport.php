<?php

class QuizReport extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "quiz_data";
    }

    public function getMostPlayedCategory()
    {
        $sql = " SELECT category
            FROM quiz_data
            GROUP BY category
            ORDER BY COUNT(*) DESC
            LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getLeastPlayedCategory()
    {
        $sql = " SELECT category
            FROM quiz_data
            GROUP BY category
            ORDER BY COUNT(*) ASC
            LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getStatsForCategory($category)
    {
        $sql = "SELECT 
        qd.difficulty,
        MAX(r.percentage) AS max_marks,
        MIN(r.percentage) AS min_marks,
        ROUND(AVG(r.percentage), 2) AS average_marks
    FROM results r
    JOIN quiz_data qd 
        ON r.quiz_id = qd.quiz_id
    WHERE qd.category = :category
    GROUP BY qd.difficulty
    ORDER BY FIELD(qd.difficulty, 'Easy', 'Medium', 'Hard')";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }


}
