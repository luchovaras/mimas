<div><strong>Informaci&oacute;n Personal</strong></div>
<hr>

<?php 
header("Content-Type: text/html;charset=utf-8");
$usuario = new usuario();
$resul = $usuario->seleccionar($_SESSION['id']);
if($resul){
	foreach ($resul as $row) {
	}
?>
<div class="row">

	<div class="col-md-6">
		<div><?php echo "Nombre: " . utf8_decode($row['nombres_usuario']) . " " .utf8_decode($row['apellidos_usuario']);?></div>

		<div><?php echo "usuario: " . $row['usuario_usuario']; ?></div>

		<div><?php echo "Correo: " . $row['correo_usuario']; ?></div>

		<div><a href=<?php echo "index.php?sec=modificar_info"; ?>>Modificar Datos</a></div>
		<?php 
		} // End IF
		?>
	</div>

	<div class="col-md-6"></div>

</div>
