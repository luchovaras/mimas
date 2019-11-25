<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Bienvenid@ <?php echo $_SESSION['nombres'] . " | " ?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      	<?php if(@$_SESSION['tipo']==1){?>
		<li><a href="index.php?sec=perfil">Informaci&oacute;n Personal</a></li>
    <li><a href="index.php?sec=resumen">Res&uacute;men de Cuenta</a></li>
		<li><a href="index.php?sec=ultimo_cierre">&Uacute;ltimo Res&uacute;men</a></li>
    <li><a href="index.php?sec=usuarios">Usuarios</a></li>
		<li><a href="index.php?sec=logs">Logeos</a></li>
		<!-- <li><a href="index.php?sec=participantes">Participantes</a></li> -->
		<li><a href="index.php?sec=salir">Salir</a></li>

		<?php }elseif (@$_SESSION['tipo']==2) {?>
    <li><a href="index.php?sec=perfil">Informaci&oacute;n Personal</a></li>
    <li><a href="index.php?sec=resumen">Res&uacute;men de Cuenta</a></li>
    <li><a href="index.php?sec=ultimo_cierre">&Uacute;ltimo Res&uacute;men</a></li>
    <li><a href="index.php?sec=usuarios">Usuarios</a></li>
    <li><a href="index.php?sec=salir">Salir</a></li>
    <?php } else { ?>
		
		<li><a href="index.php?sec=perfil">Informaci&oacute;n Personal</a></li>
		<li><a href="index.php?sec=resumen">Res&uacute;men de Cuenta</a></li>
    <li><a href="index.php?sec=ultimo_cierre">&Uacute;ltimo Res&uacute;men</a></li>
		<li><a href="index.php?sec=salir">Salir</a></li>
		<?php } ?>
      </ul>
    </div>
  </div>
</nav>


