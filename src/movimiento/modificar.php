<?php 
include("secur/security.php");
 
$id = $_GET['id'];
$movimiento = new movimiento();
$elegido = $movimiento->seleccionar($id);
if($elegido){
	foreach ($elegido as $row) {
}
?>
<div class="titulo"><?php echo $volver; ?>Modificar Movimiento # <?php echo $row['id_movimiento'] ."  |  Usuario: ".$row['apellido_usuario']. " | Comercio: " .$row['nombre_comercio'];  ?> </div>

<div class="col-md-6">	

	<form method="post" action="index.php?sec=modificar_movimiento_proc">
		<input type="hidden" name="id" value=<?php echo $id; ?>>
		<div class="form-group">
			<label for="usuario">Usuario</label>
			<input type="text" disabled="" required="" class="form-control" name="usuario" maxlength="16" minlength="16" placeholder=<?php echo $row['id_usuario'] ?>>
		</div>
		
		<div class="form-group">
			<label for="comercio">Comercio</label>			
				<input type="text" disabled="" required="" class="form-control" name="comercio" placeholder=<?php echo $row['id_comercio'] ?>>	
		</div>

		<div class="form-group">	
			<label for="cupon">Cupón</label>
			<input class="form-control" type="text" name="cupon" placeholder=<?php echo $row['cupon_mov']; ?>>
			</div>	

</div>
<div class="col-md-6">	
		
		<div class="form-group">	
			<label for="fechacompra">Fecha de Compra</label>
			<input class="form-control" type="date" name="fechacompra" placeholder=<?php echo $row['fechacompra_mov']; ?>>
		</div>

		<div class="form-group">
			<label for="concepto">Cuotas</label>
			<select name="cuota" class="form-control">
			<option value=<?php echo $row['id_cuota'];?>><?php echo $row['cuota_mov']; ?></option>
			<?php 
							$listar = new Movimiento();
							$res = $listar->listarcuota();
							if ($res) {
							foreach ($res as $rowc) {
							?>
							<option value=<?php echo $rowc['id_cuota'] ?>><?php echo $rowc['id_cuota'] ?></option>
							<?php
							}
							}
						?>	
			</select>
		</div>

		<div class="form-group">
			<label for="importe">Importe</label>
			<input class="form-control" type="text" value=<?php echo $row['importe_mov']; ?> required="" name="importe" placeholder=<?php echo $row['importe_mov']; ?>>
		</div>

</div>

		<div class="col-md-12"><input class="botonadd" type="submit" value="Modificar Movimiento"></div>

		
	</form>
<?php } ?>