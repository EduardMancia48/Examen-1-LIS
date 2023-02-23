<?php
	session_start();
	
	if(isset($_POST['add'])){

		
		// Definimos una expresión regular para validar el formato del código
		$regex = "/^PROD\d{5}$/";
		if (!preg_match($regex, $_POST['codigo'])) {
		  $_SESSION['message'] = 'El código de producto debe tener el formato PROD#####';
		  echo '<div style="background-color:#FF9999; width: 50%; margin: 0 auto; text-align: center; padding: 10px;">'.$_SESSION['message'].'</div>';
		  header('location: index.php');
		  exit();
		}
		if ($_POST['existencias'] < 0) {
			$_SESSION['message'] = 'Las existencias no pueden ser negativas';
			header('location: index.php');
			exit();
		}
		
		// Cargamos el archivo XML que contiene los productos
		$productos = simplexml_load_file('files/productos.xml');
		
		// Buscamos en el archivo XML si ya existe un producto con el código que se quiere agregar
		$codigoExistente = $productos->xpath("/productos/producto[codigo='" . $_POST['codigo'] . "']");
		
		// Si el código ya existe, mostramos un mensaje de error y detenemos la ejecución del script
		if ($codigoExistente) {
			$_SESSION['message'] = 'El código de producto ya existe. Intente con otro código.';
			header('location: index.php');
			exit();
		}

		// Creamos un nuevo elemento "producto" en el archivo XML y agregamos los datos del formulario
		$producto = $productos->addChild('producto');
		$producto->addChild('codigo', $_POST['codigo']);
		$producto->addChild('nombre', $_POST['nombre_producto']);
		$producto->addChild('descripcion', $_POST['descripcion']);
		$producto->addChild('img', $_POST['img']);
		$producto->addChild('categoria', $_POST['categoria']);
		$producto->addChild('precio', $_POST['precio']);
		$producto->addChild('existencias', $_POST['existencias']);
	
		// Guardamos el archivo XML con los cambios realizados
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($productos->asXML());
		$dom->save('files/productos.xml');
	
		// Mostramos un mensaje de éxito y redirigimos al usuario de vuelta al índice
		$_SESSION['message'] = 'Producto agregado exitosamente';
		header('location: index.php');
	}
	else{
		// Si el usuario no ha enviado el formulario de adición, mostramos un mensaje de error y redirigimos al usuario de vuelta al índice
		$_SESSION['message'] = 'Por favor, complete el formulario de adición primero';
		header('location: index.php');
	}
?>