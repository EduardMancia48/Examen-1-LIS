<!DOCTYPE html>
<html>

<header class="p-3 bg-dark text-white">
  <link rel="icon" href="./img/textil.png" type="image/x-icon">
  <link rel="shortcut icon" href="./img/textil.png" type="image/x-icon">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
          <use xlink:href="#bootstrap"></use>
        </svg>
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li>
          <a href="usuario.php" class="nav-link px-2 text-secondary">
            <img src="./img/textil.png" width="70px" alt="Descripción de la imagen">
            <strong>TextilExport</strong>
          </a>

      </ul>

      <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" method="get">
        <input type="search" class="form-control form-control-dark" placeholder="Buscar..." name="search" aria-label="Buscar">

      </form>
      <button type="search" class="btn btn-outline-light me-2">Buscar</button>
      <a href="login.php"><button type="admin" class="btn btn-outline-light me-2">Admin</button></a>


    </div>
  </div>
</header>

<body>
  <div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php
      // load xml file
      $file = simplexml_load_file('files/productos.xml');

      $searchTerm = $_GET['search'] ?? '';
      foreach ($file->producto as $row) {
        $nombre = (string) $row->nombre;
        $categoria = (string) $row->categoria;
        if (empty($searchTerm) || stripos($nombre, $searchTerm) !== false || stripos($categoria, $searchTerm) !== false) {
      ?>
          <div class="col">
            <div class="card h-100">
              <img src="img/<?php echo $row->img ?>" class="card-img-top" alt="<?php echo $row->nombre ?>">
              <div class="card-body">
                <h5 class="card-title"><?php echo $nombre ?></h5>
                <p class="card-text">Categoría: <?php echo $categoria ?></p>
                <p class="card-text">Precio: <?php echo $row->precio ?></p>
                <p class="card-text">Descripcion: <?php echo $row->descripcion ?></p>
                <p class="card-text">Existencias: <?php echo $row->existencias ?></p>
                <?php if ($row->existencias == 0) { ?>
                  <p class="card-text text-danger">No disponible</p>
                <?php } ?>
              </div>
            </div>
          </div>
      <?php
        }
      }
      ?>
    </div>

  </div>

  <?php include('agregar_modal.php'); ?>


  <script src="jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

</body>
<footer class="bg-dark text-center py-3 text-white">
  <h6>LIS 03L</h6>
</footer>

</html>