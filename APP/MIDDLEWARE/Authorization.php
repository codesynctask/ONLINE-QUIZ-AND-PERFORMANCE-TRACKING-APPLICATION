<?php

class Authorization
{
    private static $user_role = "students"; //default
    public static function handle(){
        $token = Cookie::get("jwt_token");

        if(!$token){
            return;
        }
        
        // is client have token
        if ($token) {
            self::$user_role = self::get_user_role();
            // if client already in its contrller
            if(str_contains($_SERVER["REQUEST_URI"],self::$user_role)){
                return 0;
            }
            header("Location: " . ROOT . "/public/" . self::$user_role . "/"); //redirect according to user role
            exit();
        }
    }

    private static function get_user_role(){
        //create dummy teacher data
        $auth_user_id = AuthMiddleware::handle();
        $user = new Users();
        $found_user = $user->findOneBy("user_id" , $auth_user_id);

        if (!$found_user) 
        {
            Cookie::delete("jwt_token");
            header("Location: ".ROOT."/public/page/login");
            exit();
        }
        $user_role = $found_user["role"];

        if(!($user_role=="Student")){
            self::$user_role = $user_role;
            return self::$user_role;
        }
        return self::$user_role;
    }

}
