	<div class="col-md-4">


	</div>
	
	

	<?php if (!@$_SESSION['logeado']) {?>
	<div class="col-md-4">

		<?php	include("src/login/login.php"); ?>
	
	</div>

	<div class="col-md-4"></div>

	<?php }else{ header("Location:index.php?sec=perfil");} ?>

</div>

