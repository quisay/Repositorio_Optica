<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include_once "$root/Optica/datos/clsCita.php";
class CitaControlador{

	public function getCita($Cita_ID, $Fecha){
		$ocita = new Cita();
		$ocita->setCita_ID($Cita_ID);
		$ocita->setFecha($Fecha);
		return clsCita::getCita($ocita);
	}
	public function getAllCita($extra=""){
		return clsCita::getAllCita($extra);
	}
	public function getUltimaCita($Cliente_ID){
		return clsCita::getUltimaCita($Cliente_ID);
	}
	public function getProximaCita($Cliente_ID){
		return clsCita::getProximaCita($Cliente_ID);
	}
	public function getProximaFichaCita($Cliente_ID){
		return clsCita::getProximaFichaCita($Cliente_ID);
	}
	public function registrarCita($Cita_ID, $Fecha, $Hora, $Cliente_ID, $Medico_ID, $FechaMod, $FechaIngreso, $FechaSalida, $Status, $Observaciones){
		$ocita = new Cita();
		$ocita->setCita_ID($Cita_ID);
		$ocita->setFecha($Fecha);
		$ocita->setHora($Hora);
		$ocita->setCliente_ID($Cliente_ID);
		$ocita->setMedico_ID($Medico_ID);
		$ocita->setFechaMod($FechaMod);
		$ocita->setFechaIngreso($FechaIngreso);
		$ocita->setFechaSalida($FechaSalida);
		$ocita->setStatus($Status);
		$ocita->setObservaciones($Observaciones);
		return clsCita::registrarCita($ocita);
	}

	public function registraCita($ocita){
	   return clsCita::registrarCita($ocita);
	}
}
?>
