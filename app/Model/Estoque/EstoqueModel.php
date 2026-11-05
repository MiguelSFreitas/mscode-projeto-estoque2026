<?php

namespace App\Model\Estoque;

use App\Database\Query;

class EstoqueModel 
{
    private Query $query;

    public function __construct()
    {
        $this->query = new Query();
    }

    public function cadastrar(int $id, $categoria_id, $quantidade_inicial, $quantidade_disponivel, $valor, string $nome, $descricao, $data_cadastro): void 
    {
        $dados = [
            'id' => $id,
            'nome' => $nome,
            'descricao' => $descricao,
            'categoria_id' => $categoria_id,
            'data_cadastro' => $data_cadastro,
            'quantidade_inicial' => $quantidade_inicial,
            'quantidade_disponivel' => $quantidade_disponivel,
            'valor' => $valor
        ];

        if ($id !== null) {
            if ($this->existe($id)) {
                throw new \Exception("Já existe um produto com o id {$id}!");
            }

            $dados['id'] = $id;
        }

        $resultado = $this->query->insert('produto', $dados);

        if ($resultado === false) {
            throw new \Exception("Erro ao criar o produto: " . $nome);
        }
    }

    public function listar(): array 
    {
        $resultado = $this->query->select('produto');

        if ($resultado === false) {
            throw new \Exception("Erro ao listar produtos!");
        }

        return $resultado;
    }

    public function buscarPorId(int $id): array
    {
        $resultado = $this->query->select('produto', "id = {$id}");

        if (! $resultado) {
            throw new \Exception("Produto não encontrado!");
        }

        return $resultado[0];
    }

    public function atualizar(
        int $id,
        string $nome,
        ?int $novoId = null,
        ?string $descricao = null,
        ?int $categoriaId = null,
        ?int $quantidadeInicial = null,
        ?int $quantidadeDisponivel = null,
        ?float $valor = null,
        ?string $dataCadastro = null
    ): void {
        $this->buscarPorId($id);

        $dados = [
            'nome' => $nome,
        ];

        if ($descricao !== null) {
            $dados['descricao'] = $descricao;
        }

        if ($categoriaId !== null) {
            $dados['categoria_id'] = $categoriaId;
        }

        if ($quantidadeInicial !== null) {
            $dados['quantidade_inicial'] = $quantidadeInicial;
        }

        if ($quantidadeDisponivel !== null) {
            $dados['quantidade_disponivel'] = $quantidadeDisponivel;
        }

        if ($valor !== null) {
            $dados['valor'] = $valor;
        }

        if ($dataCadastro !== null) {
            $dados['data_cadastro'] = $dataCadastro;
        }

        if ($novoId !== null && $novoId !== $id) {
            if ($this->existe($novoId)) {
                throw new \Exception("Já existe um produto com o id {$novoId}!");
            }

            if ($this->possuiVenda($id)) {
                throw new \Exception("Não é possível alterar o id de um produto que possui vendas vinculadas!");
            }

            $dados['id'] = $novoId;
        }

        $resultado = $this->query->update('produto', $dados, "id = {$id}");

        if (! $resultado) {
            throw new \Exception("Erro ao atualizar produto: " . $nome);
        }
    }   

    public function excluir(int $id): void
    {
        $this->buscarPorId($id);

        if ($this->possuiVenda($id)) {
            throw new \Exception("Não é possível excluir o produto, pois existem vendas vinculadas a ele!");
        }

        $resultado = $this->query->delete('produto', "id = {$id}");

        if (! $resultado) {
            throw new \Exception("Erro ao excluir produto!");
        }
    }

    private function existe(int $id): bool
    {
        $resultado = $this->query->select('produto', "id = {$id}", 'COUNT(*) AS total');

        if ($resultado === false) {
            throw new \Exception("Erro ao verificar o produto!");
        }

        return ! empty($resultado[0]['total']);
    }

    private function possuiVenda(int $id): bool
    {
        $resultado = $this->query->select('venda_item', "produto_id = {$id}", 'COUNT(*) AS total');

        if ($resultado === false) {
            throw new \Exception("Erro ao verificar as vendas do produto!");
        }

        return !empty($resultado[0]['total']);
    }


}