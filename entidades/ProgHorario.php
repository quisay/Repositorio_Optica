<?php

class ProgHorario{
private $Medico_ID;               
private $Fecha;
private $Hora;



function setMedico_ID($Medico_ID) { $this->Medico_ID = $Medico_ID; }
function getMedico_ID() { return $this->Medico_ID; }
function setFecha($Fecha) { $this->Fecha = $Fecha; }
function getFecha() { return $this->Fecha; }
function setHora($Hora) { $this->Hora = $Hora; }
function getHora() { return $this->Hora; }



}

?>