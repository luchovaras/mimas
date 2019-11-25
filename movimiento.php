<?php 
require_once('modelo.php');

class movimiento extends modelo{
	//atributos
	protected $id;
	protected $idusuario;
	protected $idcomercio;
	protected $cupon;
	protected $fechacompra;
	protected $fecha;
	protected $cuota;
	protected $importe;
	protected $periodo;
	// protected $mes;

	//metodos

	public function __construct(){
		parent::__construct(); //ingresa el construct de modelo - padre - 
	}

	// REGISTRO DE MOVIMIENTO

	public function registro($idusuario,$idcomercio,$cupon,$fechacompra,$cuota,$importe){
		
		$mes = getdate();
		$periodo = $mes['mon'];

		$valus = "SELECT * FROM usuario WHERE id_usuario = '$idusuario'";
		$sius = $this->_db->query($valus);
		$existeus = $sius->num_rows;

		if (!$existeus) {
			echo "el usuario no existe";
			}else{
			$valco = "SELECT * FROM comercio WHERE id_comercio = '$idcomercio'";
			$sico = $this->_db->query($valco);
			$existeco = $sico->num_rows;

			if (!$existeco) {
				echo "el comercio no existe";
			}else{
				$sql = "INSERT INTO movimiento 
				(id_usuario_mov,id_comercio_mov,cupon_mov,fechacompra_mov,cuota_mov,importe_mov,periodo_mov) 
				VALUES ('$idusuario','$idcomercio','$cupon','$fechacompra','$cuota','$importe','$periodo')";
				$reg = $this->_db->query($sql);
			
			if(!$reg){
				echo "No se pudo registrar el comercio, comuniquese con el webmaster.";
			}else{
				return $reg;
				$reg->close();
				$this->_db->close();
		}
	}
}
}
// } en validacion si existe DESACTIVADA

	// ELIMINAR MOVIMIENTO

	public function eliminar($id){
		$sql = "DELETE FROM movimiento WHERE id_movimiento = '$id'";
		$reg = $this->_db->query($sql);
		if(!$reg){
			echo "No se pude eliminar el movimiento, intentelo mÃ¡s tarde.";
		}else{
			return $reg;
			$reg->close();
			$this->_db->close();
		}
	}


	// SELECCIONAR MOVIMIENTO

	public function seleccionar($id){
		$sql = "SELECT * FROM movimiento 
		INNER JOIN usuario ON movimientos.Usuario = registrado.usuario_usuario 
		WHERE id = '$id'";
		$reg = $this->_db->query($sql);
		$existe = $reg->num_rows;
		if($existe == 0){
			return $existe;
		}else{
			return $reg;
			return $existe;
		}
	}

	// MODIFICAR MOVIMIENTO 

	public function modificar($id,$cupon,$fechacompra,$cuota,$importe){
		$sql = "UPDATE movimiento SET 
		cupon_mov = '$cupon',
		fechacompra_mov = '$fechacompra',
		cuota_mov = '$cuota',
		importe_mov = '$importe'
		WHERE id_movimiento = '$id'";
		$reg = $this->_db->query($sql);
		if(!$reg){
			echo "No se pudo modificar, intentelo mÃ¡s tarde.";
		}else{
			return $reg;
		}
	}

	//LISTAR MOVIMIENTOS

	public function listar(){
		$sql = "SELECT * FROM movimiento 
		INNER JOIN registrado ON movimientos.Usuario = registrado.usuario_usuario
		-- INNER JOIN comercio ON movimientos.id_comercio_mov = comercio.id_comercio 
		-- INNER JOIN cuota ON movimientos.cuota_mov = cuota.id_cuota 
		ORDER BY Fecha DESC";
		$listar = $this->_db->query($sql);
		if($listar){
			return $listar;
			$listar->close();
			$this->_db->close();
		}else{
			echo "error 1";
		}
	} 

	// LISTAR ESTADOS

	public function listarcuota(){
		$sql = "SELECT * FROM cuota";
		$listar = $this->_db->query($sql);
		if($listar){
			return $listar;
			$listar->close();
			$this->_db->close();
		}
	} 

	// MOVIMIENTOS DE USUARIOS

	public function seleccionarmov1($id){

		$sql = "SELECT * FROM movimientos 
		INNER JOIN registrado ON movimientos.Usuario = registrado.usuario_usuario 
		WHERE Usuario = '$id' AND Estado = 1 ORDER BY Estado";
		$reg = $this->_db->query($sql);
		$existe = $reg->num_rows;
		if($existe == 0){
			return $existe;
		}else{
			return $reg;
			return $existe;
		}
	}

