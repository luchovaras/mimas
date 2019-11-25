<?php 
// paginacion 
$url = "index.php?sec=usuarios&";
$tamano_pagina = 20;
$usuario = new usuario();

$numerous = $usuario->num_registrados();

$pagina = @$_GET["pagina"];
if (!$pagina) {
   $inicio = 0;
   $pagina = 1;
   $listar = $usuario->listarpag($inicio,$tamano_pagina);
   $num_total_registros = $usuario->totalpaginas();
}
else {
   $inicio = ($pagina - 1) * $tamano_pagina;
   $listar = $usuario->listarpag($inicio,$tamano_pagina);
   $num_total_registros = $usuario->totalpaginas();
}
//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $tamano_pagina);


?>

<div class="titulo"><?php echo $numerous; ?> Usuarios</div>

<div><form method="post" action="index.php?sec=buscar_usuario"><input class="form-control" type="text" name="buscar" placeholder="Ingrese nombre, apellido o tarjeta"></form></div>

<div style="clear: both;margin-bottom:10px;"></div>

<?php
echo "<div class='table-responsive table-bordered table-condensed'><table class='table table-bordered'>
		<tr style='font-weight: bold'>
		<td>Nombre</td>
		<td>Apellido</td>
		<td>Tarjeta</td>
		<td>Email</td>
		<td>Telefono</td>
		<td>Direcci�n</td>
		<td>Acciones</td>
		</tr>";

if($listar){
	foreach ($listar as $row) {
	echo "<tr>
			  <td>" . utf8_decode($row['nombre_usuario']) . "</td>	
			 <td>" . utf8_decode($row['apellido_usuario']) . "</td>	
			 <td>" . $row['id_usuario'] . "</td>	
			 <td>" . $row['email_usuario'] . "</td>
			 <td>" . $row['telefono_usuario'] . "</td>
			 <td>" . utf8_decode($row['direccion_usuario']) . "</td>	
			 <td>
			 	<a href=index.php?sec=ver_resumen&id=$row[usuario_usuario]&n=$row[nombre_usuario]&a=$row[apellido_usuario]&l=$row[localidad_usuario]><img src=img/icons/ver.svg width=16 /></a>
			 </td> 
		</tr>";	
	}
}

echo "</table></div>";

echo "<div align=center>";

if ($total_paginas > 1) {
   if ($pagina != 1)
      echo '<a href="'.$url.'pagina='.($pagina-1).'"> <img src=img/icons/atras.svg width=16> </a>';
      for ($i=1;$i<=$total_paginas;$i++) {
         if ($pagina == $i)
            //si muestro el índice de la página actual, no coloco enlace
            echo $pagina;
         else
            //si el índice no corresponde con la página mostrada actualmente,
            //coloco el enlace para ir a esa página
            echo '  <a href="'.$url.'pagina='.$i.'">'.$i.'</a>  ';
      }
      if ($pagina != $total_paginas)
         echo '<a href="'.$url.'pagina='.($pagina+1).'"> <img src=img/icons/adelante.svg width=16> </a>';
}

?>

</div>
