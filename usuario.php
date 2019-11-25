<?php 
require_once('modelo.php');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
class usuario extends modelo{
	//atributos
	protected $id;
	protected $nombres;
	protected $apellidos;
	protected $usuario;
	protected $clave;
	protected $correo;
	protected $tipo;

	//metodos

	public function __construct(){
		parent::__construct(); //ingresa el construct de modelo - padre - 
	}

	// registrado DE USUARIO

	public function registro($nombre,$apellido,$tarjeta,$clave,$email,$sincorreo,$telefono,$direccion,$localidad){
		
		// Validacion si existe el usuario TABLA USUARIOS
		$existev = "SELECT * FROM plastico WHERE NroPlastico = '$tarjeta'";
		$existeva = $this->_db->query($existev);

		// recupero el Usuario 
		$row = $existeva->fetch_array();
		$insertado = $row['Usuario'];
		$existeval = $existeva->num_rows;

			if($existeval){
				$val = "SELECT * FROM registrado WHERE id_usuario = '$tarjeta'";
				$ejecuta = $this->_db->query($val);
				$existe = $ejecuta->num_rows;
				if($existe){
					header("Location:index.php?sec=registro&reg=error");
				}else if(!$existe){
					$queryemail = "SELECT * FROM registrado WHERE email_usuario = '$email'";
					$exeemail = $this->_db->query($queryemail);
					$numemail = $exeemail->num_rows;
					/*if($numemail){
				header("Location:index.php?sec=registro&reg=errormail");
				}else*/{
			// si no existe lo creamos
			$sql = "INSERT INTO registrado (id_usuario,usuario_usuario,nombre_usuario,apellido_usuario,clave_usuario,email_usuario,sincorreo,telefono_usuario,direccion_usuario,localidad_usuario) VALUES ('$tarjeta','$insertado','$nombre','$apellido','$clave','$email','$sincorreo','$telefono','$direccion','$localidad')";
			$reg = $this->_db->query($sql);
			if(!$reg){
				echo "No se pudo registrar el usuario1";
			}else{
				return $reg;
				$reg->close();
				$this->_db->close();
			}
		}
}
	}else{
			header("Location:index.php?sec=registro&reg=error1");
		}
}
/////////////////////////////////////////////////
/////////////////////////////////////////////////
/////////////////////////////////////////////////

		public function nuevous($nombre,$apellido,$tarjeta,$clave,$email,$telefono,$direccion,$localidad){
		
		// Validacion si existe el usuario
		$existev = "SELECT * FROM usuarios WHERE NroPlastico = '$tarjeta'";
		$existeva = $this->_db->query($existev);
		$existeval = $existeva->num_rows;
			if($existeval){
				$val = "SELECT * FROM registrado WHERE id_usuario = '$tarjeta'";
				$ejecuta = $this->_db->query($val);
				$existe = $ejecuta->num_rows;
				if($existe){
					header("Location:index.php?sec=nuevo_usuario&reg=error");
				}else{

			// si no existe lo creamos
			$sql = "INSERT INTO registrado (id_usuario,nombre_usuario,apellido_usuario,clave_usuario,email_usuario,telefono_usuario,direccion_usuario,localidad_usuario) VALUES ('$tarjeta','$nombre','$apellido','$clave','$email','$telefono','$direccion','$localidad')";
			$reg = $this->_db->query($sql);
			if(!$reg){
				echo "No se pudo registrar el usuario";
			}else{
				return $reg;
				$reg->close();
				$this->_db->close();
			}
		}
	}else{
			header("Location:index.php?sec=nuevo_usuario&reg=error1");
		}
}

	// ELIMINAR USUARIO

	public function eliminar($id){
		$sql = "DELETE FROM registrado WHERE id_usuario = '$id'";
		$reg = $this->_db->query($sql);
		if(!$reg){
			echo "No se pude eliminar el registrado";
		}else{
			return $reg;
			$reg->close();
			$this->_db->close();
		}
	}

	// LOGIN USUARIO

	public function login($usuario,$clave){
			$sql = "SELECT * FROM usuarios WHERE usuario_usuario = '$usuario' and clave_usuario = '$clave'";
			$reg = $this->_db->query($sql);
			$existe = $reg->num_rows;
			if($existe == 0){
				return $existe;
			}else{
				return $reg;
				return $existe;
			}	
		}

	// SELECCIONAR USUARIO

	public function seleccionar($id){
		$sql = "SELECT * FROM usuarios 
		WHERE id_usuario = '$id'";
		$reg = $this->_db->query($sql);
		$existe = $reg->num_rows;
		if($existe == 0){
			return $existe;
		}else{
			return $reg;
			return $existe;
		}
	}

	// MODIFICAR USUARIO - EN STANDBY - NO LO SOLICITA EL CLIENTE

