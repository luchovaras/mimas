<?php 
$logs = new usuario();
$logeo = $logs->listarlog();
?>
<div class="titulo">Logeos</div>

<?php


echo "<div class='table-responsive table-bordered table-condensed'><table class='table table-bordered'>
		<tr style='font-weight: bold'>
		<td>Fecha</td>
		<td>Nombre</td>
		<td>Apellido</td>
		<td>Tarjeta</td>
		<td>Email</td>
		<td>Telefono</td>
		<td>Dirección</td>
		</tr>";

if($logeo){
	foreach ($logeo as $row) {
	echo "<tr>
			  <td>" . $row['fecha_log'] . "</td>	
			 <td>" . utf8_decode($row['nombre_usuario']) . "</td>	
			 <td>" . utf8_decode($row['apellido_usuario']) . "</td>	
			 <td>" . $row['id_usuario'] . "</td>	
			 <td>" . $row['email_usuario'] . "</td>
			 <td>" . $row['telefono_usuario'] . "</td>
			 <td>" . utf8_decode($row['direccion_usuario']) . "</td>	
		</tr>";	
	}
}

echo "</table></div>";



?>

