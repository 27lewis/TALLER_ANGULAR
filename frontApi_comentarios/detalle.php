<?php
// --------------------------------------------
// Obtener el ID desde la URL con GET
// Si no viene definido, se usa por defecto el ID 1
// --------------------------------------------
$id = isset($_GET['id']) ? intval($_GET['id']) : 1;

// --------------------------------------------
// Consultar el producto específico en la API
// --------------------------------------------
$product = file_get_contents("https://fakestoreapi.com/products/$id");
$product = json_decode($product, true);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Detalle del Producto</title>
  <!-- Bootstrap 5 desde CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5" style="max-width: 700px;">
  <!-- Card con la información del producto -->
  <div class="card shadow-lg border-0 rounded-4">
    <!-- Cabecera -->
    <div class="card-header bg-dark text-white text-center fw-bold rounded-top-4">
      Detalle del Producto
    </div>

    <!-- Cuerpo -->
    <div class="card-body text-center">
      <!-- Imagen del producto -->
      <img src="<?php echo $product['image']; ?>" 
           class="img-fluid my-3 rounded" 
           style="height:220px; object-fit:contain;" 
           alt="producto">

      <!-- Título -->
      <h4 class="card-title fw-bold"><?php echo $product['title']; ?></h4>

      <!-- Precio -->
      <p class="fs-5 fw-semibold text-success">💲<?php echo $product['price']; ?></p>

      <!-- Categoría -->
      <p><span class="fw-bold">Categoría:</span> <?php echo $product['category']; ?></p>

      <!-- Descripción -->
      <p class="text-muted"><?php echo $product['description']; ?></p>

      <!-- Botones de navegación -->
      <div class="d-grid gap-2 mt-3">
        <!-- Regresar al listado -->
        <a href="listado.php" class="btn btn-primary">⬅️ Volver al listado</a>
        <!-- Ir a Home -->
        <a href="index.php" class="btn btn-outline-dark">🏠 Home</a>
      </div>
    </div>
  </div>
</div>

</body>
</html>
