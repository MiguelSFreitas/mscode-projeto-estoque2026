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
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Vendas
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="vendas_realizadas.html">Vendas realizadas</a></li>
                <li><a class="dropdown-item" href="nova_venda.html">Nova venda</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
      <div class="mb-4">
        <h1>Novo produto</h1>
      </div>

      <div class="w-50 mt-2">
        <form action="/cadastrar_produto" method="post">
          <div class="mb-3">
            <label for="id" class="form-label">Id: </label>
            <input type="number" min="0" class="form-control" id="id" name="id" required>
          </div>
          <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
          </div>
          <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" style="resize:none;" rows="5"
              required></textarea>
          </div>
          <div class="row">
            <div class="mb-3 col-4">
              <label for="categoria_id" class="form-label">Categoria Id</label>
              <input type="number" min="0" class="form-control" id="categoria_id" name="categoria_id" required>
            </div>
            <div class="mb-3 col-4">
              <label for="quantidade_inicial" class="form-label">Qtd. Inicial</label>
              <input type="number" min="0" class="form-control" id="quantidade_inicial" name="quantidade_inicial"
                required>
            </div>
            <div class="mb-3 col-4">
              <label for="quantidade_disponivel" class="form-label">Qtd. Disponível</label>
              <input type="number" min="0" class="form-control" id="quantidade_disponivel"
                name="quantidade_disponivel" required>
            </div>
          </div>
          <div class="row">
            <div class="mb-3 col-4">
              <label for="valor" class="form-label">Valor</label>
              <input type="number" min="0" step="0.01" class="form-control" id="valor" name="valor" required>
            </div>
            <div class="mb-3 col-8">
              <label for="data_cadastro" class="form-label">Data de cadastro</label>
              <input type="datetime-local" class="form-control" id="data_cadastro" name="data_cadastro"
                value="<?php echo date('Y-m-d\TH:i'); ?>" required>
            </div>
          </div>
          <a href="/produtos" class="btn btn-outline-secondary">Cancelar</a>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
</body>

</html>