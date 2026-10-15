<?php

require 'vendor/autoload.php';

use App\Database\Query;

$query = new Query();

$nome = 'Administrador';
$email = 'email@email.com';
$senha = 'admin1234';

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

$data = [
    'nome' => $nome,
    'email' => $email,
    'senha' => $senha_hash
];
$query->insert('usuario', $data);

echo 'Usuário inserido com sucesso!';
