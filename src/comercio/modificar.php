<?php   
$id = $_GET['id'];
$comercio = new comercio();
$elegido = $comercio->seleccionar($id);
if($elegido){
	foreach ($elegido as $row) {
}
?>
<div class="titulo"><?php echo $volver; ?>Modificar Comercio: <?php echo $row['nombre_comercio'] . " de " .$row['propietario_comercio'] ?></div>


<div class="container">	
<small>* Para editar datos personales primarios comuniquese con el webmaster</small>
	
	<form method="post" action="index.php?sec=modificar_comercio_proc">
		
		<input type="hidden" name="id" value=<?php echo $id; ?>>		
		
		<div class="form-group">
			<label for="nombre">Nombre de Comercio</label>
			<input class="form-control" type="text" name="nombre" placeholder=<?php echo "'".$row["nombre_comercio"]."'"; ?> disabled>
		</div>
		
		<div class="form-group">
			<label for="propietario">Propietario</label>
			<input class="form-control" type="text" required="" name="propietario" placeholder=<?php echo "'".$row['propietario_comercio']."'"; ?> disabled>
		</div>

		<div class="form-group">	
			<label for="tarjeta">Codigo</label>
			<input class="form-control" type="number" required="" name="codigo" placeholder=<?php echo $row['id_comercio'];?> disabled>
		</div>	

		<div class="form-group">
			<label for="clave">Clave</label>
			<input class="form-control" type="password" required="" value=<?php echo $row['clave_comercio']; ?> name="clave" placeholder=<?php echo $row['clave_comercio']; ?>>
		</div>	

		<div class="form-group">
			<label for="localidad">Localildad</label>
			<select class="form-control" name="localidad" disabled>
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

		<div class="form-group">
			<label for="direccion">Dirección</label>
			<input class="form-control" type="text" required="" name="direccion" value=<?php echo '"'.$row['direccion_comercio'].'"'; ?> placeholder=<?php echo $row['direccion_comercio']; ?>>
		</div>

		<div class="form-group">
			<label for="email">Email</label>
			<input class="form-control" type="email" required="" value=<?php echo $row['email_comercio']; ?> name="email" placeholder=<?php echo $row['email_comercio']; ?>>
		</div>

		<div class="form-group">
			<label for="telefono">Teléfono</label>
			<input class="form-control" type="tel" required="" name="telefono" value=<?php echo $row['telefono_comercio']; ?> placeholder=<?php echo $row['telefono_comercio']; ?>>
		</div>

		<input class="botonadd" type="submit" value="Actualizar">
	</form>
</div>

<?php 
} //end foreach
?>