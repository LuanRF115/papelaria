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

    <div class="row mt-5">
      <div class="col-6">
        <img src="https://images.tcdn.com.br/img/img_prod/1106500/livro_de_colorir_bobbie_goods_20589_1_2f6e5e0c70ebda3f1d36295c5c4a3a16.jpg" class="img-fluid">
      </div>
      <div class="col-6 align-content-center">
        <p class="fs-5 fw-light">🎨 Caderno de Colorir Boobbie Goods – Descrição Completa
          Descrição:
          O Caderno de Colorir Boobbie Goods é perfeito para soltar a criatividade dos pequenos (e dos grandões também!).
          Com páginas divertidas para colorir e canetinhas inclusas, ele transforma qualquer momento em pura diversão educativa. Ideal para estimular a imaginação, coordenação motora e o amor pelas cores!
        </p>
        <p class="fs-5 fw-light">Destaques:

          Páginas com ilustrações exclusivas para colorir

          Acompanha canetinhas coloridas

          Capa dura resistente e divertida

          Tamanho ideal para levar na mochila

          Indicado para crianças a partir de 3 anos</p>
        <a href="detalhe.php?id=12" class="btn btn-success btn-lg">ADQUIRA AGORA</a>
      </div>
    </div>
    <div class="row">
      <div class="col-6 align-content-center">
        <p class="fs-5 fw-light">🎨 Estojo de Canetinha Colorir Boobbie Goods – Descrição Completa
          Descrição:
          O Estojo Boobbie Goods é perfeito para guardar canetinhas, lápis de cor, giz de cera e tudo que a imaginação mandar!
          Com design divertido e colorido, ele é ideal para o dia a dia escolar ou momentos de pintura em casa. Compacto, resistente e super estiloso, é o companheiro ideal para os pequenos artistas!
        <p class="fs-5 fw-light">Destaques:

          Espaço interno ideal para canetinhas, lápis e muito mais

          Fechamento com zíper seguro

          Estampa infantil alegre e criativa

          Material leve e fácil de limpar

          Perfeito para combinar com o caderno de colorir Boob Good</p> <a href="detalhe.php?id=11" class="btn btn-success btn-lg">ADQUIRA AGORA </a>
      </div>
      <div class="col-6">
        <img src="https://images.tcdn.com.br/img/img_prod/1106500/estojo_de_canetas_escolar_touch_com_ponta_dupla_100_cores_bolsa_para_bobbie_goods_21117_1_0c26505021de2bab83d46c2584f7d782.jpg" class="img-fluid">
      </div>
    </div>

    <div class="text-center">
      <a href="listagem.php" class="btn btn-outline-secondary">Ver todos os produtos</a>
    </div>
  </div>
  <?php include "rodape.php"; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>