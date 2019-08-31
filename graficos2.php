<?php
session_start();   
if(!isset($_SESSION['admin']))header("location: ../principal.php");  
 
require 'conexion2.php'; 
include_once("sistema/config.php");
$link=$mysqli = new mysqli("localhost", "root","","clinica");
date_default_timezone_set('America/caracas');
$hora = date('H:i:s a');
$fecha = date('d-m-Y ');

$rango= "select sum(case when p_edad between 0 and 10 then 1 else 0 end) p_edad0a2, sum(case when p_edad between 11 and 20 then 1 else 0 end) p_edad3a5, sum(case when p_edad between 21 and 30 then 1 else 0 end) p_edad6a7, sum(case when p_edad between 31 and 100 then 1 else 0 end) p_edad8a15 from pabellonp";


$rango1 = mysqli_query($link,$rango);
$rango2 = mysqli_num_rows($rango1);

$res=mysqli_query($link,$rango);

	if(mysqli_num_rows($res) ){

	while($Rs=mysqli_fetch_array($res)) {

	
		
 $a=$Rs['p_edad0a2'];

   $b=$Rs['p_edad3a5']; 
   $c=$Rs['p_edad6a7']; 
   $d=$Rs['p_edad8a15']; 
 
}
}
 

require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_bar.php');

$datay=array($a,$b,$c,$d);


// Create the graph. These two calls are always required
$graph = new Graph(400,200,'auto');
$graph->SetScale("textlin");

//$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

//
	


		


//
// set major and minor tick positions manually
$graph->yaxis->SetTickPositions(array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15), array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15));
$graph->SetBox(false);

//$graph->ygrid->SetColor('gray');
$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels(array('0-10','11-20','21-30','31-mas'));
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// Create the bar plots
$b1plot = new BarPlot($datay);

// ...and add it to the graPH
$graph->Add($b1plot);


$b1plot->SetColor("white");
$b1plot->SetFillGradient("#4B0082","white",GRAD_LEFT_REFLECTION);
$b1plot->SetWidth(45);
$graph->title->Set("Rango de edades(HISTORIAS CLINICAS)");

// Display the graph
$graph->Stroke();

?>
<img src="grafico.php" alt="" border="0">