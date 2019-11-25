<?php 
require_once('modelo.php');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
class lead extends modelo{
	//atributos
	protected $id_lead;
	protected $nombres;
	protected $apellidos;
	protected $identificacion;
	protected $celular;
	protected $correo;
	protected $programa;
	protected $facultad;
	protected $modalidad;
	protected $ciudad;
	protected $observacion;
	protected $semestre;
	protected $fuente;
	protected $ip_interesado;
	protected $sede;

	//metodos

	public function __construct(){
		parent::__construct(); //ingresa el construct de modelo - padre - 
	}

	// REGISTRO

	public function registro_lead($nombres,$apellidos,$identificacion,$celular,$correo,$programa,$facultad,$modalidad,$ciudad,$observacion,$semestre,$fuente,$ip_interesado,$sede){
			$sql = "INSERT INTO leads (nombres,apellidos,identificacion,celular,correo,programa,facultad,modalidad,ciudad,observacion,semestre,fuente,ip_interesado,sede) VALUES ('$nombres','$apellidos','$identificacion','$celular','$correo','$programa','$facultad','$modalidad','$ciudad','$observacion','$semestre','$fuente','$ip_interesado','$sede')";
			$reg = $this->_db->query($sql);
			if(!$reg){
				echo "No se pudo registrar el lead";
			}else{
				return $reg;
				$reg->close();
				$this->_db->close();
			}
		}

	// ELIMINAR

	public function eliminar_lead($id){
		$sql = "DELETE FROM leads WHERE id_usuario = '$id'";
		$reg = $this->_db->query($sql);
		if(!$reg){
			echo "No se pude eliminar el lead";
		}else{
			return $reg;
			$reg->close();
			$this->_db->close();
		}
	}	

	// SELECCIONAR

	public function seleccionar_lead($id){
		$sql = "SELECT * FROM (leads
		INNER JOIN estados ON estados.id_estado = leads.id_estado
		INNER JOIN departamentos ON departamentos.id_departamento = leads.id_departamento
		INNER JOIN municipios ON municipios.id_municipio = leads.id_municipio
		)
		WHERE id_lead = '$id'";
		$reg = $this->_db->query($sql);
		$existe = $reg->num_rows;
		if($existe == 0){
			return $existe;
		}else{
			return $reg;
			return $existe;
		}
	}

	// MODIFICAR

	public function modificar_lead($id_lead,$nombres,$apellidos,$identificacion,$celular,$correo,$programa,$facultad,$modalidad,$ciudad,$observacion,$semestre,$fuente,$ip_interesado,$sede){
		$sql = "UPDATE leads SET nombres = '$nombres', apellidos = '$apellidos',identificacion = '$identificacion' celular = '$celular',correo = '$correo',programa = '$programa',facultad = '$facultad',modalidad = '$modalidad',ciudad = '$ciudad',observacion = '$observacion',semestre = '$semestre',fuente = '$fuente' WHERE id_lead = '$id_lead'";
		$reg = $this->_db->query($sql);
		if(!$reg){
			echo "no se pudo modificar";
		}else{
			return $reg;
		}
	}

	//LISTAR 

	public function totalpaginas(){
		$sql = "SELECT * FROM leads ORDER BY fecha DESC";
		$listar = $this->_db->query($sql);
		$num_total = $listar->num_rows;
		if($num_total){
			return $num_total;
			$listar->close();
			$this->_db->close();
		}
	} 

	public function listarpag($inicio,$tamano_pagina){
		$sql = "SELECT * FROM leads ORDER BY fecha DESC LIMIT ".$inicio."," . $tamano_pagina;
		$listar = $this->_db->query($sql);
		if($listar){
			return $listar;
			$listar->close();
			$this->_db->close();
		}
	} 

	public function listar(){
		$sql = "SELECT * FROM leads
		ORDER BY fecha DESC";
		$listar = $this->_db->query($sql);
		if($listar){
			return $listar;
			$listar->close();
			$this->_db->close();
		}
	}

	public function ciudades(){
		$sql = "SELECT * FROM ciudades";
		$listar = $this->_db->query($sql);
		if($listar){
			return $listar;
			$listar->close();
			$this->_db->close();
		}
	} 

	//BUSCAR LEADS

	public function buscar_lead($busqueda){
		$sql = "SELECT * FROM leads 
		WHERE nombres LIKE '%$busqueda%' OR apellidos LIKE '%$busqueda%' OR identificacion LIKE '%$busqueda%' ORDER BY apellidos";
		$listar = $this->_db->query($sql);
		if($listar){
			return $listar;
			$listar->close();
			$this->_db->close();
		}

	}

	//LISTAR ESTADOS

	public function estado(){
		$sql = "SELECT * FROM estados"; 
		$listar = $this->_db->query($sql);
		if($listar){
			return $listar;
			$listar->close();
			$this->_db->close();
		}

	}

	//PROGRAMAS POR LEADS

	public function registros_lead($id){
		$sql = "SELECT * FROM (programaxlead
		INNER JOIN facultad ON facultad.id_facultad = programaxlead.id_facultad
		INNER JOIN programa ON programa.id_programa = programaxlead.id_programa
		)
		WHERE id_lead = '$id'";
		$reg = $this->_db->query($sql);
		$existe = $reg->num_rows;
		if($existe == 0){
			return $existe;
		}else{
			return $reg;
			return $existe;
		}
	}


}// end class modelo



?>