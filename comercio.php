<?php 
require_once('modelo.php');

class comercio extends modelo{
	//atributos
	protected $id;
	protected $nombre;
	protected $propietario;
	protected $codigo;
	protected $clave;
	protected $localidad;
	protected $direccion;
	protected $email;
	protected $telefono;

	//metodos

	public function __construct(){
		parent::__construct(); //ingresa el construct de modelo - padre - 
	}

	// REGISTRO DE COMERCIO

	public function registro($nombre,$propietario,$codigo,$clave,$localidad,$direccion,$email,$telefono){
		
		// Validacion si existe el comercio
		$val = "SELECT * FROM comercio WHERE codigo_comercio = '$codigo'";
		$ejecuta = $this->_db->query($val);
		$existe = $ejecuta->num_rows;
		if($existe){
			echo "El comercio ya se ha registrado.";
		}else{

		// si no existe lo creamos
		$sql = "INSERT INTO comercio 
		(nombre_comercio,propietario_comercio,id_comercio,clave_comercio,localidad_comercio,direccion_comercio,email_comercio,telefono_comercio) 
		VALUES ('$nombre','$propietario','$codigo','$clave','$localidad','$direccion','$email','$telefono')";
		$reg = $this->_db->query($sql);
		if(!$reg){
			echo "No se pudo registrar el comercio, intentelo más tarde.";
		}else{
			return $reg;
			$reg->close();
			$this->_db->close();
		}
	}
}

	// ELIMINAR COMERCIO

	public function eliminar($id){
		$sql = "DELETE FROM comercio WHERE id_comercio = '$id'";
		$reg = $this->_db->query($sql);
		if(!$reg){
			echo "No se pude eliminar el comercio, intentelo más tarde.";
		}else{
			return $reg;
			$reg->close();
			$this->_db->close();
		}
	}

	// LOGIN COMERCIO

	public function login($codigo,$clave){
		$sql = "SELECT * FROM comercio WHERE codigo_comercio = '$codigo' and clave_comercio = '$clave'";
		$reg = $this->_db->query($sql);
		$existe = $reg->num_rows;
		if($existe == 0){
			return $existe;
		}else{
			return $reg;
			return $existe;
		}
	}

	// SELECCIONAR COMERCIO

	public function seleccionar($id){
		$sql = "SELECT * FROM comercio 
		INNER JOIN localidad ON comercio.localidad_comercio = localidad.id_localidad
		WHERE id_comercio = '$id'";
		$reg = $this->_db->query($sql);
		$existe = $reg->num_rows;
		if($existe == 0){
			return $existe;
		}else{
			return $reg;
			return $existe;
		}
	}

	// MODIFICAR COMERCIO 

	public function modificar($id,$clave,$email,$telefono,$direccion){
		$sql = "UPDATE comercio SET clave_comercio = '$clave', email_comercio = '$email', telefono_comercio = '$telefono',direccion_comercio = '$direccion' WHERE id_comercio = '$id'";
		$reg = $this->_db->query($sql);
		if(!$reg){
			echo "No se pudo modificar, intentelo más tarde.";
		}else{
			return $reg;
		}
	}

	//LISTAR COMERCIO

	public function totalpaginas(){
		$sql = "SELECT * FROM comercio 
		INNER JOIN localidad ON comercio.localidad_comercio = localidad.id_localidad
		ORDER BY id_comercio DESC";
		$listar = $this->_db->query($sql);
		$num_total = $listar->num_rows;
		if($num_total){
			return $num_total;
			$listar->close();
			$this->_db->close();
		}
	} 

	public function listar(){
		$sql = "SELECT * FROM comercio 
		INNER JOIN localidad ON comercio.localidad_comercio = localidad.id_localidad
		ORDER BY id_comercio DESC";
		$listar = $this->_db->query($sql);
		if($listar){
			return $listar;
			$listar->close();
			$this->_db->close();
		}
	} 

	public function listarpag($inicio,$tamano_pagina){
		$sql = "SELECT * FROM comercio 
		INNER JOIN localidad ON comercio.localidad_comercio = localidad.id_localidad
		ORDER BY id_comercio DESC LIMIT ".$inicio."," . $tamano_pagina;
		$listar = $this->_db->query($sql);
		if($listar){
			return $listar;
			$listar->close();
			$this->_db->close();
		}
	} 

	public function buscar($busqueda){
		$sql = "SELECT * FROM comercio 
		INNER JOIN localidad ON comercio.localidad_comercio = localidad.id_localidad
		WHERE nombre_comercio LIKE '%$busqueda%' OR id_comercio LIKE '%$busqueda%' ORDER BY nombre_comercio";
		$listar = $this->_db->query($sql);
		if($listar){
			return $listar;
			$listar->close();
			$this->_db->close();
		}

	}



}// end class modelo



?>