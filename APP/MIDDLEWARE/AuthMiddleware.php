<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\SignatureInvalidException;

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

        } catch (ExpiredException $e) {
            Cookie::delete("jwt_token");        // remove stale cookie
            self::unauthorized();
        } catch (SignatureInvalidException $e) {
            Cookie::delete("jwt_token");        // remove tampered cookie
            self::unauthorized();
        } catch (Exception $e) {
            self::unauthorized();
        }
    }
    private static function unauthorized() {
        $isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

        if ($isAjax) {
            http_response_code(401);
            header('Content-Type: application/json');
            echo json_encode(["msg" => "Unauthorized"]);
            exit();
        }

        header("Location: " . ROOT . "/public/page/login");
        exit();
    }

}
