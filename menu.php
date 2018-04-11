<!DOCTYPE HTML>
<html>
<head>
<meta charset='UTF-8'>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Menu</title>
</head>
<body>
	<div class="pagina">
		<div class="encabezado">
		<h1>Menu</h1>
		</div>

		<div class="contenido">
		<?php
		session_start();
		if ($_SESSION['pag']==1) {
			if ($_SESSION['bd']==1){
				?><font color="red">No se pudo realizar el registro<br><br></font><?php
				$_SESSION['bd']=0;
			}
			else if ($_SESSION['bd']==2){
				?><font color="green">El registro se ha realizado exitosamente<br><br></font><?php
				$_SESSION['bd']=0;
			}
			?>
		<div class="menu">
			<a href="alta_usuario.php">Alta usuarios</a><br><br>
			<a href="alta_autor.php">Alta autores</a><br><br>
			<a href="alta_libro.php">Alta libros</a><br><br>
			</div>
			</div>			
			<div class="pie">
				<a href="creditos.php">Creditos</a>
			</div>
			<?php
		}
		else{
			header("Location: login.php");
		}
		?>
	</div>
</body>
</html>