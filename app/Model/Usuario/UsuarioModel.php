<?php 

namespace App\Model\Usuario;

use App\Database\Query;
use App\Model\Usuario\Usuario;

class UsuarioModel{
    private Query $query;

    
    public function __construct()
    {
        $this->query = new Query();
    }

    public function validarUsuario(string $email, string $senha): Usuario
    {
        $condicao = " email = '{$email}'" ;

        $resultado = $this->query->select('usuario', $condicao );
        
        if (!$resultado) {
            throw new \Exception("Usuário não encontrado.");
        }

        if (!password_verify($senha, $resultado[0]['senha'])) {
            throw new \Exception("Senha incorreta.");
        }
        
    

        $usuario = new Usuario($resultado[0]['id'], $resultado[0]['nome'], $resultado[0]['email']);

        return $usuario;
    }
}

?>