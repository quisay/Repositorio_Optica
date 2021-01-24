<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include_once "$root/Optica/datos/clsProgHorario.php";
class ProgHorarioControlador{

	public function getProgHorario($Medico_ID){
		$oproghorario = new ProgHorario();
		$oproghorario->setMedico_ID($Medico_ID);
		return clsProgHorario::getProgHorario($oProghorario);
	}
	public function getAllProgHorario(){
		return clsProgHorario::getAllProgHorario();
	}
	public function getUltimaProgHorario($Medico_ID){
		return clsProgHorario::getUltimaProgHorario($Medico_ID);
	}
	public function getProximaProgHorario($Medico_ID){
		return clsProgHorario::getProximaProgHorario($Medico_ID);
	}
	public function getProximaFichaProgHorario($Medico_ID){
		return clsProgHorario::getProximaFichaProgHorario($Medico_ID);
	}
	public function registrarProgHorario($Medico_ID, $Fecha, $Hora){
		$oproghorario = new ProgHorario();
		$oproghorario->setMedico_ID($Medico_ID);
		$oproghorario->setFecha($Fecha);
		$oproghorario->setHora($hora);
		return clsProgHorarioControlador::registrarProgHorario($oproghorario);
	}

	public function registraProgHorario($oproghorario){
	   return clsProgHorario::registrarProgHorario($oproghorario);
	}
	public function deleteProgHorario($Medico_ID, $Fecha){
		return clsProgHorario::deleteProgHorario($Medico_ID, $Fecha);
	}
}
?>
