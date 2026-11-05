<?php

use App\Controller\AppController;
use App\Controller\Categoria\NovaCategoriaController;
use App\Controller\Categoria\CadastrarCategoriaController;
use App\Controller\Categoria\EditarCategoriaController;
use App\Controller\Categoria\AtualizarCategoriaController;
use App\Controller\Categoria\ExcluirCategoriaController;
use App\Controller\Categoria\CategoriaController;
use App\Controller\Error\ErrorController;
use App\Controller\Error\NotFoundController;
use App\Controller\Estoque\AtualizarEstoqueController;
use App\Controller\Estoque\CadastrarEstoqueController;
use App\Controller\Estoque\EstoqueController;
use App\Controller\Estoque\EditarEstoqueController;
use App\Controller\Estoque\ExcluirEstoqueController;
use App\Controller\Estoque\NovoEstoqueController;
use App\Controller\Login\LoginController;
use App\Controller\Home\HomeController;

$router = [
    'routes' => [
        '/' => AppController::class,
        '/error' => ErrorController::class,
        '/login' => LoginController::class,
        '/home' => HomeController::class,
        '/categoria' => CategoriaController::class,
        '/nova_categoria' => NovaCategoriaController::class,
        '/cadastrar_categoria' => CadastrarCategoriaController::class,
        '/editar_categoria' => EditarCategoriaController::class,
        '/atualizar_categoria' => AtualizarCategoriaController::class,
        '/excluir_categoria' => ExcluirCategoriaController::class,

        '/produtos' => EstoqueController::class,
        '/novo_produto' => NovoEstoqueController::class,
        '/cadastrar_produto' => CadastrarEstoqueController::class,
        '/editar_produto' => EditarEstoqueController::class,
        '/atualizar_produto' => AtualizarEstoqueController::class,
        '/excluir_produto' => ExcluirEstoqueController::class,
    ],
    'default' => NotFoundController::class
];