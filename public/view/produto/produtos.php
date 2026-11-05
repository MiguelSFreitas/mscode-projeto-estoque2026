<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MS Code - Projeto Estoque 2026</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="/css/styles.css" rel="stylesheet">
</head>

<body>
  <main>
    <div class="border-bottom mb-2">
      <div class="container">
        <header class="d-flex flex-wrap justify-content-center align-items-center py-3">
          <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <img class="me-2" src="/images/logotipo.svg" width="53">
            <span class="fs-4">MS Code - Estoque</span>
          </a>

          <ul class="nav nav-pills d-flex align-items-center">
            <li class="nav-item"><a href="#" class="nav-link" aria-current="page">Início</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Vendas
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="vendas_realizadas.html">Vendas realizadas</a></li>
                <li><a class="dropdown-item" href="nova_venda.html">Nova venda</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Produtos
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item active" href="/produtos">Estoque</a></li>
                <li><a class="dropdown-item" href="/categoria">Categorias</a></li>
              </ul>
            </li>
            <li class="nav-item"><a href="#" class="btn btn-outline-danger m-0 ms-4" aria-current="page">Sair</a></li>
          </ul>
        </header>
      </div>
    </div>

    <div class="container py-5">
      <div class="mb-4 d-flex flex-row justify-content-between">
        <h1>Produtos</h1>
        <div>
          <a href="/novo_produto" class="btn btn-primary"><i class="bi bi-plus"></i>Novo produto</a>
        </div>
      </div>

      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th scope="col">Categoria Id</th>
            <th scope="col">Valor</th>
            <th scope="col">Qtd. Disponível</th>
            <th scope="col-2 text-align-right">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($data['produtos'])): ?>
            <tr>
              <td colspan="7" class="text-center">Nenhum produto cadastrado.</td>
            </tr>
          <?php else: ?>
            <?php foreach ($data['produtos'] as $produto): ?>
              <tr>
                <th scope="row"><?php echo (int) $produto['id']; ?></th>
                <td><?php echo htmlspecialchars($produto['nome']); ?></td>
                <td><?php echo htmlspecialchars($produto['descricao']); ?></td>
                <td><?php echo (int) $produto['categoria_id']; ?></td>
                <td>R$ <?php echo number_format((float) $produto['valor'], 2, ',', '.'); ?></td>
                <td><?php echo (int) $produto['quantidade_disponivel']; ?></td>
                <td class="col-2 text-align-right">
                  <a href="/editar_produto?id=<?php echo (int) $produto['id']; ?>"
                    class="btn btn-secondary btn-sm" title="Editar"><i class="bi bi-pencil"></i></a>
                  <form action="/excluir_produto" method="post" class="d-inline">
                    <input type="hidden" name="id" value="<?php echo (int) $produto['id']; ?>">
                    <button type="submit" class="btn btn-danger btn-sm" title="Excluir"><i
                        class="bi bi-trash"></i></button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>

      </table>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
</body>

</html>