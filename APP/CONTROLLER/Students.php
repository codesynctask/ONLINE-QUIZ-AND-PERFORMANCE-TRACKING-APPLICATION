<?php

class Students extends Controller
{
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
}


