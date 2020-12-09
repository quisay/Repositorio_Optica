<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include_once "$root/Optica/datos/clsConfig.php";
class ConfigControlador{

	public function getConfig($Seccion_ID){
		$oconfig = new Config();
		$oconfig->setSeccion_ID($Seccion_ID);
		return clsConfig::getConfig($oconfig);
	}
	public function getAllConfig(){
		return clsConfig::getAllConfig();
	}
	

	public function registraConfig($oconfig){
	   return clsConfig::registrarConfig($oconfig);
	}
}
?>