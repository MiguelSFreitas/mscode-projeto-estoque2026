<?php 
namespace App\Controller\Produto;

use App\Model\Produto\ProdutoModel;

class ProdutoController 
{

    private ProdutoModel $model;
    
    public function __construct()
    {
        $this->model = new ProdutoModel();
    }

}
?>