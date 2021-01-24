<?php

class Imgtxtcarrusel{
private $Imagen_ID;
private $Texto_ID;
private $FechaInicial;
private $FechaFinal;
private $Prioridad;

function setImagen_ID($Imagen_ID) { $this->Imagen_ID = $Imagen_ID; }
function getImagen_ID() { return $this->Imagen_ID; }
function setTexto_ID($Texto_ID) { $this->Texto_ID = $Texto_ID; }
function getTexto_ID() { return $this->Texto_ID; }
function setFechaInicial($FechaInicial) { $this->FechaInicial = $FechaInicial; }
function getFechaInicial() { return $this->FechaInicial; }
function setFechaFinal($FechaFinal) { $this->FechaFinal = $FechaFinal; }
function getFechaFinal() { return $this->FechaFinal; }
function setPrioridad($Prioridad) { $this->Prioridad = $Prioridad; }
function getPrioridad() { return $this->Prioridad; }

}


?>