<?php include "conexao.php"; ?>
<?php include "cabecalho.php"; ?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM produtos WHERE id = $id";
$resultado = $conexao->query($sql);
$produto = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Detalhes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <h2 class="mb-4"><?= $produto['nome'] ?></h2>
  <div class="row">
    <div class="col-md-5">
      <img src="<?= $produto['imagem'] ?>" class="img-fluid rounded border" alt="<?= $produto['nome'] ?>">
    </div>
    <div class="col-md-7">
      <p><strong>Descrição:</strong> <?= $produto['descricao'] ?></p>
      <p><strong>Categoria:</strong> <?= $produto['categoria'] ?></p>
      <p><strong>Cor:</strong> <?= $produto['cor'] ?></p>
      <p><strong>Marca:</strong> <?= $produto['marca'] ?></p>
      <p><strong>Preço:</strong> R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
      <p><strong>Estoque:</strong> <?= $produto['quantidade'] ?></p>
      <p><strong>Código de Barras:</strong> <?= $produto['codigo_barra'] ?></p>
      <a href="listagem.php" class="btn btn-secondary mt-3">Voltar</a>
    </div>
  </div>
</div>

</body>
</html>