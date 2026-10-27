<?php 
namespace App\Model\Produto;

use App\Database\Query;

class ProdutoModel 
{
    private Query $query;

    public function __construct()
    {
        $this->query = new Query();
    }
}
?>