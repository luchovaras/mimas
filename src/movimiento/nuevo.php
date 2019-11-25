<?php include("secur/security.php"); ?>

<div class="titulo"><?php echo $volver; ?>Agregar Nuevo Movimiento</div>

	<div class="col-md-6">	

		<form method="post" action="index.php?sec=nuevo_movimiento_proc">
			
			<?php
			// SI ES AUTOGENERACION

			$usuario_c = @$_GET['id'];
			if ($usuario_c) {
				$seleccion = new usuario();
				$usuario_s = $seleccion->seleccionar($usuario_c);
				foreach ($usuario_s as $row1) {?>
				<input type="hidden" name="usuario" value=<?php echo $usuario_c; ?>>		

				<div class="form-group">
				<label for="nombre">Nombre</label>
				<input class="form-control" type="text" name="nombre" placeholder=<?php echo "'".$row1['nombre_usuario']."'"; ?> disabled>
				</div>
				<div class="form-group">
				<label for="nombre">Apellido</label>
				<input class="form-control" type="text" name="apellido" placeholder=<?php echo "'".$row1['apellido_usuario']."'"; ?> disabled>
				</div>
			<?php 
			}
			}else{
			
			// SI ES MANUAL
			?>
			<div class="form-group">
				<label for="usuario">Usuario</label>
				<input type="text" required="" class="form-control" name="usuario" maxlength="16" minlength="16">
			</div>

			<?php } ?>

			<div class="form-group">
				<label for="comercio">Comercio</label>
				<input type="text" required="" class="form-control" name="comercio">	
			</div>

			<div class="form-group">	
				<label for="cupon">Cupón</label>
				<input type="text" required="" class="form-control" name="cupon">
			</div>	

	</div>

	<div class="col-md-6">

				<div class="form-group">	
					<label for="cupon">Fecha de Compra</label>
					<input type="date" required="" class="form-control" name="fechacompra">
				</div>
			
				<div class="form-group">
					<label for="cuota">Cuotas</label>
					<select name="cuota" class="form-control">
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
					<input class="form-control" type="number" step="any" required="" name="importe" placeholder="200">
				</div>

	</div>

			<div class="col-md-12"><input class="botonadd" type="submit" value="Agregar Movimiento"></div>

			
		</form>
