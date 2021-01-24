<?php

class Horario{
private $Horario_ID;
private $Descripcion;               
private $Dia;
private $Hora;
private $Medico_ID;
private $FechaMod;
private $Usuario;



function setHorario_ID($Horario_ID) { $this->Horario_ID = $Horario_ID; }
function getHorario_ID() { return $this->Horario_ID; }
function setDescripcion($Descripcion) { $this->Descripcion = $Descripcion; }
function getDescripcion() { return $this->Descripcion; }
function setDia($Dia) { $this->Dia = $Dia; }
function getDia() { return $this->Dia; }
function setHora($Hora) { $this->Hora = $Hora; }
function getHora() { return $this->Hora; }
function setMedico_ID($Medico_ID) { $this->Medico_ID = $Medico_ID; }
function getMedico_ID() { return $this->Medico_ID; }
function setFechaMod($FechaMod) { $this->FechaMod = $FechaMod; }
function getFechaMod() { return $this->FechaMod; }
function setUsuario($Usuario) { $this->Usuario = $Usuario; }
function getUsuario() { return $this->Usuario; }


}

?>