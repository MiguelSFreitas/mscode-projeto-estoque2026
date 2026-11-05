<?php

namespace App\Controller\Estoque;

use App\Controller\AbstractController;
use App\Model\Estoque\EstoqueModel;

class EstoqueController extends AbstractController
{
    private EstoqueModel $model;

    public function __construct()
    {
        $this->model = new EstoqueModel();
    }

    public function index(array $requestData): void
    {
        try {
            $produtos = $this->model->listar();

            $this->render('produto/produtos.php', [
                'produtos' => $produtos,
            ]);
        } catch (\Exception $e) {
            $this->redirectToError($e->getMessage());
        }
    }
}

?>