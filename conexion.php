<?php
//Declarar funcion que devuelva la conexion a la bd
function conectar(){
	$conn = pg_connect("host=127.0.0.1 port=5432 dbname=segundoexamenbd user=examen2_user password=holamundo.,");
	return $conn;
}
?>
