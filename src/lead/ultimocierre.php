<?php 
$movimiento = new movimiento();
$listar1 = $movimiento->seleccionarmov1($_SESSION['id']);
$listar2 = $movimiento->seleccionarmov2($_SESSION['id']);
$listar34 = $movimiento->seleccionarmov34($_SESSION['id']);
$total1 = $movimiento->sumar1($_SESSION['id']);
$total2 = $movimiento->sumar2($_SESSION['id']);
$total34= $movimiento->sumar34($_SESSION['id']);
$tasas = $movimiento->listartasas();

?>
<div class="container">
<div class="row">
<div class="titulo col-md-12">Último Cierre</div>
</div>
<div class="row">
<?php
//tasas
if($tasas){
	foreach ($tasas as $rowt) {
	}

echo "<div class='col-md-12 table-responsive  table-condensed'><table class='table table-bordered'>
		<tr style='color:#999'>
		<td>T.Com. actual: TNA: $rowt[tna_ac] TEA: $rowt[tea_ac] TEM: $rowt[tem_ac]</td>
		<td>T.Pun. actual: TNA: $rowt[tna_ap] TEA: $rowt[tea_ap] TEM: $rowt[tem_ap]</td>
		</tr>
		<tr style='color:#999'>
		<td>T.Pun. pxmo resúmen: TNA: $rowt[tna_pc] TEA: $rowt[tea_pc] TEM: $rowt[tem_pc]</td>
		<td>T.Pun. pxmo resúmen: TNA: $rowt[tna_pp] TEA: $rowt[tea_pp] TEM: $rowt[tem_pp]</td>
		</tr>";
echo "</table></div>";

}

echo "</div><div class=row>";


echo "<div class='col-md-12 table-responsive'><table class='table table-bordered'>
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
	echo "<tr><td colspan=5 style=color:#AE2121;><b>Saldo a Pagar: $ " . number_format($rowb['total'],2,",",".") . "</b></td></tr>";	
	}
echo "<tr style=background-color:#E9EBEE;color:#AE2121;text-align:center;><td colspan=3>CUOTAS A VENCER</td></tr>";
}

//echo "</table></div>";

// //////////////////


if($listar34){
	foreach ($listar34 as $row34) { 
			echo "<tr>"; 
			 echo "<td>" . date_format(date_create($row2['Fecha']),'d/m/Y') . "</td>
			 <td>" . strtoupper(trim($row34["Concepto"])) . "</td>
			 <td>$ " . number_format($row34['Importe'],2,",",".") . "</td>
			</tr>";
			
	}

	
	foreach ($total34 as $rowc) {
	echo "<tr><td colspan=3><b>Cuotas a Vencer $ " . number_format($rowc['total'],2,",",".") . "</b></td></tr>";	
	}
}

echo "</table></div>";


echo "<div class=botonadd><a target=_blank href=index.php?sec=imprime&id=".$_SESSION['id'].">Imprimir Resum&eacuten</a></div>";

?>
</div>
</div>