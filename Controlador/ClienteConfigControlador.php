<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include_once "$root/Optica/datos/clsClienteConfig.php";
class ClienteConfigControlador{

	public function getConfig($Cliente_ID, $Seccion_ID){
		return clsClienteConfig::getConfig($Cliente_ID, $Seccion_ID);
	}
	public function getAllConfig(){
		return clsClienteConfig::getAllConfig();
	}
	

	public function registraConfig($oconfig){
	   return clsClienteConfig::registrarConfig($oconfig);
	}
	public function deleteConfig($Cliente_ID, $Seccion_ID){
		return clsClienteConfig::deleteConfig($Cliente_ID, $Seccion_ID);
	}
}
?>