	public function modificar($id,$clave,$email,$telefono,$direccion,$localidad){
		$sql = "UPDATE registrado SET clave_usuario = '$clave', email_usuario = '$email', telefono_usuario = '$telefono',direccion_usuario = '$direccion',localidad_usuario = '$localidad' WHERE usuario_usuario = '$id'";
		$reg = $this->_db->query($sql);
		if(!$reg){
			echo "no se pudo modificar";
		}else{
			return $reg;
		}
	}

	//LISTAR USUARIO

	public function totalpaginas(){
		$sql = "SELECT * FROM registrado 
		INNER JOIN localidad ON registrado.localidad_usuario = localidad.id_localidad
		ORDER BY fecha_usuario DESC";
		$listar = $this->_db->query($sql);
		$num_total = $listar->num_rows;
		if($num_total){
			return $num_total;
			$listar->close();
			$this->_db->close();
		}
	} 

	public function listarpag($inicio,$tamano_pagina){
		$sql = "SELECT * FROM registrado 
		INNER JOIN localidad ON registrado.localidad_usuario = localidad.id_localidad 
		ORDER BY fecha_usuario DESC LIMIT ".$inicio."," . $tamano_pagina;
		$listar = $this->_db->query($sql);
		if($listar){
			return $listar;
			$listar->close();
			$this->_db->close();
		}
	} 

	public function listar(){
		$sql = "SELECT * FROM registrado
		INNER JOIN localidad ON registrado.localidad_usuario = localidad.id_localidad WHERE id_usuario != 1234567891234567
		ORDER BY fecha_usuario DESC";
		$listar = $this->_db->query($sql);
		if($listar){
			return $listar;
			$listar->close();
			$this->_db->close();
		}
	}

	public function listarloc(){
		$sql = "SELECT * FROM localidad";
		$listar = $this->_db->query($sql);
		if($listar){
			return $listar;
			$listar->close();
			$this->_db->close();
		}
	} 

	public function buscar($busqueda){
		$sql = "SELECT * FROM registrado 
		INNER JOIN localidad ON registrado.localidad_usuario = localidad.id_localidad
		WHERE nombre_usuario LIKE '%$busqueda%' OR apellido_usuario LIKE '%$busqueda%' OR id_usuario LIKE '%$busqueda%' ORDER BY id_usuario";
		$listar = $this->_db->query($sql);
		if($listar){
			return $listar;
			$listar->close();
			$this->_db->close();
		}

	}

	public function recuperapass($email){
		$sql = "SELECT * FROM registrado WHERE email_usuario = '$email'";
		$listar = $this->_db->query($sql);
		$existe = $listar->num_rows;
		if ($existe) {
			return $listar;
		}else{
			echo "el correo no existe";
		}
	}

	public function log_usuario($tarjeta){
		$sql = "INSERT INTO log (usuario_log) VALUES ('$tarjeta')";
		$reg = $this->_db->query($sql);
		
			if(!$reg){
				echo "No se pudo registrar el usuario";
			}else{
				return $reg;
				$reg->close();
				$this->_db->close();
			}
	}

	public function listarlog(){
		$sql = "SELECT * FROM log
		INNER JOIN registrado ON registrado.id_usuario = log.usuario_log WHERE id_usuario != 635816
		ORDER BY fecha_log DESC";
		$listar = $this->_db->query($sql);
		if($listar){
			return $listar;
			$listar->close();
			$this->_db->close();
		}
	}

	public function saldo_disponible($id){
		$sql = "SELECT * FROM limites WHERE Usuario = '$id'";
		$resultado = $this->_db->query($sql);
		if (!$resultado) {
			echo "error en la consulta";
		}else{
			return $resultado;
			echo "esto es " . $resultado;
			$resultado->close();
			$this->_db->close();
		}
	}


		public function participa($numero){
		$existev = "SELECT * FROM concurso WHERE numero = '$numero'";
		$existeva = $this->_db->query($existev);
		$existeval = $existeva->num_rows;
			if($existeval == 1){
				return $existeval;
		}else{
			return $existeval;
		}

	}

		public function concursar($nombre,$apellido,$numero){

		$sql = "INSERT INTO concurso (nombre,apellido,numero) VALUES ('$nombre','$apellido','$numero')";
		$reg = $this->_db->query($sql);
			if(!$reg){
				echo "No se pudo registrar el usuario";
			}else{
				return $reg;
				$reg->close();
				$this->_db->close();
			}
	}

	public function participantes(){
		$sql = "SELECT * FROM concurso ORDER BY numero asc";
		$listar = $this->_db->query($sql);
		$num = $listar->num_rows;
		if($listar){
			return $listar;
			return $num;
			$listar->close();
			$this->_db->close();
		}
	}

	public function num_participantes(){
		$sql = "SELECT * FROM concurso";
		$listar = $this->_db->query($sql);
		$num = $listar->num_rows;
		if($listar){
			return $num;
			$listar->close();
			$this->_db->close();
		}
	}

	public function num_registrados(){
		$sql = "SELECT * FROM registrado";
		$listar = $this->_db->query($sql);
		$num = $listar->num_rows;
		if($listar){
			return $num;
			$listar->close();
			$this->_db->close();
		}
	}

}// end class modelo



?>