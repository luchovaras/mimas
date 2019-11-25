<div class="container">

<div class="titulo">Registro</div>

	<div class="col-md-6" style="margin-bottom: 10px;">	

		<form method="post" action="index.php?sec=registro_proc">
		
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input class="form-control" type="text" required="" name="nombre" placeholder="Juan">
			</div>
			
			<div class="form-group">
				<label for="apellido">Apellido</label>
				<input class="form-control" type="text" required="" name="apellido" placeholder="Perez">
			</div>

			<div class="form-group">	
				<label for="tarjeta">Tarjeta</label>
				<input class="form-control" type="number"  minlength="16" maxlength="16"  required="" name="tarjeta" placeholder="Ingrese los 16 digitos de su tarjeta">
			</div>	

			<div class="form-group">
				<label for="clave">Clave</label>
				<input class="form-control" type="password"  minlength="3" maxlength="12"  required="" name="clave" placeholder="*********">
			</div>	
	
	</div>

	<div class="col-md-6">
	
			<div class="form-group">
				<label for="email">Email (Si no tenÈs uno marca la casilla <input type="checkbox" name="sincorreo" value="si"> ) </label>
				<input class="form-control" type="email" name="email" placeholder="correo@xmail.com">
			</div>

			<div class="form-group">
				<label for="telefono">TelÈfono</label>
				<input class="form-control" minlength="10" maxlength="16" type="tel" required="" name="telefono" placeholder="3472435566">
			</div>

			<div class="form-group">
				<label for="direccion">DirecciÛn</label>
				<input class="form-control" type="text" required="" name="direccion" placeholder="Calle 133">
			</div>

			<div class="form-group">
				<label for="localidad">Localildad</label>
				<select class="form-control" name="localidad">
				<?php 
				$listar = new usuario();
				$res = $listar->listarloc();
				if ($res) {
				foreach ($res as $row1) {
				?>
				<option value=<?php echo $row1['id_localidad'] ?>><?php echo $row1['nombre_localidad'] ?></option>
				<?php
				}
				}
				?>
			</select>
			</div>

	</div>

			<div class="col-md-12">
				<input class="botonadd" type="submit" value="Registrarme">

				<?php 
	if (@$_GET['reg']=='error') {?>
		<div class="alert alert-danger">El num√©ro de tarjeta ya fue registrado | <a href="index.php?sec=recupera_clave">Olvido su contrase√±a?</a></div>
	<?php
	} 
	if (@$_GET['reg']=='error1') {
	?>
		<div class="alert alert-danger">Ingrese un num√©ro de tarjeta valido | <a href="index.php?sec=recupera_clave">Olvido su contrase√±a?</a></div>

	<?php 
	}
	if (@$_GET['reg']=='errormail') {
	?>
		<div class="alert alert-danger">El email ingresado ya fue registrado | <a href="index.php?sec=recupera_clave">Olvido su contrase√±a?</a></div>

	<?php 
	}
	?>

			</div>

		</form>
</div>

