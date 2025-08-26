<?php
// Obtener listado de productos
$products = file_get_contents("https://fakestoreapi.com/products");
$products = json_decode($products, true);

// Producto aleatorio
$randomProduct = $products[array_rand($products)];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Producto Recomendado</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5" style="max-width: 600px;">
  <div class="card shadow-lg border-0 rounded-4">
    <div class="card-header bg-dark text-white text-center fw-bold rounded-top-4">
      Producto Recomendado de Hoy
    </div>
    <div class="card-body text-center">
      <h5 class="card-title text-truncate"><?php echo $randomProduct['title']; ?></h5>
      <img src="<?php echo $randomProduct['image']; ?>" 
           class="img-fluid my-3 rounded" 
           style="height:200px; object-fit:contain;" 
           alt="producto">
      <p class="fs-5 fw-semibold text-success">💲<?php echo $randomProduct['price']; ?></p>
      <div class="d-grid gap-2">
        <a href="detalle.php?id=<?php echo $randomProduct['id']; ?>" class="btn btn-primary">
          Ver Detalles
        </a>
        <a href="listado.php" class="btn btn-outline-dark">
          Ver listado
        </a>
      </div>
    </div>
  </div>
</div>

</body>
</html>
