<?php

declare(strict_types = 1);

use App\Controllers\HomeController;
use Slim\App;

return function (App $app) {
    $app->get('/', [HomeController::class, 'index']);
    $app->get('/login',[AutuController::class,'loginView']);
    $app->get('/register',[AutuController::class,'registerView']);
    $app->post('/login',[AutuController::class,'loginIn']);
    $app->post('/register',[AutuController::class,'register']);
};
