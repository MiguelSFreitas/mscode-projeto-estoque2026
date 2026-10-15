<?php

use App\Controller\AppController;
use App\Controller\Categoria\CadastrarCategoriaController;
use App\Controller\Categoria\CategoriaController;
use App\Controller\Categoria\NovaCategoriaController;
use App\Controller\Error\ErrorController;
use App\Controller\Error\NotFoundController;
use App\Controller\Home\HomeController;
use App\Controller\Login\LoginController;


$router = [
    'routes' => [
        '/' => AppController::class,
        '/error' => ErrorController::class,
        '/login' => LoginController::class,
        '/home' => HomeController::class,
        '/categoria' => CategoriaController::class,
        '/nova_categoria' => NovaCategoriaController::class,
        '/cadastrar_categoria' => CadastrarCategoriaController::class,
    ],

    'default' => NotFoundController::class
];
