<?php

class ProgFecha{
private $Fecha;
private $Medico_ID;               
private $Semana;
private $Anio;
private $Actividad;
private $FechaMod;
private $Usuario;



function setFecha($Fecha) { $this->Fecha = $Fecha; }
function getFecha() { return $this->Fecha; }
function setMedico_ID($Medico_ID) { $this->Medico_ID = $Medico_ID; }
function getMedico_ID() { return $this->Medico_ID; }
function setSemana($Semana) { $this->Semana = $Semana; }
function getSemana() { return $this->Semana; }
function setAnio($Anio) { $this->Anio = $Anio; }
function getAnio() { return $this->Anio; }
function setActividad($Actividad) { $this->Actividad = $Actividad; }
function getActividad() { return $this->Actividad; }
function setFechaMod($FechaMod) { $this->FechaMod = $FechaMod; }
function getFechaMod() { return $this->FechaMod; }
function setUsuario($Usuario) { $this->Usuario = $Usuario; }
function getUsuario() { return $this->Usuario; }


}

?>