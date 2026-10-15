<?php 

namespace App\Controller\Categoria;

use App\Controller\AbstractController;
use App\Model\Categoria\CategoriaModel;
use Override;

class CadastrarCategoriaController extends AbstractController 
{
   private CategoriaModel $model;

   public function __construct()
   {
       $this->model = new CategoriaModel();
   }

   public function index(array $requestData): void
   {
    try {
        if (empty($requestData['nome'])) {
            throw new \Exception('O campo "Nome" é obrigatório.');
        }

        $this->model->cadastrarCategoria($requestData['nome']);

        $this->redirect('/categoria');
    } catch (\Exception $e) {
        $this->redirectToError($e->getMessage());
    }
    
   }


}

?>