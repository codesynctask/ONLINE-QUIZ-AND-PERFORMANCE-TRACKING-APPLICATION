<?php

class Students extends Controller
{
    public function __construct() {
        AuthMiddleware::handle();
        Authorization::handle();
    }
    public function index()
    {
        $this->view("students/home");
    }
    public function result()
    {
        $this->view("students/result");
    }
    public function leaderboard()
    {
        $this->view("students/leaderboard");
    }
    public function profile()
    {
        $this->view("students/profile");
    }
}


