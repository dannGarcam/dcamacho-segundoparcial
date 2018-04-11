<!DOCTYPE HTML>
<html>
<head>
<meta charset='UTF-8'>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Inicio</title>
</head>
<body>
<div class="pagina">
<div class="encabezado">
	<h1>Iniciar sesión</h3>
</div>

<div class="contenido">
<?php
//Se reinicia la sesión para evitar acceso no autorizado
session_start();
$_SESSION['pag']=0;
//Se revisa si no hubo un error en el usuario y contraseña anteriormente o la consulta a la bd
if ($_SESSION['error']==1){
	?><font color="red">Usuario y/o contraseña inválidos, verifique sus datos e intente nuevamente</font><?php
	$_SESSION['error']=0;
}
else if ($_SESSION['error']==2){
	?><font color="red">Error en la base de datos</font><?php
}
?>
<form action="autenticar.php" method="post">
<div class="formInicioSesion">
	<h4>Ingresar datos</h4>
	Usuario: <input type="text" name="usuario" autocomplete="off"><br><br>
	Contraseña: <input type="password" name="contrasenia" autocomplete="off"><br><br>
	<input type="submit" value="Ingresar">
</form>
</div>
</div>

<div class="pie">
	<a href="creditos.php">Creditos</a>
</div>
</div>
</body>
</html>