<?php
session_start();

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];

    // Cargar el archivo XML existente
    $xml = simplexml_load_file('files/productos.xml');
    if ($xml === false) {
        $_SESSION['message'] = 'Error: No se puede cargar el archivo XML';
        $_SESSION['message_type'] = 'danger';
        header('Location: index.php');
        exit();
    }

    // Buscar el elemento a eliminar
    $elemento = null;
    foreach ($xml->producto as $producto) {
        if ($producto->codigo == $codigo) {
            $elemento = $producto;
            break;
        }
    }

    if ($elemento) {
        // Eliminar el elemento del archivo XML
        unset($elemento[0]);

        // Guardar el archivo XML modificado en un nuevo archivo
        $nuevoXml = new SimpleXMLElement('<productos></productos>');
        foreach ($xml->producto as $producto) {
            if ($producto->codigo != $codigo) {
                $nuevoProducto = $nuevoXml->addChild('producto');
                $nuevoProducto->addChild('codigo', $producto->codigo);
                $nuevoProducto->addChild('nombre', $producto->nombre);
                $nuevoProducto->addChild('img', $producto->img);
                $nuevoProducto->addChild('categoria', $producto->categoria);
                $nuevoProducto->addChild('precio', $producto->precio);
                $nuevoProducto->addChild('existencias', $producto->existencias);
            }
        }

        $nuevoXml->asXML('files/productos.xml');

        $_SESSION['message'] = 'Producto eliminado correctamente';
        $_SESSION['message_type'] = 'danger';
    } else {
        $_SESSION['message'] = 'No se encontró el producto a eliminar';
        $_SESSION['message_type'] = 'warning';
    }
} else {
    $_SESSION['message'] = 'Error: No se recibió el código del producto a eliminar';
    $_SESSION['message_type'] = 'danger';
}

header('Location: index.php');
exit;

?>
