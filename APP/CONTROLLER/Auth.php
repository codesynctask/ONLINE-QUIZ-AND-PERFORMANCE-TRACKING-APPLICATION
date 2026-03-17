<?php

use Firebase\JWT\JWT;

class Auth extends Controller
{
    public function index(){
        echo "Auth controller";
    }

    public function register(){
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            $this->json_response(["msg" => "Method not allowed"]);
            return;
        }

        // field is not empty
        if (
          !(isset($_POST["username"]) &&
            isset($_POST["password"]) &&
            isset($_POST["role"])     &&
            isset($_POST["fullname"]))
        ) {
            $this->json_response(["msg" => "missing fields"]);
            return;
        }

        // check data exist : avoid duplicates
        $users = new Users();
        $isUserData = $users->findOneBy("username",$_POST["username"]);

        if ($isUserData) {
            $this->json_response(["msg" => "Duplicated entries"]);
            return;
        }

        // Creating new user
        $newUser = [
            "username"=> $_POST["username"],
            "password"=> password_hash($_POST["password"], PASSWORD_BCRYPT),
            "role"=> $_POST["role"],
            "fullname"=> $_POST["fullname"],
        ];
        $users->create($newUser);
        
        $this->json_response(["msg" => "User Created","newUserData"=>$newUser]);
    }
        

    public function login(){
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            $this->json_response(["msg" => "Method not allowed"],405);
            return;
        }

        // 1. checking login user data received
        $username = $_POST["username"] ?? null;
        $password = $_POST["password"] ?? null;

        if (!$username || !$password) {
            $this->json_response(["msg" => "username and password required"],400);
            return;
        }
                
        // 2. checking credientials with DB
        $users = new Users();
        $usersData = $users->findOneBy("username",$username);
        
        if (!$usersData) {
            $this->json_response(["msg" => "Invalid credentials"],401);
            return;
        }
        
        $usersPassword = $usersData["password"]; 
        $usersusername = $usersData["username"];

        if (!password_verify($password, $usersPassword)) {
            $this->json_response(["msg" => "Invalid credentials"], 401);
            return;
        }

        // 3. Generating JWT token and send as cookie
        $token = AuthMiddleware::generate($usersData["user_id"]);
        $isJwtCookieSet = Cookie::set("jwt_token",$token, 3600, "/", "", true,true);
        if ($isJwtCookieSet) {
            $this->json_response([
                "msg" => "JWT token sent to client device"
            ],200);
        }
    }

    /*
    controller-->method{
        // to protect particular path we will run middleware at the start of logic
    }


    */

}


