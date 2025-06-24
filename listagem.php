<?php include "conexao.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Produtos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <h2 class="text-center mb-4">Todos os Produtos</h2>
  <div class="row">
    <?php
    $sql = "SELECT * FROM produtos";
    $resultado = $conexao->query($sql);
    while ($produto = $resultado->fetch_assoc()) {
    ?>
      <div class="col-md-3 mb-4">
        <div class="card h-100">
          <img src="<?= $produto['imagem'] ?>" class="card-img-top" alt="<?= $produto['nome'] ?>">
          <div class="card-body">
            <h5 class="card-title"><?= $produto['nome'] ?></h5>
            <p class="card-text">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
            <a href="detalhe.php?id=<?= $produto['id'] ?>" class="btn btn-success w-100">Detalhes</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

</body>
</html>