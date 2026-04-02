<?php


class Quiz_data extends Model{
    public function __construct(){
        parent::__construct();
        $this->table = "quiz_data";
    }
}