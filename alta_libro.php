<!DOCTYPE HTML>
<html>
<head>
<meta charset='UTF-8'>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Alta libro</title>
</head>
<body>
<div class="pagina">
<?php
session_start();
$_SESSION['alta']=3;

if ($_SESSION['pag']==0){
	header("Location: login.php");
}

$_SESSION['pag']=0;

include 'conexion.php';
$conn = conectar();


$query = ("SELECT id_autor,nombre,apaterno FROM autores");

$process = pg_query($conn, $query);
?>

<div class="encabezado">
<h1>Nuevo libro</h1>
</div>

<div class="contenido">

<form action="alta.php" method="post">
<h2>Ingrese los datos del libro</h2>
<div class="form">
Titulo: <input type="text" name="titulo" required><br><br>
Autor: <select name="autor" required>
<?php
	while ($row = pg_fetch_row($process)) {
	  echo '<option value="'.$row[0].'">'.$row[1].' '.$row[2].'</option>';
	}
?>
</select><br><br>
Año de publicación: <input type="number" min="0000" max="2018" step="1" value="2018" name="anyo" required><br><br>
<input type="submit" value="Enviar">
</form>
</div>
</div>

<div class="pie">
	<a href="creditos.php">Creditos</a>
</div>
</div>
</body>
</html>
