<?php

namespace App\Controller\Estoque;

use App\Controller\AbstractController;
use App\Model\Estoque\EstoqueModel;

class AtualizarEstoqueController extends AbstractController
{
    private EstoqueModel $model;

    public function __construct()
    {
        $this->model = new EstoqueModel();
    }

    public function index(array $requestData): void
    {
        try {
            if (!isset($requestData['id']) || $requestData['id'] ===  '') {
                throw new \Exception("Informe o produto que deseja editar!");
            }

            if (empty($requestData['nome'])) {
                throw new \Exception("Informe o nome do produto!");
            }

            $novoId = null;

            if (isset($requestData['novo_id']) && $requestData['novo_id'] !== '') {
                $novoId = (int) $requestData['novo_id'];
            }

            $id = (int) $requestData['id'];
            $nome = trim($requestData['nome']);

            $descricao = isset($requestData['descricao'])
                ? trim($requestData['descricao'])
                : null;

            $categoriaId = isset($requestData['categoria_id']) && $requestData['categoria_id'] !== ''
                ? (int) $requestData['categoria_id']
                : null;

            $quantidadeInicial = isset($requestData['quantidade_inicial']) && $requestData['quantidade_inicial'] !== ''
                ? (int) $requestData['quantidade_inicial']
                : null;

            $quantidadeDisponivel = isset($requestData['quantidade_disponivel']) && $requestData['quantidade_disponivel'] !== ''
                ? (int) $requestData['quantidade_disponivel']
                : null;

            $valor = isset($requestData['valor']) && $requestData['valor'] !== ''
                ? (float) str_replace(',', '.', $requestData['valor'])
                : null;

            $dataCadastro = null;

            if (!empty($requestData['data_cadastro'])) {
                $timestamp = strtotime($requestData['data_cadastro']);

                if ($timestamp === false) {
                    throw new \Exception("Data de cadastro inválida!");
                }

                $dataCadastro = date('Y-m-d H:i:s', $timestamp);
            }

            $this->model->atualizar(
                $id,
                $nome,
                $novoId,
                $descricao,
                $categoriaId,
                $quantidadeInicial,
                $quantidadeDisponivel,
                $valor,
                $dataCadastro
            );

            $this->redirect('/produtos');
        } catch (\Exception $e) {
            $this->redirectToError($e->getMessage());
        }
    }
}

?>