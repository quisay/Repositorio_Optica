<?php

class Seccion{
	private $Seccion_ID;
	private $Descripcion;
	private $Tipo;
	private $Status;

	function setSeccion_ID($Seccion_ID) { $this->Seccion_ID = $Seccion_ID; }
	function getSeccion_ID() { return $this->Seccion_ID; }

	function setDescripcion($Descripcion) { $this->Descripcion = $Descripcion; }
	function getDescripcion) { return $this->Descripcion; }

	function setTipo($Tipo) { $this->Tipo = $Tipo; }
	function getTipo) { return $this->Tipo; }

	function setStatus($Status) { $this->Status = $Status; }
	function getStatus) { return $this->Status; }
}

?>