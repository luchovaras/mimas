<?php 
switch (@$_GET['sec']) {
	case 'home':
		include('src/home.php');
		break;

	//LEADS

	case 'leads':
	include('src/lead/leads.php');
	break;	

	case 'buscar_lead':
	include('src/lead/busqueda.php');
	break;

	case 'vlead':
	include('src/lead/ver_lead.php');
	break;	

	case 'rlead':
	include('src/lead/lead_registros.php');
	break;	


	// Usuarios

		// Registro e Ingreso

	case 'registro':
		include('src/registro/registro.php');
		break;

		case 'registro_proc':
			include('src/registro/registro_proc.php');
			break;	

	case 'login':
		include('src/login/login.php');
		break;

		case 'login_proc':
			include('src/login/login_proc.php');
			break;		

	case 'perfil':
		include('src/usuario/micuenta.php');
		break;

	case 'modificar_info':
		include('src/usuario/modificarinfo.php');
		break;

	case 'recupera_clave':
		include('recuperarpass.php');
		break;

	case 'recupera_proc':
		include('recuperar_proc.php');
		break;

	case 'salir':
		include('salir.php');
		break;

	// VER RESUMEN DE CUENTA PERSONAL

	case 'resumen':
		include('secur/log.php');
		include('src/usuario/resumen.php');
		break;

	// VER RESUMEN DE CUENTA DE USUARIOS

	case 'ver_resumen':
		include('secur/security.php');
		include('src/usuario/ver_resumen.php');
		break;


// VER ULTIMO CIERRE PERSONAL

	case 'ultimo_cierre':
		include('secur/log.php');
		include('src/usuario/ultimocierre.php');
		break;

	// VER ULTIMO CIERRE DE USUARIOS

	// case 'ver_resumen':
	// 	include('secur/security.php');
	// 	include('src/usuario/ver_resumen.php');
	// 	break;


	// ZONA ADMINISTRABLE

	case 'nuevo_usuario':
		include('secur/security.php');
		include('src/usuario/nuevo.php');
		break;

		case 'nuevo_usuario_proc':
		include('secur/security.php');
			include('src/usuario/nuevo_proc.php');
			break;

	case 'eliminar_usuario':
		include('secur/security.php');
		include('src/usuario/eliminar.php');
		break;

	case 'modificar_usuario':
		include('secur/security.php');
		include('src/usuario/modificar.php');
		break;

		case 'modificar_usuario_proc':
		include('secur/security.php');
			include('src/usuario/modificar_proc.php');
			break;

	case 'usuarios':
		include('secur/security.php');
		include('src/usuario/usuarios.php');
		break;

	case 'buscar_usuario':
		include('secur/security.php');
		include('src/usuario/busqueda.php');
		break;


	case 'logs':
		include('secur/security.php');
		include('src/usuario/logeos.php');
		break;

	// REGISTRO DE COMERCIOS EN STANDBY

		// Registro e Ingreso

	// case 'registro':
	// 	include('src/registro/registro.php');
	// 	break;

	// 	case 'registro_proc':
	// 		include('src/registro/registro_proc.php');
	// 		break;	

	case 'comerc':
		include('src/login/login_c.php');
		break;

		case 'login_c_proc':
			include('src/login/login_c_proc.php');
			break;		

	case 'perfil_c':
		include('src/comercio/micuenta.php');
		break;

	// cuenta y movimientos

	case 'resumen_c':
		include('secur/log.php');
		include('src/movimiento/resumen_personal.php');
		break;


	// Gestion de administrador

		case 'nuevo_comercio':
		include('secur/security.php');
			include('src/comercio/nuevo.php');
			break;

		case 'nuevo_comercio_proc':
		include('secur/security.php');
			include('src/comercio/nuevo_proc.php');
			break;

		case 'eliminar_comercio':
		include('secur/security.php');
			include('src/comercio/eliminar.php');
			break;

		case 'modificar_comercio':
		include('secur/security.php');
			include('src/comercio/modificar.php');
			break;

		case 'modificar_comercio_proc':
		include('secur/security.php');
			include('src/comercio/modificar_proc.php');
			break;

		case 'buscar_comercio':
		include('secur/security.php');
		include('src/comercio/busqueda.php');
			break;

		case 'comercios':
		include('secur/security.php');
			include('src/comercio/comercios.php');
			break;

	// MOVIMIENTO ///////////////////////////////////////////////////////// 
	
	// CONCURSO ///////////////////////////////////////////////////////// 

	case 'concurso':
		include('src/concurso/dia-de-la-madre.php');
		// include('src/movimiento/nuevo.php');
		break;	

	case 'concurso_proc':
			include('src/concurso/concurso_proc.php');
			break;	

	case 'participantes':
			include('src/concurso/participantes.php');
			break;	

	// Gestion de administrador

		case 'nuevo_movimiento':
		include('secur/security.php');
			include('src/movimiento/nuevo.php');
			break;

		case 'nuevo_movimiento_proc':
		include('secur/security.php');
			include('src/movimiento/nuevo_proc.php');
			break;

		case 'eliminar_movimiento':
		include('secur/security.php');
			include('src/movimiento/eliminar.php');
			break;

		case 'modificar_movimiento':
		include('secur/security.php');
			include('src/movimiento/modificar.php');
			break;

		case 'modificar_movimiento_proc':
		include('secur/security.php');
			include('src/movimiento/modificar_proc.php');
			break;

		case 'movimientos':
		include('secur/security.php');
			include('src/movimiento/movimientos.php');
			break;

		case 'buscar_movimiento':
		include('secur/security.php');
			include('src/movimiento/busqueda.php');
			break;

	// IMPRIMIR /////////////////////////////////////////////////////////////

		case 'imprime':
			include('src/pdf/pdf.php');
			break;

		case 'imprime_u':
		include('secur/security.php');
			include('src/pdf/creapdf_usuario.php');
			break;

		case 'pdf':
			include('src/pdf/pdf.php');
			break;


	default:
		include('src/home.php');
		break;
}
?>