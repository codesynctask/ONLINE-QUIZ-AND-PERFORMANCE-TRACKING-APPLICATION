<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthMiddleware
{

    public static function generate($iss_user_id){
        $payload = [
            'iss' => APP_NAME,
            'sub' => $iss_user_id,
            'iat' => time(),
            'exp' => time() + JWT_EXPIRY_TIME
        ];

        $token = JWT::encode($payload, JWT_SECRET, JWT_ALGO);
        return $token ;
    }

    public static function handle()
    {
        $token = Cookie::get("jwt_token");

        if (!$token) {
            self::unauthorized();
        }

        try {
            $decoded = JWT::decode($token, new Key(JWT_SECRET, JWT_ALGO));

            if (!isset($decoded->sub)) {
                // "Invalid token payload"
                self::unauthorized();
            }

            return $decoded->sub;

        } catch (Exception $e) {
            // "Invalid token"
            self::unauthorized();
        }
    }

    private static function unauthorized()
    {
        header("Location: ".ROOT."/public/page/login");
        exit();
    }

}
