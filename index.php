<!DOCTYPE html>
<html>

<header class="p-3 bg-dark text-white">
<link rel="icon" href="./img/textil.png" type="image/x-icon">
<link rel="shortcut icon" href="./img/textil.png" type="image/x-icon">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li>
    <a href="#" class="nav-link px-2 text-secondary">
        <img src="./img/textil.png" width="70px"  alt="Descripción de la imagen">
        <strong>TextilExport</strong>
    </a>
</li>

        </ul>


        <div class="text-end">
        <a href="usuario.php">
    <button type="button" class="btn btn-outline-light me-2">Usuario</button>
</a>
         
        </div>
      </div>
    </div>
  </header>

<body>
    <div class="container">
       
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
            <a href="#addnew" class="btn btn-primary" data-toggle="modal" style="position:relative; left:150px; margin:10px;"><span class="glyphicon glyphicon-plus"></span> Nuevo</a>
       
                <?php
                session_start();
                if (isset($_SESSION['message'])) {
                ?>
                    <div class="alert alert-info text-center" style="margin-top:20px;">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                <?php

                    unset($_SESSION['message']);
                }
                ?>
                <table class="table table-bordered table-striped" style="margin-top:20px; right:-145px; position:relative">
                    <thead>
                        <th>Codigo</th>
                        <th>Nombre del producto</th>
                        <th>Imagen</th>
                        <th>Categoria</th>
                        <th>Precio</th>
                        <th>Existencias</th>


                    </thead>
                    <tbody>
                        <?php
                        //load xml file
                        $file = simplexml_load_file('files/productos.xml');

                        foreach ($file->producto as $row) {
                        ?>
                            <tr>

                                <td><?php echo $row->codigo; ?></td>
                                <td><?php echo $row->nombre; ?></td>

                                <td>
                                    <?php
                                    $images = explode(',', $row->img);
                                    foreach ($images as $image) {
                                        echo "<img src='img/$image  ?>' style='width:80px '>";
                                        
                                    }
                                    ?>
                                </td>

                                <td><?php echo $row->categoria; ?></td>
                                <td><?php echo $row->precio; ?></td>
                                <td><?php echo $row->existencias; ?></td>

                                <td>
                                    <a href="#edit_<?php echo $row->codigo; ?>" data-toggle="modal" class="btn btn-success btn-smv " style="padding-top:6px";"><span class="glyphicon glyphicon-edit"></span> Editar</a><br>
                                   <br> <a href="#delete_<?php echo $row->codigo; ?>" data-toggle="modal" class="btn btn-danger btn-sm" style="padding-top:6px"  style=""><span class="glyphicon glyphicon-trash"></span> Eliminar</a>
                                </td>
                                <?php include('eliminar_editarmodal.php'); ?>
                            </tr>
                        <?php
                        }

                        ?>
                    </tbody>
                </table>
            </div>
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

                        