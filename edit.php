<?php
session_start();

if (isset($_POST['edit'])) {
    // cargar el archivo XML
    $file = simplexml_load_file('files/productos.xml');

    // encontrar el producto por su codigo
    foreach ($file->producto as $product) {
        if ($product->codigo == $_POST['codigo']) {
            // actualizar los valores
            $product->nombre = $_POST['nombre'];
            $product->categoria = $_POST['categoria'];
            $product->precio = $_POST['precio'];
            $product->existencias = $_POST['existencias'];

            // guardar los cambios en el archivo XML
            file_put_contents('files/productos.xml', $file->asXML());

            // establecer mensaje de éxito
            $_SESSION['message'] = "El producto con código " . $_POST['codigo'] . " ha sido actualizado exitosamente.";
            $_SESSION['alert-class'] = "alert-success";

            // redirigir de vuelta a la página principal
            header('location: index.php');
            exit();
        }
    }
}
?>
