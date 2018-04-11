<!DOCTYPE HTML>
<html>
<head>
<title>Alta</title>
</head>
<body>
<?php
	include 'conexion.php';
	$conn = conectar();
	$err = 0;
	session_start();
	if ($_SESSION['pag']==0){
		header("Location: login.php");
	}

	if ($_SESSION['alta']==1){
		$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
		$apaterno = filter_var($_POST['apaterno'], FILTER_SANITIZE_STRING);
		$amaterno = filter_var($_POST['amaterno'], FILTER_SANITIZE_STRING);
		$usuario = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
		if ($_POST['pass']){
			$pass = md5($_POST['pass']);	
		}
		else {
			$pass = "";
			$err = 1;
		}
		if ($nombre) {
			if(!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$nombre)){
				$err = 1;
			}
		} else{
			$err = 1;
		}
		if ($apaterno) {
			if (!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$apaterno)) {
				$err = 1;
			}
		} else{
			$err = 1;
		}
		if ($amaterno) {
			if (!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$amaterno)) {
			$err = 1;
			}
		}
		if (!$usuario) {
			$err = 1;
		}
		if (!$pass) {
			$err = 1;
		}
		if ($err == 0) {
			$query = ("INSERT INTO usuarios (nombre,apaterno,amaterno,usuario,contraseña) VALUES ('$nombre','$apaterno','$amaterno','$usuario','$pass')");
			$process = pg_query($conn, $query);
			if  (!$process) {
				 $_SESSION['bd']=1;
			}
			else {
				 $_SESSION['bd']=2;
			}
			} else{
				$_SESSION['bd']=1;
			}

		pg_close($conn);
		$_SESSION['pag']=1;
		$_SESSION['alta']=0;
		header("Location: menu.php");
	}

	else if ($_SESSION['alta']==2){
		$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
		$apaterno = filter_var($_POST['apaterno'], FILTER_SANITIZE_STRING);
		$amaterno = filter_var($_POST['amaterno'], FILTER_SANITIZE_STRING);
		$nacionalidad = filter_var($_POST['nacionalidad'], FILTER_SANITIZE_STRING);

		if ($nombre) {
			if(!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$nombre)){
				$err = 1;
			}
		} else{
			$err = 1;
		}

		if ($apaterno) {
			if (!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$apaterno)) {
				$err = 1;
			}
		} else{
			$err = 1;
		}
		if ($amaterno) {
			if (!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$amaterno)) {
				$err = 1;
			}
		}
		if ($nacionalidad) {
			if (!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$apaterno)) {
				$err = 1;
			}
		} else{
			$err = 1;
		}

		if ($err == 0) {
			$query = ("INSERT INTO autores (nombre,apaterno,amaterno,nacionalidad) VALUES ('$nombre','$apaterno','$amaterno','$nacionalidad')");
			$process = pg_query($conn, $query);
			if  (!$process) {
			   $_SESSION['bd']=1;
			}
			else {
			   $_SESSION['bd']=2;
			}
		} else{
			$_SESSION['bd']=1;

		}

		pg_close($conn);
		$_SESSION['pag']=1;
		$_SESSION['alta']=0;
		header("Location: menu.php");
	} 

	else if ($_SESSION['alta']==3){
		$titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_STRING);
		$autor = $_POST['autor'];
		$anyo = $_POST['anyo'];

		if(!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$titulo)){
				echo "Error: Titulo invalido<br>";
				$err = 1;
		}

		if ($err == 0) {
			$query = ("INSERT INTO libros (titulo,id_autor,año) VALUES ('$titulo','$autor','$anyo')");
			$process = pg_query($conn, $query);
			if  (!$process) {
			   $_SESSION['bd']=1;
			}
			else {
			   $_SESSION['bd']=2;
			}
		} else{
			$_SESSION['bd']=1;

		}

		pg_close($conn);
		$_SESSION['pag']=1;
		$_SESSION['alta']=0;
		header("Location: menu.php");
	}

	else if ($_SESSION['alta']==0){
		$_SESSION['pag']=0;
		header("Location: login.php");
	}
?>
</body>
</html>
