<?php


class Results extends Model{
    public function __construct(){
        parent::__construct();
        $this->table = "results";
    }
}