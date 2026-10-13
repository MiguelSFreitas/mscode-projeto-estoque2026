<?php 

namespace App\Model\Usuario;

class Usuario
{
    private int $id;
    private string $nome;
    private string $email;
  
    public function __construct(int $id)
    {
        $this->id = $id;
       
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }


}

?>