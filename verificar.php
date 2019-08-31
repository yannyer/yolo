<?php

session_start();
include("conexion2.php");
$mysqli = new mysqli($bd_host , $bd_usuario,$bd_password, $bd_base );
//$conec=mysqli_connect("localhost", "root");
//$conec1= mysqli_result($conec);

if(isset ($_GET ['n1']) && !empty ($_GET ['n1']) &&
isset ($_GET ['n2']) && !empty ($_GET ['n2']))

$NOMBRE=$_GET['n1'];
$contra2=$_GET['n2'];

$contra = md5 ($contra2);
$PW=$contra;
{

$sel="SELECT * FROM administrador WHERE USER like '".$_GET['n1']."' order by CEDULA";
$row=mysqli_fetch_array(mysqli_query($mysqli,$sel));
if($contra == $PW){
$_SESSION['admin'] = $_GET['n1'];
//$_SESSION['nameadmin'] = $row[$NOMBRE];
echo"si1";
	
}
else{

echo "<p>$_GET[n1] no se encuentra registrado o la Contrase&ntilde;a es Invalida";
}
}




?>




