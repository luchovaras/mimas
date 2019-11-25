<div class="titulo"><?php echo $volver; ?>Agregar Nuevo Comercio</div>

<div class="col-md-6">	

	<form method="post" action="index.php?sec=nuevo_comercio_proc">
		
		<div class="form-group">
			<label for="nombre">Nombre de Comercio</label>
			<input class="form-control" type="text" name="nombre" placeholder="Luz en tus Ojos">
		</div>
		
		<div class="form-group">
			<label for="apellido">Propietario</label>
			<input class="form-control" type="text" required="" name="propietario" placeholder="Jacinto Lopéz">
		</div>

		<div class="form-group">	
			<label for="tarjeta">Codigo</label>
			<input class="form-control" type="number" required="" name="codigo" placeholder="190373">
		</div>	

		<div class="form-group">
			<label for="clave">Clave</label>
			<input class="form-control" type="password" required="" name="clave" placeholder="*********">
		</div>

</div>
<div class="col-md-6">	
		
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

		<div class="form-group">
			<label for="direccion">Dirección</label>
			<input class="form-control" type="text" required="" name="direccion" placeholder="Una Calle 133">
		</div>

		<div class="form-group">
			<label for="email">Email</label>
			<input class="form-control" type="email" required="" name="email" placeholder="comercio@xmail.com">
		</div>

		<div class="form-group">
			<label for="telefono">Teléfono</label>
			<input class="form-control" type="tel" required="" name="telefono" placeholder="3472112233">
		</div>
</div>

		<div class="col-md-12"><input class="botonadd" type="submit" value="Agregar Comercio"></div>

	</form>
