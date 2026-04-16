<?php


class Users extends Model{
    public function __construct(){
        parent::__construct();
        $this->table = "users";
    }

    // Get user's rank using Results model (based on best score)
    public function getRank(int $user_id): int {
        $resultsModel = new Results();
        return $resultsModel->getUserRank($user_id);
    }
}