<?php 
session_start();
// $_SESSION['tiempo']=time();
// include('timeout.php'); 
require_once("lead.php");
require_once("usuario.php");
require_once("comercio.php");
require_once("movimiento.php");
setlocale(LC_ALL,"es_ES");
?>
<!DOCTYPE html>
<html lang="esp">
<head>
 	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<!-- <meta http-equiv="content-type" content="text/html; utf-8"> -->
	
	<title>CRMAX</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="shortcut icon" href="http://tarjetamarcosjuarez.com.ar/wp-content/uploads/2017/05/favicon.jpg" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<!-- ICONOS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/estilos.css">
	
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script>
	window.onload = function() {
 	var recaptcha = document.forms["recuperoclave"]["g-recaptcha-response"];
  	recaptcha.required = true;
  	recaptcha.oninvalid = function(e) {
    	// do something
    	alert("Eres un robot? Si no es asi haz click en -> No soy un robot :) ");
  		}
	}
</script>
	
</head>
<body>
	
			<header>
				
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-12 col-md-6 logo">
							CR<span style="color:#999">MAX</span>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<?php if (@$_SESSION['logeado']=='si') { ?>
							<ul>
								<li><a href="index.php?sec=leads">Leads</a></li>
								<li><a href="index.php?sec=perfil">Cuenta</a></li>
								<li><a href=""><a href="index.php?sec=salir">Salir</a></li>
							</ul>
						<?php } ?>
						</div>
					</div>
				</div>
			</header>
	

		