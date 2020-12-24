<?php

class Medico{
private $Medico_ID;
private $Nombre;
private $Apaterno;
private $Amaterno;

function setMedico_ID($Medico_ID) { $this->Medico_ID = $Medico_ID; }
function getMedico_ID() { return $this->Medico_ID; }
function setNombre($Nombre) { $this->Nombre = $Nombre; }
function getNombre() { return $this->Nombre; }
function setApaterno($Apaterno) { $this->Apaterno = $Apaterno; }
function getApaterno() { return $this->Apaterno; }
function setAmaterno($Amaterno) { $this->Amaterno = $Amaterno; }
function getAmaterno() { return $this->Amaterno; }

}

?>