<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include_once "$root/Optica/datos/clsProgFecha.php";
class ProgFechaControlador{

	public function getProgFecha($Fecha, $Medico_ID){
		$oprogfecha = new ProgFecha();
		$oprogfecha->setFecha($Fecha);
		return clsProgFecha::getProgFecha($oProgfecha);
	}
	public function getAllProgFecha(){
		return clsProgFecha::getAllProgFecha();
	}
	public function getUltimaProgFecha($Fecha, $Medico_ID){
		return clsProgFecha::getUltimaProgFecha($Fecha, $Medico_ID);
	}
	public function getProximaProgFecha($Fecha, $Medico_ID){
		return clsProgFecha::getProximaProgFecha($Fecha, $Medico_ID);
	}
	public function getProximaFichaProgFecha($Fecha, $Medico_ID){
		return clsProgFecha::getProximaFichaProgFecha($Fecha, $Medico_ID);
	}
	public function registrarProgFecha($oprogfecha){
		return clsProgFecha::registrarProgFecha($oprogfecha);
	}

	public function registraProgFecha($oprogfecha){
	   return clsProgFecha::registrarProgFecha($oprogfecha);
	}
}
?>
