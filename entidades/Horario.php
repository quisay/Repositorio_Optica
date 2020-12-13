<?php

class Horario{
private $Horario_ID;
private $Fecha;               
private $Hora;
private $Descripcion;
private $Semana;
private $FechaMod;



function setHorario_ID($Horario_ID) { $this->Horario_ID = $Horario_ID; }
function getHorario_ID() { return $this->Horario_ID; }
function setFecha($Fecha) { $this->Fecha = $Fecha; }
function getFecha() { return $this->Fecha; }
function setHora($Hora) { $this->Hora = $Hora; }
function getHora() { return $this->Hora; }
function setDescripcion($Descripcion) { $this->Descripcion = $Descripcion; }
function getDescripcion() { return $this->Descripcion; }
function setSemana($Semana) { $this->Semana = $Semana; }
function getSemana() { return $this->Semana; }
function setFechaMod($FechaMod) { $this->FechaMod = $FechaMod; }
function getFechaMod() { return $this->FechaMod; }



}

?>