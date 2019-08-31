<?php

$bd_host = "localhost";
	$bd_usuario = "root";	
	$bd_password = "";
	$bd_base = "clinica";
	$mysqli = new mysqli("localhost", "root","","clinica");
mysqli_connect("localhost", "root","");
@mysqli_query("SET NAMES 'utf8'"); //solucion caracteres especiales como la ñ
mysqli_select_db($mysqli,"clinica");
?>
