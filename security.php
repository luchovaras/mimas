<?php

$_SESSION['hora']=time();

if (($_SESSION['hora']+1200) > time()) 
{ 
session_unset(); 
session_destroy(); 
echo "Lo siento tu sesión ha expirado, has estado mas de 20 minutos inactivo\n"; 
echo '<a href="index.php">Clic aqui para volver a loguearte</a>'; 
// tambien puedes usar un header 
} 
else 
{ 
$_SESSION['hora']=time(); 
} 
?>