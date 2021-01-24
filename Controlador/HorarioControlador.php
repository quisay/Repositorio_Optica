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
	public function registrarHorario($Horario_ID, $Descripcion, $Dia, $Hora, $Medico_ID, $FechaMod, $Usuario){
		$ohorario = new Horario();
		$ohorario->setHorario_ID($Horario_ID);
		$ohorario->setDescripcion($Descripcion);
		$ohorario->setDia($Dia);
		$ohorario->setHora($Hora);
		$ohorario->setMedico_ID($Medico_ID);
		$ohorario->setFechaMod($FechaMod);
		$ohorario->setUsuario($Usuario);
		return clsHorario::registrarHorario($ohorario);
	}

	public function registraHorario($ohorario){
	   return clsHorario::registrarHorario($ohorario);
	}
}
?>
