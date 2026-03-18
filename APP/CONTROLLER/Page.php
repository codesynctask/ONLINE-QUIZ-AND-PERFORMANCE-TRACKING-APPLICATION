<?php

class Page extends Controller
{
    public function index()
    {
        // Default page
        $this->view("home");
    }

    public function login()
    {
        // Default page
        $this->view("auth/login");
    }
    public function register()
    {
        // Default page
        $this->view("auth/register");
    }
}


