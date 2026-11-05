<?php

namespace App\Controller\Estoque;

use App\Controller\AbstractController;
use App\Model\Estoque\EstoqueModel;

class ExcluirEstoqueController extends AbstractController
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
                throw new \Exception("Informe o produto que deseja excluir!");
            }

            $this->model->excluir((int) $requestData['id']);

            $this->redirect('/produtos');
        } catch (\Exception $e) {
            $this->redirectToError($e->getMessage());
        }
    }
}

?>