	<form method="post" action="index.php?sec=login_c_proc">

		<div class="form-group">	
			<label for="tarjeta">Codigo de Comercio</small></label>
			<input class="form-control"  minlength="6" maxlength="12"  type="number" required="" name="codigo" placeholder="5665">
		</div>	

		<div class="form-group">
			<label for="clave">Clave</label>
			<input class="form-control" type="password" required="" name="clave" placeholder="*********">
		</div>

		<input class="btn btn-default" type="submit" value="Ingresar">

	</form>

	<?php if (@$_GET['logc']=='errorc') {?>
		<div class="alert alert-danger">Los datos ingresados son incorrectos</div>
	<?php
	} //end if
	?>

