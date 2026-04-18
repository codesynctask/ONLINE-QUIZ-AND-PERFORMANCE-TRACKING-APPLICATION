<?php

class Admin extends Controller {
    public function __construct() {
        AuthMiddleware::handle();
        Authorization::handle();
    }

    // ROUTING
    public function index() {
        $this->view("admin/dashboard");
    }

    public function report() {
        $this->view("admin/quiz_report");
    }

    public function usermanagement() {
        $this->view("admin/user_management");

    }
    public function profile() {
        $this->view("admin/profile");

    }
}
