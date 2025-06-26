<?php include "conexao.php"; ?>
<?php include "cabecalho.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Papelaria Criativa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <h1 class="text-center mb-4">Papelaria Criativa</h1>

  <!-- Banner rotatório -->
  <div id="carouselExample" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://images.tcdn.com.br/img/img_prod/1106500/1749736465_desktop_2.jpg" class="d-block w-100" alt="Banner 1">
      </div>
      <div class="carousel-item">
        <img src="https://images.tcdn.com.br/img/img_prod/1106500/1747060317_desktop_9.jpg" class="d-block w-100" alt="Banner 2">
      </div>
      <div class="carousel-item">
        <img src="https://images.tcdn.com.br/img/img_prod/1106500/1748440945_desktop_2.jpg" class="d-block w-100" alt="Banner 3">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>

  <h2 class="text-center mb-4">Produtos em Destaque</h2>
  <div class="row">
    <?php
    $sql = "SELECT * FROM produtos LIMIT 4";
    $resultado = $conexao->query($sql);
    while ($produto = $resultado->fetch_assoc()) {
    ?>
      <div class="col-md-3 mb-4">
        <div class="card h-100">
          <img src="<?= $produto['imagem'] ?>" class="card-img-top" alt="<?= $produto['nome'] ?>">
          <div class="card-body">
            <h5 class="card-title"><?= $produto['nome'] ?></h5>
            <p class="card-text">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
            <a href="detalhe.php?id=<?= $produto['id'] ?>" class="btn btn-primary w-100">Ver Detalhes</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

  <div class="text-center">
    <a href="listagem.php" class="btn btn-outline-secondary">Ver todos os produtos</a>
  </div>
</div>
<?php include "rodape.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>