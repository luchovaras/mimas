<?php
$id = @$_GET['id'];
$lead = new lead();
$resul = $lead->seleccionar_lead($id);
$listar = $lead->registros_lead($id);
if($resul){
	foreach ($resul as $row) {
	}
?>
<div><strong>Informaci&oacute;n Personal</strong><span><small><i> | Ultimo contacto 14/11/2019</i></small></span></div><hr>
<div class="row">

<div class="col-md-6">
	<div><?php echo "Nombre: " . utf8_decode($row['nombres']) . " " .utf8_decode($row['apellidos']);?></div>

	<div><?php echo "Email: " . $row['correo']; ?></div>

	<div><?php echo "Estado: " . $row['nombre']; ?></div>
	
	<div><?php echo "Departamento: " . utf8_decode($row['departamento']); ?></div>
	
	<div><?php echo "Municipio: " . utf8_decode($row['municipio']); ?></div>

	<div><a href=<?php echo "index.php?sec=modificar_info"; ?>>Editar</a>
	<?php } // End IF?>
</div>
</div>

<div style="float: left; margin-top: 50px" class="container">
<strong>Programas</strong>
<?php
echo "<div><table style=text-align:center; class='table table-responsive table-condensed'>
		<tr>
		<td>Facultad</td>
		<td>Programa</td>
		<td>Fecha</td>
		</tr>";

if($listar){
	foreach ($listar as $row) {
	echo "<tr>
			 <td>" . utf8_decode($row['nombre_facultad']) . "</td>	
			 <td>" . utf8_decode($row['nombre_programa']) . "</td>
			 <td>" . $row['fecha_registro'] . "</td>
		</tr>";	
	}
}

echo "</table></div>";

echo "<div align=center>";

if ($total_paginas > 1) {
   if ($pagina != 1)
      echo '<a href="'.$url.'pagina='.($pagina-1).'"> pa tras < </a>|';
      for ($i=1;$i<=$total_paginas;$i++) {
         if ($pagina == $i)
            echo $pagina;
         else
            echo '  <a href="'.$url.'pagina='.$i.'">'.$i.'</a>  ';
      }
      if ($pagina != $total_paginas)
         echo '| <a href="'.$url.'pagina='.($pagina+1).'">> pa delante </a>';
}

?>

</div>