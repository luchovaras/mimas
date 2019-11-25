<div class="titulo">Agregar Nuevo Usuario</div>

<div class="col-md-6">	

	<form method="post" action="index.php?sec=nuevo_usuario_proc">
		
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input class="form-control" type="text" name="nombre" placeholder="Juan">
		</div>
		
		<div class="form-group">
			<label for="apellido">Apellido</label>
			<input class="form-control" type="text" required="" name="apellido" placeholder="Perez">
		</div>

		<div class="form-group">	
			<label for="tarjeta"># de Tarjeta</label>
			<input class="form-control" type="text" required="" name="tarjeta" placeholder="1234567890" maxlength="16" minlength="16">
		</div>	

		<div class="form-group">
			<label for="clave">Clave</label>
			<input class="form-control" type="password" required="" name="clave" placeholder="*********">
		</div>

</div>
<div class="col-md-6">	
		<div class="form-group">
			<label for="email">Email</label>
			<input class="form-control" type="email" required="" name="email" placeholder="correo@xmail.com">
		</div>

		<div class="form-group">
			<label for="telefono">Teléfono</label>
			<input class="form-control" type="tel" required="" name="telefono" placeholder="3472435566">
		</div>

		<div class="form-group">
			<label for="direccion">Dirección</label>
			<input class="form-control" type="text" required="" name="direccion" placeholder="Calle 133">
		</div>

		<div class="form-group">
			<label for="localidad">Localildad</label>
			<select class="form-control" name="localidad">
				<?php 
				$listar = new usuario();
				$res = $listar->listarloc();
				if ($res) {
				foreach ($res as $row) {
				?>
				<option value=<?php echo $row['id_localidad'] ?>><?php echo $row['nombre_localidad'] ?></option>
				<?php
				}
				}
				?>
			</select>
		</div>
	</div><!-- en divisor de columnas-->

		<div class="col-md-12"><input class="botonadd" type="submit" value="Agregar Usuario"></div>

	</form>

</div>

<div style="clear: both;margin-top: 15px;"></div>

<?php 
	if (@$_GET['reg']=='error') {?>
		<div class="alert alert-danger">El numéro de tarjeta ya fue registrado | <a href="index.php?sec=recupera_clave">Olvido su contraseña?</a></div>
<?php
	} 
	if (@$_GET['reg']=='error1') {?>
		<div class="alert alert-danger">Ingrese un numéro de tarjeta valido | <a href="index.php?sec=recupera_clave">Olvido su contraseña?</a></div>

<?php } ?>