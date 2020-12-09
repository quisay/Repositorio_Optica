<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include_once "$root/Optica/datos/clsCita.php";
class CitaControlador{

	public function getCita($Cita_ID){
		$ocita = new Cita();
		$ocita->setCita_ID($Cita_ID);
		return clsCita::getCita($ocita);
	}
	public function getAllCita(){
		return clsCita::getAllCita();
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
