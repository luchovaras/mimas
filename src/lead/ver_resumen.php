<?php 
$id = @$_GET['id'];
$nombre = @$_GET['n'];
$apellido = @$_GET['a'];
$localidad = @$_GET['l'];
$movimiento = new movimiento();
$listar1 = $movimiento->seleccionarmov1($id);
$listar2 = $movimiento->seleccionarmov2($id);
$listar34 = $movimiento->seleccionarmov34($id);
$total1 = $movimiento->sumar1($id);
$total2 = $movimiento->sumar2($id);
$total34= $movimiento->sumar34($id);
?>

<div class="titulo">Resémen de Cuenta de <?php echo $nombre . " " . $apellido; ?></div>

<?php

echo "<div class='table-responsive table-bordered table-condensed'><table class='table table-bordered'>
		<tr style='font-weight: bold'>
		<td>FECHA</td>
		<td>CONCEPTO</td>
		<td>IMPORTE</td>
		</tr>";


if($listar1){
	foreach ($listar1 as $row1) { 
			echo "<tr>"; 
			 echo "<td>" . date_format(date_create($row1['Fecha']),'d/m/Y') . "</td>
			 <td>" . strtoupper(trim($row1["Concepto"])) . "</td>
			 <td>$ " . number_format($row1['Importe'],2,",",".") . "</td>
			</tr>";
			
	}
	
	// foreach ($total1 as $rowa) {
// 	echo "<tr><td colspan=5><b>TOTAL $ " . number_format($rowa['total'],2,",",".") . "</b></td></tr>";	
// 	}
// }else{
// 	echo "No existen registros." . die();
}

//echo "</table></div>";

// ///////////////
//echo "<h1>Estado 2</h1>";

//echo "<div class='table-responsive table-bordered table-condensed'><table class='table table-bordered'>
//		<tr style='font-weight: bold'>
//		<td>FECHA</td>
//		<td>CONCEPTO</td>
//		<td>IMPORTE</td>
//		</tr>";

echo "<tr'><td colspan=3></td></tr>";

if($listar2){
	foreach ($listar2 as $row2) { 
			echo "<tr>"; 
			 echo "<td>" . date_format(date_create($row2['Fecha']),'d/m/Y') . "</td>
			 <td>" . strtoupper(trim($row2["Concepto"])) . "</td>
			 <td>$ " . number_format($row2['Importe'],2,",",".") . "</td>
			</tr>";
			
	}
	
	foreach ($total2 as $rowb) {
	echo "<tr><td colspan=5><b>Saldo Actual: $ " . number_format($rowb['total'],2,",",".") . "</b></td></tr>";	
	}
echo "<tr style=background-color:#E9EBEE;color:#AE2121;text-align:center;><td colspan=3>CUOTAS A VENCER</td></tr>";
}
//echo "</table></div>";

// //////////////////


if($listar34){
	
foreach ($listar34 as $row34) { 
			echo "<tr>"; 
			 echo "<td>" . date_format(date_create($row34['Fecha']),'d/m/Y') . "</td>
			 <td>" . strtoupper(trim($row34["Concepto"])) . "</td>
			 <td>$ " . number_format($row34['Importe'],2,",",".") . "</td>
			</tr>";
			
	}

	
	foreach ($total34 as $rowc) {
	echo "<tr><td colspan=3><b>Cuotas a Vencer $ " . number_format($rowc['total'],2,",",".") . "</b></td></tr>";	
	}
}

echo "</table></div>";


echo "<div class=botonadd><a target=_blank href=index.php?sec=imprime_u&n=".$nombre."&a=".$apellido."&id=".$id."&l=".$localidad.">Imprimir Resum&eacuten</a></div>"


?>

