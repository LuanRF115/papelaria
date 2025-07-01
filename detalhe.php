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
  <title><?= $produto['nome'] ?> - Detalhes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="estilo.css">
</head>
<body>

<div class="container mt-5 mb-5">
  <div class="produto-detalhe">
    <div class="row align-items-center">
      <div class="col-md-20 text-center">
        <img src="<?= $produto['imagem'] ?>" class="img-fluid img-produto" alt="<?= $produto['nome'] ?>">
      </div>
      <div class="col-md-10">
        <h2><?= $produto['nome'] ?></h2>
        <p><strong>Descrição:</strong> <?= $produto['descricao'] ?></p>
        <p><strong>Categoria:</strong> <?= $produto['categoria'] ?></p>
        <p><strong>Cor:</strong> <?= $produto['cor'] ?></p>
        <p><strong>Marca:</strong> <?= $produto['marca'] ?></p>
        <p><strong>Preço:</strong> R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
        <p><strong>Estoque:</strong> <?= $produto['quantidade'] ?></p>
        <p><strong>Código de Barras:</strong> <?= $produto['codigo_barra'] ?></p>
        <a href="listagem.php" class="btn btn-voltar mt-3">← Voltar</a>
      </div>
    </div>
  </div>
</div>

<?php include "rodape.php"; ?>
</body>
</html>
