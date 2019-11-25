<?php 
$busqueda = @$_POST['buscar'];
$comercio = new comercio();
$result = $comercio->buscar($busqueda);
?>
<div class="titulo">Comercios - Resultado de Búsqueda: <?php echo '"' . $busqueda . '"'?></div>

<div><form method="post" action="index.php?sec=buscar_comercio"><input class="form-control" type="text" name="buscar" placeholder="Ingrese nombre o codigo de comercio"></form></div>

<div style="clear: both;"></div>

<div class="botonadd"><a href="index.php?sec=nuevo_usuario">Agregar Comercio</a></div>
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

if($result){
	foreach ($result as $row) {
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

?>