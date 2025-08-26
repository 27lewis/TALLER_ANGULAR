<?php
// --------------------------------------------
// Obtener todos los productos desde la API
// --------------------------------------------
$products = file_get_contents("https://fakestoreapi.com/products");
$products = json_decode($products, true);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Listado de Productos</title>
  <!-- Bootstrap 5 desde CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5" style="max-width: 900px;">
  <!-- Card que contiene la tabla de productos -->
  <div class="card shadow-lg border-0 rounded-4">
    <!-- Cabecera del card -->
    <div class="card-header bg-dark text-white text-center fw-bold rounded-top-4">
      Listado de Productos
    </div>

    <!-- Cuerpo del card -->
    <div class="card-body">
      <!-- Tabla responsiva con Bootstrap -->
      <table class="table table-hover align-middle text-center">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Precio</th>
            <th>Descripción</th>
            <th>Opción</th>
          </tr>
        </thead>
        <tbody>
          <!-- Recorrer todos los productos y mostrarlos en filas -->
          <?php foreach ($products as $p): ?>
          <tr>
            <!-- ID del producto -->
            <td><?php echo $p['id']; ?></td>

            <!-- Título con tooltip (muestra completo al pasar el mouse) -->
            <td class="text-truncate" style="max-width: 200px;" title="<?php echo $p['title']; ?>">
              <?php echo $p['title']; ?>
            </td>

            <!-- Precio en verde -->
            <td class="text-success fw-semibold">$<?php echo $p['price']; ?></td>

            <!-- Descripción corta con tooltip -->
            <td class="text-truncate" style="max-width: 250px;" title="<?php echo $p['description']; ?>">
              <?php echo substr($p['description'], 0, 40) . "..."; ?>
            </td>

            <!-- Botón que redirige a la vista detalle -->
            <td>
              <a href="detalle.php?id=<?php echo $p['id']; ?>" class="btn btn-sm btn-primary">
                Ver Detalle
              </a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <!-- Botón Home -->
      <div class="text-center mt-3">
        <a href="index.php" class="btn btn-outline-dark">🏠 Home</a>
      </div>
    </div>
  </div>
</div>

</body>
</html>
