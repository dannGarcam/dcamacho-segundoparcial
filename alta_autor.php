<!DOCTYPE HTML>
<html>
<head>
<meta charset='UTF-8'>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Alta autor</title>
</head>
<body>
<div class="pagina">
<?php
session_start();

if ($_SESSION['pag']==0){
	header("Location: login.php");
}

$_SESSION['pag']=0;

$_SESSION['alta']=2;
?>
<div class="encabezado">
<h1>Nuevo autor</h1>
</div>

<div class="contenido">
<form action="alta.php" method="post">
<h2>Ingrese los datos del autor</h2>
<div class="form">
Nombre: <input type="text" name="nombre" required><br><br>
Apellido paterno: <input type="text" name="apaterno" required><br><br>
Apellido materno: <input type="text" name="amaterno"><br><br>
País de origen: <input type="text" name="autor" required><br><br>
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
