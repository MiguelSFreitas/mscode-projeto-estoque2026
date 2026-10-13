<?php 

namespace App\Controller\Usuario; 

use App\Controller\AbstractController;
use App\Database\Query;

class usuariomodel{
    private Query $query;

    public function __construct(Query $query)
    {
        $this->query = $query;
    }

    public function validarUsuario(string $usuario, string $senha): void
    {
        $condicao = "email = '{email}'" ;


        $usuario = $this->query->select('usuarios', $condicao );
        
    }
}

?>