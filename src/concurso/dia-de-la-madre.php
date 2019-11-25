<?php 
$frase = 'Octubre es el mes de ELLA…La que te enseñó de valores, consejos sanos y la que siempre confía en vos! Simplemente la que más te ama!
Sabemos que querés hacerla sentir especial en SU DÍA…  ¿Te gustaría llevarla a cenar? Participá del sorteo de Tarjeta Marcos Juárez y Tarjeta Local… de lo demás, nos encargamos nosotros!';
?>
<div style="margin: 0 auto; text-align: center;">
	<?php
		echo '<h2>' . htmlentities('PARTICIPÁ POR EL CONCURSO DEL DÍA DE LA MADRE!') . '</h2>';
		echo '<h4>' . htmlentities($frase) . '</h4>';
	?>
<img class="img-fluid" style="margin: 50px  0;border-radius: 20px;max-width: 100%; max-height: auto;" src="https://www.easypromosapp.com/blog/wp-content/uploads/header_ideas_de_concursos_para_el_dia_de_la_madre.jpg">
	

<?php 
$usuario = new usuario();
$participa = $usuario->participa($_SESSION['id']);
if ($participa != 0) {
 	echo "<div><h2><strong>Ya est&aacute;s participando!</h2></strong><h3>Record&aacute que el sorteo se realiza el dia Viernes 18 de Octubre por nuestras redes sociales!</h3></div>";
 }else{
?>
<form style="margin-bottom: 50px;" action="index.php?sec=concurso_proc" method="post">
	<input type="hidden" name="numero" value=<?php echo $_SESSION['id'] ?>>
	<input type="hidden" name="nombre" value=<?php echo $_SESSION['nombre'] ?>>
	<input type="hidden" name="apellido" value=<?php echo $_SESSION['apellido'] ?>>
	<button type="submit" class="btn btn-success btn-lg">Participar ahora!</button>
</form>
<?php
}
?>
	
</div>