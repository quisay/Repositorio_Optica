<?php

class Cita{
private $Cita_ID;
private $Fecha;               
private $Hora;
private $Cliente_ID;
private $Medico_ID;
private $FechaMod;
private $FechaIngreso;
private $FechaSalida;
private $Status;
private $Observaciones;


function setCita_ID($Cita_ID) { $this->Cita_ID = $Cita_ID; }
function getCita_ID() { return $this->Cita_ID; }
function setFecha($Fecha) { $this->Fecha = $Fecha; }
function getFecha() { return $this->Fecha; }
function setHora($Hora) { $this->Hora = $Hora; }
function getHora() { return $this->Hora; }
function setCliente_ID($Cliente_ID) { $this->Cliente_ID = $Cliente_ID; }
function getCliente_ID() { return $this->Cliente_ID; }
function setMedico_ID($Medico_ID) { $this->Medico_ID = $Medico_ID; }
function getMedico_ID() { return $this->Medico_ID; }
function setFechaMod($FechaMod) { $this->FechaMod = $FechaMod; }
function getFechaMod() { return $this->FechaMod; }
function setFechaIngreso($FechaIngreso) { $this->FechaIngreso = $FechaIngreso; }
function getFechaIngreso() { return $this->FechaIngreso; }
function setFechaSalida($FechaSalida) { $this->FechaSalida = $FechaSalida; }
function getFechaSalida() { return $this->FechaSalida; }
function setStatus($Status) { $this->Status = $Status; }
function getStatus() { return $this->Status; }
function setObservaciones($Observaciones) { $this->Observaciones = $Observaciones; }
function getObservaciones() { return $this->Observaciones; }



}

?>