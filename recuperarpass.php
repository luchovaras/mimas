<div class="col-md-3"></div>
<div class="col-md-6">
<form name="recuperoclave" id="frmRestablecer" action="index.php?sec=recupera_proc" method="post">
  <div class="panel panel-default">
    <div class="panel-heading"> Restaurar clave </div>
    <div class="panel-body">
      <div class="form-group">
        <label for="email"> Escribe el email asociado a tu cuenta para recuperar tu clave </label>
        <input type="email" id="email" class="form-control" name="email" required>
      </div>
      <div class="form-group">
	<div class="g-recaptcha" data-sitekey="6LeMpSoUAAAAAIIEqxo5Ig_T6124pDglrcMAj962"></div>
	<input type="submit" class="botonadd" value="Recuperar clave" > <span class="link1"><a href="index.php">Record&eacute mi clave!</span></a>
      </div>
    </div>
  </div>
</form>
</div>
<div class="col-md-3"></div>
<div class="clear"></div>
<?php if (@$_GET['mail']=='error') {?>
    
    <div class="col-md-3"></div>

    <div class="col-md-6">
    
      <p class="alert alert-danger">El correo ingresado no esta registrado, <a href="index.php?sec=registro"><b>para registrarse haga click aqui!</b></a></p>

    </div>

    <div class="col-md-3"></div>

<?php }?>
