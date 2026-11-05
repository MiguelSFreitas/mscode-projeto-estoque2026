<?php

namespace App\Controller\Estoque;

use App\Controller\AbstractController;
use App\Model\Estoque\EstoqueModel;

class CadastrarEstoqueController extends AbstractController
{
    private EstoqueModel $model;

    public function __construct()
    {
        $this->model = new EstoqueModel();
    }

    public function index(array $requestData): void
    {
        try {
            if(empty($requestData['nome'])) {
                throw new \Exception("Informe o nome do Produto!");
            }

            if(empty($requestData['descricao'])) {
                throw new \Exception("Informe a descrição!");
            }

            if(empty($requestData['categoria_id'])) {
                throw new \Exception("Informe o id da categoria correspondente!");
            }

            if(empty($requestData['data_cadastro'])) {
                throw new \Exception("Informe a data de cadastro do Produto!");
            }

            if(!isset($requestData['quantidade_inicial']) || $requestData['quantidade_inicial'] === '') {
                throw new \Exception("Informe a quantidade inicial de estoque!");
            }

            if(!isset($requestData['quantidade_disponivel']) || $requestData['quantidade_disponivel'] === '') {
                throw new \Exception("Informe a quantidade disponivel de estoque!");
            }

            if (!isset($requestData['id']) || trim((string) $requestData['id']) === '') {
                throw new \Exception("Informe o id do produto!");
            }

            if (!ctype_digit(trim((string) $requestData['id']))) {
                throw new \Exception("Id inválido! Use apenas números inteiros");
            }

            if (!isset($requestData['valor']) || $requestData['valor'] === '') {
                throw new \Exception("Informe o valor do produto!");
            }

            $id = (int) $requestData['id'];
            $categoriaId = (int) $requestData['categoria_id'];
            $quantidadeInicial = (int) $requestData['quantidade_inicial'];
            $quantidadeDisponivel = (int) $requestData['quantidade_disponivel'];
            $valor = (float) str_replace(',', '.', $requestData['valor']);
            $nome = trim($requestData['nome']);
            $descricao = trim($requestData['descricao']);
            $dataCadastro = date('Y-m-d H:i:s', strtotime($requestData['data_cadastro']));

            $this->model->cadastrar(
                $id,
                $categoriaId,
                $quantidadeInicial,
                $quantidadeDisponivel,
                $valor,
                $nome,
                $descricao,
                $dataCadastro
            );

            $this->redirect('/produtos');
        } catch (\Exception $e) {
            $this->redirectToError($e->getMessage());
        }
    }
}

?>