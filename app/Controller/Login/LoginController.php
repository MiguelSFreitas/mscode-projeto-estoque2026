<?php

namespace App\Controller\Login;

use App\Controller\AbstractController;

class LoginController extends AbstractController {
    private LoginModel $loginModel;

    public function __construct(LoginModel $loginModel)
    {
        $this->loginModel = $loginModel;
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