<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include_once "$root/Optica/datos/clsHorario.php";
class HorarioControlador{

	public function getHorario($Horario_ID){
		$ohorario = new Horario();
		$ohorario->setHorario_ID($Horario_ID);
		return clsHorario::getHorario($ohorario);
	}
	public function getAllHorario(){
		return clsHorario::getAllHorario();
	}
	public function getUltimaHorario($Horario_ID){
		return clsHorario::getUltimaHorario($Horario_ID);
	}
	public function getProximaHorario($Horario_ID){
		return clsHorario::getProximaHorario($Horario_ID);
	}
	public function getProximaFichaHorario($Horario_ID){
		return clsHorario::getProximaFichaHorario($Horario_ID);
	}
	public function registrarHorario($Horario_ID, $Fecha, $Hora, $Descripcion, $Semana, $FechaMod){
		$ohorario = new Horario();
		$ohorario->setHorario_ID($Horario_ID);
		$ohorario->setFecha($Fecha);
		$ohorario->setHora($Hora);
		$ohorario->setDescripcion($Descripcion);
		$ohorario->setSemana($Semana);
		$ohorario->setFechaMod($FechaMod);
		return clsHorario::registrarHorario($ohorario);
	}

	public function registraHorario($ohorario){
	   return clsHorario::registrarHorario($ohorario);
	}
}
?>
