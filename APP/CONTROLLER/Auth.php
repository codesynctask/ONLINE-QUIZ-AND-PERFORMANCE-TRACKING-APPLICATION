<?php

use Firebase\JWT\JWT;

class Auth extends Controller
{
    public function index(){
        echo "Auth controller";
    }

    public function register(){
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            $this->json_response(["msg" => "Method not allowed"],405);
            return;
        }

        // Sanitize inputs first
        $username = trim($_POST["username"] ?? "");
        $password = trim($_POST["password"] ?? "");
        $fullname = trim($_POST["fullname"] ?? "");

        // field is not empty
        if (empty($username) || empty($password) || empty($fullname)) {
            $this->json_response(["msg" => "missing fields"],400);
            return;
        }

        // Server-side password validation 
        if (strlen($password) < 6) {
            $this->json_response(["msg" => "Password too short"],400);
            return;
        }

        // check data exist : avoid duplicates
        $users = new Users();
        $isUserData = $users->findOneBy("username",$username);

        if ($isUserData) {
            $this->json_response(["msg" => "Duplicated entries"],409);
            return;
        }

        // Creating new user
        $newUser = [
            "username"=> $username,
            "password"=> Crypt::encrypt($password),
            "role"=> "Student", //default role
            "fullname"=> $fullname,
        ];
        $users->create($newUser);
        
        $this->json_response(["msg" => "success"],200);
        exit();
    }
        

    public function login(){
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            $this->json_response(["msg" => "Method not allowed"],405);
            return;
        }

        // 1. Sanitize and validate inputs
        $username = trim($_POST["username"] ?? '');
        $password = trim($_POST["password"] ?? '');

        if (empty($username) || empty($password)) {
            $this->json_response(["msg" => "username and password required"], 400);
            return;
        }
                
        // 2. checking credientials with DB
        $users = new Users();
        $usersData = $users->findOneBy("username",$username);
        
        if (!$usersData) {
            error_log("Login failed: username '$username' not found");
            $this->json_response(["msg" => "Invalid credentials"], 401);
            return;
        }
        
        $usersPassword = $usersData["password"]; 
        $user_id = $usersData["user_id"];
        $fullname = $usersData["fullname"];

        // Check password - handle both encrypted and hashed passwords
        $passwordMatch = false;
        
        // Try encrypted password (new format)
        $decrypted = Crypt::decrypt($usersPassword);
        if ($decrypted === $password) {
            $passwordMatch = true;
        } 
        // Try hashed password (old format)
        elseif (password_verify($password, $usersPassword)) {
            $passwordMatch = true;
        }

        if (!$passwordMatch) {
            $this->json_response(["msg" => "Invalid credentials"], 401);
            return;
        }

        // 3. Generating JWT token and send as cookie
        $token = AuthMiddleware::generate($user_id);
        Session::set("user_id", $user_id); // Store user ID in session for server-side access
        Session::set("fullname", $fullname); 
        $isJwtCookieSet = Cookie::set("jwt_token",$token, 3600, "/", "", true,true);
        if ($isJwtCookieSet) {
            $this->json_response(["msg" => "success"],200);
            return;
        }
    }

public function logout() {
    // preventing CSRF logout attacks
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        header("Location: " . ROOT . "/public/");
        exit();
    }

    // user already logged out
    if (!Cookie::get("jwt_token")) {
        header("Location: " . ROOT . "/public/page/login");
        exit();
    }

    // Delete the JWT cookie
    Cookie::delete("jwt_token");

    // Destroy PHP session if one is active
    if (session_status() === PHP_SESSION_ACTIVE) {
        session_unset();
        session_destroy();
    }

    // Prevent browser from caching protected pages after logout
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Pragma: no-cache");

    header("Location: " . ROOT . "/public/");
    exit();
}

}


