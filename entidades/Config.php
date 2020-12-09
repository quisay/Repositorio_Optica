<?php

class Config{
	private $Seccion_ID;
	private $Catalogo_ID;
	private $Descripcion;
	private $Tipo;
	private $Status;
	private $XML;
	private $Usuario_ID;
	private $Fmod;
	
	function setSeccion_ID($Seccion_ID) { $this->Seccion_ID = $Seccion_ID; }
	function getSeccion_ID() { return $this->Seccion_ID; }
	
	function setCatalogo_ID($Catalogo_ID) { $this->Catalogo_ID = $Catalogo_ID; }
	function getCatalogo_ID() { return $this->Catalogo_ID; }

	function setDescripcion($Descripcion) { $this->Descripcion = $Descripcion; }
	function getDescripcion() { return $this->Descripcion; }

	function setTipo($Tipo) { $this->Tipo = $Tipo; }
	function getTipo() { return $this->Tipo; }

	function setStatus($Status) { $this->Status = $Status; }
	function getStatus() { return $this->Status; }
	
	function setXML($XML) { $this->XML = $XML; }
	function getXML() { return $this->XML; }
	
	function setUsuario_ID($Usuario_ID) { $this->Usuario_ID = $Usuario_ID; }
	function getUsuario_ID() { return $this->Usuario_ID; }
	
	function setFmod($Fmod) { $this->Fmod = $Fmod; }
	function getFmod() { return $this->Fmod; }
}

?>