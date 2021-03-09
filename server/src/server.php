<?php

namespace BSHARE\WEBSERVER;

use Slim\Factory\AppFactory;

use BSHARE\WEBSERVER\CONTROLLERS\UserController;

require __DIR__ . "/autoload.php";
require __DIR__ . "/Database" . "/ConnectionDatabase.php";
require __DIR__ . "/headers.php";

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$userController = new UserController();

$app->post('/user', UserController::class . ':create');
$app->get('/user/{data}', UserController::class . ':show');
$app->get('/users', UserController::class . ':showAll');
$app->get('/user/logIn/name/{name}/{password}', UserController::class . ':logInWithName');
$app->get('/user/logIn/email/{email}/{password}', UserController::class . ':logInWithEmail');

$app->run();
