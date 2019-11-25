<?php 
$usuario = new usuario();
$id = @$_SESSION['id'];
$elegido = $usuario->seleccionar($id);
if($elegido){
	foreach ($elegido as $row) {
}
?>
<div class="titulo">Modificar Datos</div>


<div class="container">
<div class="col-md-6" style="margin-bottom: 10px;">
	<form method="post" action="index.php?sec=modificar_usuario_proc">
		<input type="hidden" name="id" value=<?php echo $id; ?>>		
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input class="form-control" type="text" name="nombre" placeholder=<?php echo "'".utf8_decode($row['nombre_usuario'])."'"; ?> disabled>
		</div>
		
		<div class="form-group">
			<label for="apellido">Apellido</label>
			<input class="form-control" type="text" required="" name="apellido" placeholder=<?php echo "'".utf8_decode($row['apellido_usuario'])."'"; ?> disabled>
		</div>

		<div class="form-group">	
			<label for="tarjeta">Tarjeta</label>
			<input class="form-control" type="number" required="" name="tarjeta" placeholder=<?php echo $row['id_usuario']; ?> disabled>
		</div>	

		<div class="form-group">
			<label for="clave">Clave</label>
			<input class="form-control" type="password" required="" value=<?php echo $row['clave_usuario']; ?> name="clave" placeholder=<?php echo $row['clave_usuario']; ?>>
		</div>

		</div>

		<div class="col-md-6">
	

		<div class="form-group">
			<label for="email">Email</label>
			<input class="form-control" type="email" required="" value=<?php echo $row['email_usuario']; ?> name="email" placeholder=<?php echo $row['email_usuario']; ?>>
		</div>

		<div class="form-group">
			<label for="telefono">Teléfono</label>
			<input class="form-control" type="tel" required="" name="telefono" value=<?php echo $row['telefono_usuario']; ?> placeholder=<?php echo $row['telefono_usuario']; ?>>
		</div>

		<div class="form-group">
			<label for="direccion">Dirección</label>
			<input class="form-control" type="text" required="" name="direccion" value=<?php echo '"'.utf8_decode($row['direccion_usuario']).'"'; ?> placeholder=<?php echo $row['direccion_usuario']; ?>>
		</div>

		<div class="form-group">
			<label for="localidad">Localildad</label>
			<select class="form-control" name="localidad">
				<option value=<?php echo $row['id_localidad'] ?>><?php echo $row['nombre_localidad'] ?></option>
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
		<input class="botonadd" type="submit" value="Actualizar">
	</div>	
</form>
</div>

<?php 
} //end foreach
?>