	public function seleccionarmov2($id){

		$sql = "SELECT * FROM movimientos 
		INNER JOIN registrado ON movimientos.Usuario = registrado.usuario_usuario 
		WHERE Usuario = '$id' AND Estado = 2 ORDER BY Estado";
		$reg = $this->_db->query($sql);
		$existe = $reg->num_rows;
		if($existe == 0){
			return $existe;
		}else{
			return $reg;
			return $existe;
		}
	}

	public function seleccionarmov34($id){

		$sql = "SELECT * FROM movimientos 
		INNER JOIN registrado ON movimientos.Usuario = registrado.usuario_usuario 
		WHERE Usuario = '$id' AND (Estado = 3 OR Estado = 4) ORDER BY Estado";
		$reg = $this->_db->query($sql);
		$existe = $reg->num_rows;
		if($existe == 0){
			return $existe;
		}else{
			return $reg;
			return $existe;
		}
	}

	public function sumar1($id){
		$mes = getdate();
		$periodo = $mes['mon'];
		$mes = getdate();
		$mesh = $mes['mon'];
		$sql = "SELECT SUM(Importe) as total FROM movimientos WHERE Usuario = '$id' AND Estado = 1";
		$reg = $this->_db->query($sql);
		return $reg;	
	}

	public function sumar2($id){
		$mes = getdate();
		$periodo = $mes['mon'];
		$mes = getdate();
		$mesh = $mes['mon'];
		$sql = "SELECT SUM(Importe) as total FROM movimientos WHERE Usuario = '$id' AND (Estado = 1 OR Estado = 2)";
		$reg = $this->_db->query($sql);
		return $reg;	
	}

	public function sumar34($id){
		$mes = getdate();
		$periodo = $mes['mon'];
		$mes = getdate();
		$mesh = $mes['mon'];
		$sql = "SELECT SUM(Importe) as total FROM movimientos WHERE Usuario = '$id' AND (Estado = 3 OR ESTADO = 4)";
		$reg = $this->_db->query($sql);
		return $reg;	
	}



// //////////////////////////////////////////
	///////////////////////////////////

	// MOVIMIENTOS ACTUALIZADOS DE USUARIOS

	public function seleccionarmov1ac($id){

		$sql = "SELECT * FROM movimientos_diarios 
		INNER JOIN registrado ON movimientos_diarios.Usuario = registrado.usuario_usuario 
		WHERE Usuario = '$id' AND Estado = 1 ORDER BY Estado";
		$reg = $this->_db->query($sql);
		$existe = $reg->num_rows;
		if($existe == 0){
			return $existe;
		}else{
			return $reg;
			return $existe;
		}
	}

	public function seleccionarmov2ac($id){

		$sql = "SELECT * FROM movimientos_diarios 
		INNER JOIN registrado ON movimientos_diarios.Usuario = registrado.usuario_usuario 
		WHERE Usuario = '$id' AND Estado = 2 ORDER BY Estado";
		$reg = $this->_db->query($sql);
		$existe = $reg->num_rows;
		if($existe == 0){
			return $existe;
		}else{
			return $reg;
			return $existe;
		}
	}

	public function seleccionarmov34ac($id){

		$sql = "SELECT * FROM movimientos_diarios 
		INNER JOIN registrado ON movimientos_diarios.Usuario = registrado.usuario_usuario 
		WHERE Usuario = '$id' AND (Estado = 3 OR Estado = 4) ORDER BY Estado";
		$reg = $this->_db->query($sql);
		$existe = $reg->num_rows;
		if($existe == 0){
			return $existe;
		}else{
			return $reg;
			return $existe;
		}
	}

	public function sumar1ac($id){
		$mes = getdate();
		$periodo = $mes['mon'];
		$mes = getdate();
		$mesh = $mes['mon'];
		$sql = "SELECT SUM(Importe) as total FROM movimientos_diarios WHERE Usuario = '$id' AND Estado = 1";
		$reg = $this->_db->query($sql);
		return $reg;	
	}

	public function sumar2ac($id){
		$mes = getdate();
		$periodo = $mes['mon'];
		$mes = getdate();
		$mesh = $mes['mon'];
		$sql = "SELECT SUM(Importe) as total FROM movimientos_diarios WHERE Usuario = '$id' AND (Estado = 1 OR Estado = 2)";
		$reg = $this->_db->query($sql);
		return $reg;	
	}

	public function sumar34ac($id){
		$mes = getdate();
		$periodo = $mes['mon'];
		$mes = getdate();
		$mesh = $mes['mon'];
		$sql = "SELECT SUM(Importe) as total FROM movimientos_diarios WHERE Usuario = '$id' AND (Estado = 3 OR ESTADO = 4)";
		$reg = $this->_db->query($sql);
		return $reg;	
	}

	////////////////////////////////////TASAS

	public function listartasas(){
		$sql = "SELECT * FROM tasas";
		$listar = $this->_db->query($sql);
		if($listar){
			return $listar;
			$listar->close();
			$this->_db->close();
		}
	}


}// end class modelo



?>