<?php 
$url = "index.php?sec=leads&";
$tamano_pagina = 10;
$lead = new lead();

$pagina = @$_GET["pagina"];
if (!$pagina) {
   $inicio = 0;
   $pagina = 1;
   $listar = $lead->listarpag($inicio,$tamano_pagina);
   $num_total_leads = $lead->totalpaginas();
}
else {
   $inicio = ($pagina - 1) * $tamano_pagina;
   $listar = $lead->listarpag($inicio,$tamano_pagina);
   $num_total_leads = $lead->totalpaginas();
}
$total_paginas = ceil($num_total_leads / $tamano_pagina);
?>

<div container>
	<div class="row">
		<div class="col-md-3">
			<form method="post" action="index.php?sec=buscar_lead"><input class="form-control busca" type="text" name="buscar" placeholder="Ingrese nombre, apellido o cedula"></form>
		</div>
		<div class="col-md-3"></div>
		<div class="col-md-3"></div>
		<div class="col-md-3"></div>
	</div>
</div>

<div style="clear: both;margin-bottom:10px;"></div>

<?php
echo "<div><table style=text-align:center; class='table table-responsive table-condensed'>
		<tr>
		<td>Nombres</td>
		<td>Apellidos</td>
		<td>Identificacion</td>
		<td>Celular</td>
		<td>Correo</td>
		<td>Ciudad</td>
		<td>IP</td>
		</tr>";

if($listar){
	foreach ($listar as $row) {
	echo "<tr>
			  <td><a href=index.php?sec=vlead&id=$row[id_lead]>" . utf8_decode($row['nombres']) . "</a></td>	
			 <td>" . utf8_decode($row['apellidos']) . "</td>	
			 <td>" . $row['identificacion'] . "</td>	
			 <td>" . $row['celular'] . "</td>
			 <td>" . $row['correo'] . "</td>
			 <td>" . $row['ciudad'] . "</td>
			 <td>" . $row['ip_interesado'] . "</td>
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
