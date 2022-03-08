<?php
use app\controllers\AuthController;
use app\controllers\BuyerController;
use app\controllers\SiteController;
use app\core\Application;
use app\models\Buyer;
use app\models\User;

/**
 * Project run for root.
 * In case if need project run from public then need to reallocate
 */
require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

/**
 * the env variables value must set on .env file for database working
 */
$config = [
    'userClass' => User::class,
    'buyerClass' => Buyer::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

/**
 * Project run for root.
 * In case if need project run from public then need to reallocate
 */
$app = new Application(__DIR__, $config);


/**
 * Project route settings
 * Please change if your project name and menu URI changes, else leave as it is
 */
$root                = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'];
$root               .= str_replace( basename( $_SERVER['SCRIPT_NAME'] ), "", $_SERVER['SCRIPT_NAME'] );

$app->router->get('/mvc/home', [SiteController::class, 'home']);
$app->router->get('/mvc/', [SiteController::class, 'home']);

$app->router->get('/mvc/contact', [SiteController::class, 'contact']);
$app->router->post('/mvc/contact', [SiteController::class, 'handleContact']);

$app->router->get('/mvc/login', [AuthController::class, 'login']);
$app->router->post('/mvc/login', [AuthController::class, 'login']);
$app->router->get('/mvc/register', [AuthController::class, 'register']);
$app->router->post('/mvc/register', [AuthController::class, 'register']);
$app->router->get('/mvc/logout', [AuthController::class, 'logout']);
$app->router->get('/mvc/profile', [AuthController::class, 'profile']);

$app->router->get('/mvc/buyer', [BuyerController::class, 'buyerRegister']);
$app->router->post('/mvc/buyer', [BuyerController::class, 'buyerRegister']);
$app->router->get('/mvc/buyerlist', [BuyerController::class, 'buyerShow']);

$app->run();