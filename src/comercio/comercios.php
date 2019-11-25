<?php 
// paginacion 
$url = "index.php?sec=comercios&";
$tamano_pagina = 10;
$comercio = new comercio();


$pagina = @$_GET["pagina"];
if (!$pagina) {
   $inicio = 0;
   $pagina = 1;
   $listar = $comercio->listarpag($inicio,$tamano_pagina);
   $num_total_registros = $comercio->totalpaginas();
}
else {
   $inicio = ($pagina - 1) * $tamano_pagina;
   $listar = $comercio->listarpag($inicio,$tamano_pagina);
   $num_total_registros = $comercio->totalpaginas();
}
//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $tamano_pagina);

?>
<div class="titulo"><?php echo $volver; ?>Comercios</div>

<div><form method="post" action="index.php?sec=buscar_comercio"><input class="form-control" type="text" name="buscar" placeholder="Ingrese nombre o codigo de comercio"></form></div>

<div style="clear: both;"></div>

<div class="botonadd"><a href="index.php?sec=nuevo_comercio">Agregar Comercio</a></div>
<?php
echo "<div class='table-responsive table-bordered table-condensed'><table class='table table-bordered'>
		<tr style='font-weight: bold'>
		<td>Nombre</td>
		<td>Propietario</td>
		<td>Codigo</td>
		<td>Localidad</td>
		<td>Dirección</td>
		<td>E-mail</td>
		<td>Telefono</td>
		<td>Acciones</td>
		</tr>";

if($listar){
	foreach ($listar as $row) {
	echo "<tr>
			  <td>" . $row['nombre_comercio'] . "</td>	
			 <td>" . $row['propietario_comercio'] . "</td>
			 <td>" . $row['id_comercio'] . "</td>	
			 <td>" . $row['nombre_localidad'] . "</td>	
			 <td>" . $row['direccion_comercio'] . "</td>
			 <td>" . $row['email_comercio'] . "</td>
			 <td>" . $row['telefono_comercio'] . "</td>
			 <td><a href=index.php?sec=modificar_comercio&id=$row[id_comercio]><img src=img/icons/editar.svg width=16></a> | 
			 <a href=index.php?sec=eliminar_comercio&id=$row[id_comercio]><img src=img/icons/eliminar.svg width=16></a></td>
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
            echo '  <a href="'.$url.'?pagina='.$i.'">'.$i.'</a>  ';
      }
      if ($pagina != $total_paginas)
         echo '<a href="'.$url.'pagina='.($pagina+1).'"> <img src=img/icons/adelante.svg width=16> </a>';
}

?>

</div>