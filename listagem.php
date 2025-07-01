<?php include "conexao.php"; ?>
<?php include "cabecalho.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Produtos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #fdfaff;
    }

    .produto-card {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.08);
      transition: 0.3s;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 15px;
      position: relative;
    }

    .produto-card:hover {
      transform: scale(1.03);
      box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }

    .produto-card img {
      max-height: 180px;
      object-fit: contain;
      margin-bottom: 10px;
    }

    .produto-nome {
      font-size: 1rem;
      font-weight: 600;
      color: #444;
    }

    .preco-original {
      text-decoration: line-through;
      color: #999;
      font-size: 0.9rem;
      margin: 0;
    }

    .preco-final {
      color: #ff4d88;
      font-size: 1.25rem;
      font-weight: bold;
      margin-bottom: 0;
    }

    .btn-comprar {
      background-color: #00c4cc;
      color: white;
      font-weight: bold;
      border-radius: 30px;
      padding: 8px 16px;
      border: none;
      transition: 0.3s;
      text-transform: uppercase;
    }

    .btn-comprar:hover {
      background-color: #00a3a8;
    }

    .desconto-badge {
      background-color: #ff5fa2;
      color: white;
      font-size: 0.85rem;
      font-weight: bold;
      padding: 5px 10px;
      border-radius: 8px;
      position: absolute;
      top: 10px;
      right: 10px;
    }
  </style>
</head>
<body>

<div class="container mt-4">
  <h2 class="text-center mb-4">📦 Todos os Produtos</h2>
  <div class="row">
    <?php
    $sql = "SELECT * FROM produtos";
    $resultado = $conexao->query($sql);
    while ($produto = $resultado->fetch_assoc()) {
      // Lógica para aplicar desconto, se existir
      $preco = $produto['preco'];
      $desconto = isset($produto['desconto']) ? (int)$produto['desconto'] : 0;
      $precoFinal = $preco;

      if ($desconto > 0) {
        $precoFinal = $preco * (1 - $desconto / 100);
      }
    ?>
      <div class="col-md-3 mb-4">
        <div class="produto-card">
          <?php if ($desconto > 0): ?>
            <span class="desconto-badge">-<?= $desconto ?>%</span>
          <?php endif; ?>

          <img src="<?= $produto['imagem'] ?>" alt="<?= $produto['nome'] ?>" class="img-fluid">

          <h5 class="produto-nome"><?= $produto['nome'] ?></h5>

          <?php if ($desconto > 0): ?>
            <p class="preco-original">R$ <?= number_format($preco, 2, ',', '.') ?></p>
            <p class="preco-final">R$ <?= number_format($precoFinal, 2, ',', '.') ?></p>
          <?php else: ?>
            <p class="preco-final">R$ <?= number_format($preco, 2, ',', '.') ?></p>
          <?php endif; ?>

          <a href="detalhe.php?id=<?= $produto['id'] ?>" class="btn btn-comprar mt-2">Comprar</a>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<?php include "rodape.php"; ?>
</body>
</html>
