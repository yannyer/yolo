<?php
$cn=mysqli_connect("localhost","root","");
$db=mysqli_select_db($cn,"clinica");
return($cn);
return($db);
?>
