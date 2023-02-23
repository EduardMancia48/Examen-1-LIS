<?php
	session_start();
	
	if(isset($_POST['add'])){

		
		// Definimos una expresión regular para validar el formato del código
		$regex = "/^PROD\d{5}$/";
		if (!preg_match($regex, $_POST['codigo'])) {
		  $_SESSION['mensaje'] = 'El código de producto debe tener el formato PROD#####';
		
		  header('location: index.php');
		  exit();
		}
		if ($_POST['existencias'] < 0) {
			$_SESSION['mensaje'] = 'Las existencias no pueden ser negativas';
			header('location: index.php');
			exit();
		}
		
		// Cargamos el archivo XML que contiene los productos
		$productos = simplexml_load_file('files/productos.xml');
		
		// Buscamos en el archivo XML si ya existe un producto con el código que se quiere agregar
		$codigoExistente = $productos->xpath("/productos/producto[codigo='" . $_POST['codigo'] . "']");
		
		// Si el código ya existe, mostramos un mensaje de error y detenemos la ejecución del script
		if ($codigoExistente) {
			$_SESSION['mensaje'] = 'El código de producto ya existe. Intente con otro código.';
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
	


	
		header('location: index.php');
	}
	else{
		// redirigimos al usuario de vuelta al índice
		

		header('location: index.php');
	}
