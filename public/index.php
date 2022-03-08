<?php

use app\controllers\AuthController;
use app\controllers\BuyerController;
use app\controllers\SiteController;
use app\core\Application;
use app\models\User;

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

// echo "test";exit;

$config = [
    'userClass' => User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__), $config);


$root                = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'];
$root               .= str_replace( basename( $_SERVER['SCRIPT_NAME'] ), "", $_SERVER['SCRIPT_NAME'] );
// $config['base_url']  = "$root";
// var_dump($root);exit;

$app->router->get('/mvc/public/', [SiteController::class, 'home']);

$app->router->get('/mvc/public/contact', [SiteController::class, 'contact']);

$app->router->post('/mvc/contact', [SiteController::class, 'handleContact']);

$app->router->get('/mvc/public/login', [AuthController::class, 'login']);
$app->router->post('/mvc/login', [AuthController::class, 'login']);
$app->router->get('/mvc/public/register', [AuthController::class, 'register']);
$app->router->post('/mvc/register', [AuthController::class, 'register']);
$app->router->get('/mvc/public/logout', [AuthController::class, 'logout']);
$app->router->get('/mvc/public/profile', [AuthController::class, 'profile']);


$app->run();