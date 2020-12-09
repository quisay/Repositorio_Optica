<?php

class ClienteConfig{
	private $Seccion_ID;
	private $Cliente_ID;
	private $Config_ID;
	private $Observacion;

	
	function setSeccion_ID($Seccion_ID) { $this->Seccion_ID = $Seccion_ID; }
	function getSeccion_ID() { return $this->Seccion_ID; }
	
	function setCliente_ID($Cliente_ID) { $this->Cliente_ID = $Cliente_ID; }
	function getCliente_ID() { return $this->Cliente_ID; }

	function setConfig_ID($Config_ID) { $this->Config_ID = $Config_ID; }
	function getConfig_ID() { return $this->Config_ID; }
	
	function setObservacion($Observacion) { $this->Observacion = $Observacion; }
	function getObservacion() { return $this->Observacion; }
}

?>