<?php
session_start();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}
require "../vendor/autoload.php";
require "../APP/CORE/init.php";

// middlware
require "../APP/MIDDLEWARE/AuthMiddleware.php";

$app = new App();
$app->handleController();











