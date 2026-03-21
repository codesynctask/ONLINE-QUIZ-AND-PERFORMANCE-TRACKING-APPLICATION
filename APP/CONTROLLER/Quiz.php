<?php

class Quiz extends Controller{
    public function __construct() {
        $user_role = Authorization::get_user_role();
        if(!($user_role == "students")){
            header("Location: ".ROOT."/public/page/login");
            exit();
        }
    }
    public function index(){
        $this->view("/quiz/home");
    }
}

