<?php 
include("secur/security.php");;

$movimiento = new movimiento();
$listar = $movimiento->listar();
?>
<div class="titulo"><?php echo $volver; ?>Movimientos</div>

<div style="clear: both;"></div>

<div class="botonadd"><a href="index.php?sec=nuevo_movimiento">Agregar Movimiento</a></div>
<?php
echo "<div class='table-responsive table-bordered table-condensed'><table class='table table-bordered'>
		<tr style='font-weight: bold'>
		<td>Fecha</td>
		<td>Tarjeta</td>	
		<td colspan=2>Usuario</td>
		<td>Comercio</td>
		<td>Cupón</td>
		<td>Cuotas</td>
		<td>Periodo/Mes</td>
		<td>Importe</td>
		<td>Acciones</td>
		</tr>";

if($listar){
	foreach ($listar as $row) {
	echo "<tr>
			 <td>" . date_format(date_create($row['fechacompra_mov']),'d/m/Y'). "</td>	
			 <td>" . $row['id_usuario'] . "</td>	
			 <td>" . $row['nombre_usuario'] . "</td>	
			 <td>" . $row['apellido_usuario'] . "</td>	
			 <td>" . $row['nombre_comercio'] . "</td>
			 <td>" . $row['cupon_mov'] . "</td>	
			 <td>" . $row['id_cuota'] . "</td>
			 <td>" . $row['periodo_mov'] . "</td>
			 <td>" . number_format($row['importe_mov'],2,",",".") . "</td>
			 <td><a href=index.php?sec=modificar_movimiento&id=$row[id_movimiento]><img src=img/icons/editar.svg width=16 /></a> | 
			 <a href=index.php?sec=eliminar_movimiento&id=$row[id_movimiento]><img src=img/icons/eliminar.svg width=16 /></a></td>
		</tr>";	
	}
}

echo "</table></div>";

?>