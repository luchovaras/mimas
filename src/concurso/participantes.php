<?php 

$usuario = new usuario();
$listar = $usuario->participantes();
$numero = $usuario->num_participantes();

?>
<div class="titulo"><?php echo $numero; ?> Participantes - Dia de la Madre</div>

<div style="clear: both;margin-bottom:10px;"></div>

<?php
echo "<div class='table-responsive table-bordered table-condensed'><table class='table table-bordered'>
		<tr style='font-weight: bold'>
		<td>Nombre</td>
		<td>Apellido</td>
		<td>Número</td>
		</tr>";

if($listar){
	foreach ($listar as $row) {
	echo "<tr>
			  <td>" . utf8_decode($row['nombre']) . "</td>	
			 <td>" . utf8_decode($row['apellido']) . "</td>		
			 <td>" . utf8_decode($row['numero']) . "</td>		
		</tr>";	
	}
}

echo "</table></div>";

