<?php
// Obtener id desde GET
$id = isset($_GET['id']) ? intval($_GET['id']) : 1;

// Obtener producto
$product = file_get_contents("https://fakestoreapi.com/products/$id");
$product = json_decode($product, true);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Detalle del Producto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5" style="max-width: 700px;">
  <div class="card shadow-lg border-0 rounded-4">
    <div class="card-header bg-dark text-white text-center fw-bold rounded-top-4">
      Detalle del Producto
    </div>
    <div class="card-body text-center">
      <img src="<?php echo $product['image']; ?>" 
           class="img-fluid my-3 rounded" 
           style="height:220px; object-fit:contain;" 
           alt="producto">
      <h4 class="card-title fw-bold"><?php echo $product['title']; ?></h4>
      <p class="fs-5 fw-semibold text-success">💲<?php echo $product['price']; ?></p>
      <p><span class="fw-bold">Categoría:</span> <?php echo $product['category']; ?></p>
      <p class="text-muted"><?php echo $product['description']; ?></p>
      <div class="d-grid gap-2 mt-3">
        <a href="listado.php" class="btn btn-primary">⬅️ Volver al listado</a>
        <a href="index.php" class="btn btn-outline-dark">🏠 Home</a>
      </div>
    </div>
  </div>
</div>

</body>
</html>
