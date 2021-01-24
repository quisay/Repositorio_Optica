<?php

class Imgcarrusel{
private $Imagen_ID;
private $Imagen;
private $Descripcion;

function setImagen_ID($Imagen_ID) { $this->Imagen_ID = $Imagen_ID; }
function getImagen_ID() { return $this->Imagen_ID; }
function setImagen($Imagen) { $this->Imagen = $Imagen; }
function getImagen() { return $this->Imagen; }
function setDescripcion($Descripcion) { $this->Descripcion = $Descripcion; }
function getDescripcion() { return $this->Descripcion; }

}


?>