<?php

use App\Controllers\{
    HomeController,
    FruitsController,
    FruitController,
    AddFruitController,
    NotFoundController,
};

$router->add('GET', '/', [HomeController::class, 'index']);
$router->add('GET', '/fruits', [FruitsController::class, 'index']);
$router->add('GET', '/fruit/{id}', [FruitController::class, 'index']);
$router->add('GET', '/addfruit', [AddFruitController::class, 'index']);
$router->add('POST', '/addfruit', [AddFruitController::class, 'addFruit']);
$router->add('GET', '/404', [NotFoundController::class, 'index']);