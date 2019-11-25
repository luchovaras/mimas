<?php 
$busqueda = @$_POST['buscar'];
$usuario = new usuario();
$result = $usuario->buscar($busqueda);
?>

<div class="titulo">Resultado para: <?php echo '"' . $busqueda . '"'?></div>

<div><form method="post" action="index.php?sec=buscar_usuario"><input class="form-control" type="text" name="buscar" placeholder="Ingrese nombre, apellido o tarjeta"></form></div>

<div style="clear: both; margin-bottom:10px;"></div>

<?php
echo "<div class='table-responsive table-bordered table-condensed'><table class='table table-bordered'>
		<tr style='font-weight: bold'>
		<td>Nombre</td>
		<td>Apellido</td>
		<td># Tarjeta</td>
		<td>Email</td>
		<td>Telefono</td>
		<td>Dirección</td>
		<td>Localidad</td>
		<td>Acciones</td>
		</tr>";

if($result){
	foreach ($result as $row) {
	echo "<tr>
			  <td>" . $row['nombre_usuario'] . "</td>	
			 <td>" . $row['apellido_usuario'] . "</td>	
			 <td>" . $row['id_usuario'] . "</td>	
			 <td>" . $row['email_usuario'] . "</td>
			 <td>" . $row['telefono_usuario'] . "</td>
			 <td>" . $row['direccion_usuario'] . "</td>	
			 <td>" . $row['nombre_localidad'] . "</td>
			 <td>
				<a href=index.php?sec=ver_resumen&id=$row[usuario_usuario]&n=$row[nombre_usuario]&a=$row[apellido_usuario]><img src=img/icons/ver.svg width=16 /></a>
				<a href=index.php?sec=modificar_usuario&id=$row[usuario_usuario]&n=$row[nombre_usuario]&a=$row[apellido_usuario]&l=$row[localidad_usuario]><img src=img/icons/editar.svg width=16 /></a>
</td>		
</tr>";	
	}
}

echo "</table></div>";

?>