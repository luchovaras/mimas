<?php 
$id = @$_GET['id'];
$registros = new lead();
$listar = $registros->registros_lead($id);
?>

<div style="clear: both;margin-bottom:10px;"></div>

<?php
echo "<div class='table-responsive table-condensed'><table style=text-align:center; class='table table-bordered'>
		<tr style='background-color:#333;'>
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
