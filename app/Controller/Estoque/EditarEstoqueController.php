<?php

namespace App\Controller\Estoque;

use App\Controller\AbstractController;
use App\Model\Estoque\EstoqueModel;

class EditarEstoqueController extends AbstractController
{
    private EstoqueModel $model;

    public function __construct()
    {
        $this->model = new EstoqueModel();
    }

    public function index(array $requestData): void
    {
        try {
            if (!isset($requestData['id']) || $requestData['id'] === '') {
                throw new \Exception("Informe o produto que deseja editar!");
            }

            $produto = $this->model->buscarPorId((int) $requestData['id']);

            $this->render('produto/editar_produto.php', [
                'produto' => $produto,
            ]);
        } catch (\Exception $e) {
            $this->redirectToError($e->getMessage());
        }
    }
}

?>