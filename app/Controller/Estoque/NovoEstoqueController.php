<?php

namespace App\Controller\Estoque;

use App\Controller\AbstractController;

class NovoEstoqueController extends AbstractController
{
    public function index(array $requestData): void
    {
        $this->render('produto/novo_produto.php');
    }
}

?>