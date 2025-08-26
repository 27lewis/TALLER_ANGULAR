<?php
// --------------------------------------------
// Obtener todos los productos desde la API
// --------------------------------------------
$products = file_get_contents("https://fakestoreapi.com/products");
$products = json_decode($products, true);

// --------------------------------------------
// Seleccionar un producto aleatorio del array
// --------------------------------------------
$randomProduct = $products[array_rand($products)];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Producto Recomendado</title>
  <!-- Bootstrap 5 desde CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5" style="max-width: 600px;">
  <!-- Card que contiene el producto recomendado -->
  <div class="card shadow-lg border-0 rounded-4">
    <!-- Cabecera del card -->
    <div class="card-header bg-dark text-white text-center fw-bold rounded-top-4">
      Producto Recomendado de Hoy
    </div>

    <!-- Cuerpo del card -->
    <div class="card-body text-center">
      <!-- Mostrar el título del producto (truncado si es muy largo) -->
      <h5 class="card-title text-truncate"><?php echo $randomProduct['title']; ?></h5>

      <!-- Imagen del producto -->
      <img src="<?php echo $randomProduct['image']; ?>" 
           class="img-fluid my-3 rounded" 
           style="height:200px; object-fit:contain;" 
           alt="producto">

      <!-- Precio del producto -->
      <p class="fs-5 fw-semibold text-success">💲<?php echo $randomProduct['price']; ?></p>

      <!-- Botones de navegación -->
      <div class="d-grid gap-2">
        <!-- Enlace a la vista detalle, pasando el ID del producto -->
        <a href="detalle.php?id=<?php echo $randomProduct['id']; ?>" class="btn btn-primary">
          Ver Detalles
        </a>
        <!-- Enlace al listado completo de productos -->
        <a href="listado.php" class="btn btn-outline-dark">
          Ver listado
        </a>
      </div>
    </div>
  </div>
</div>

</body>
</html>
