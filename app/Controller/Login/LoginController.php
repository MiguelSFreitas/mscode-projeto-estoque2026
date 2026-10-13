<?php

namespace App\Controller\Login;

use App\Controller\AbstractController;
use App\Model\Login\UsuarioModel;

class LoginController extends AbstractController {
    private UsuarioModel $model;

    public function __construct()
    {
        $this->model = new $UsuarioModel();
    }

    public function index(array $requestData): void 
    {
        try{
                if (empty($requestData['email']) || !isset($requestData['password'])) {
                throw new \Exception("Email e senha são obrigatórios.");

            }

            dump($requestData);exit;
        
        }    
           
        catch (\Exception $e) {
            $this->redirectToError($e->getMessage());
        }  
    }
}

?>