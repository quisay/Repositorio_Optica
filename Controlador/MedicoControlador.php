<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include_once "$root/Optica/datos/clsMedicos.php";
class 	MedicoControlador{

	public function getMedico($Medico_ID){
		$omedico = new Medico();
		$omedico->setMedico_ID($Medico_ID);
		return clsMedicos::getMedico($omedico);
	}
	public function getAllMedico(){
		return clsMedicos::getAllMedico();
	}
	public function registraMedico($omedico){
		return clsMedicos::registraMedico($omedico);
	}
}
?>