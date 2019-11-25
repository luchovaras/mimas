<div class="titulo">Perfil Comercio</div>
<?php 
if (@$_SESSION["tipo"]==1) {
	echo "<h4>Administrador</h4>";
}elseif (@$_SESSION["tipo"]==2) {
	echo "<h4>Usuario</h4>";
}elseif (@$_SESSION["tipo"]==3) {
	echo "<h4>Comercio</h4>";
}else{
	echo "<h4>Editor</h4>";	
}
?>

