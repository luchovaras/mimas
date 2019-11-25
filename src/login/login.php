<div class="formlog">
<form method="post" action="index.php?sec=login_proc">
	<div class="form-group">	
		<input class="form-control" minlength="6" maxlength="12" type="text" required="" name="usuario" placeholder="usuario">
	</div>	
	<div class="form-group">
		<input class="form-control" type="password" minlength="3" maxlength="20" required="" name="clave" placeholder="clave">
	</div>
	<input class="boton" type="submit" value="Ingresar">
</form>
	
	<?php if (@$_GET['log']=='error') {?>
		<span>Datos incorrectos</span>
	<?php
	} //end if
	if(@$_GET['reg']=='ok'){?>
		<div class="alert alert-success">Registro Correcto! Ingrese con su número de tarjeta y clave</div>
		<?php }
?>
</div>
