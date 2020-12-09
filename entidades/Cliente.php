<?php

class Cliente{
private $Cliente_ID;
private $Tipo;
private $Nombre;
private $Apaterno;
private $Amaterno;
private $RFC;
private $CURP;
private $Direccion;
private $Calle;
private $Colonia;
private $Municipio;
private $Estado;
private $CP;
private $Numinterior;
private $Numexterior;
private $Fechanacimiento;
private $Sexo;
private $Ocupacion;
private $Hobby;
private $Estadocivil;
private $Telcasa;
private $Teloficina;
private $Celular;
private $Correo;
private $FechaReg;
private $Edad;
private $Status;

function setCliente_ID($Cliente_ID) { $this->Cliente_ID = $Cliente_ID; }
function getCliente_ID() { return $this->Cliente_ID; }
function setTipo($Tipo) { $this->Tipo = $Tipo; }
function getTipo() { return $this->Tipo; }
function setNombre($Nombre) { $this->Nombre = $Nombre; }
function getNombre() { return $this->Nombre; }
function setApaterno($Apaterno) { $this->Apaterno = $Apaterno; }
function getApaterno() { return $this->Apaterno; }
function setAmaterno($Amaterno) { $this->Amaterno = $Amaterno; }
function getAmaterno() { return $this->Amaterno; }
function setRFC($RFC) { $this->RFC = $RFC; }
function getRFC() { return $this->RFC; }
function setCURP($CURP) { $this->CURP = $CURP; }
function getCURP() { return $this->CURP; }
function setDireccion($Direccion) { $this->Direccion = $Direccion; }
function getDireccion() { return $this->Direccion; }
function setCalle($Calle) { $this->Calle = $Calle; }
function getCalle() { return $this->Calle; }
function setColonia($Colonia) { $this->Colonia = $Colonia; }
function getColonia() { return $this->Colonia; }
function setMunicipio($Municipio) { $this->Municipio = $Municipio; }
function getMunicipio() { return $this->Municipio; }
function setEstado($Estado) { $this->Estado = $Estado; }
function getEstado() { return $this->Estado; }
function setCP($CP) { $this->CP = $CP; }
function getCP() { return $this->CP; }
function setNuminterior($Numinterior) { $this->Numinterior = $Numinterior; }
function getNuminterior() { return $this->Numinterior; }
function setNumexterior($Numexterior) { $this->Numexterior = $Numexterior; }
function getNumexterior() { return $this->Numexterior; }
function setFechanacimiento($Fechanacimiento) { $this->Fechanacimiento = $Fechanacimiento; }
function getFechanacimiento() { return $this->Fechanacimiento; }
function setSexo($Sexo) { $this->Sexo = $Sexo; }
function getSexo() { return $this->Sexo; }
function setOcupacion($Ocupacion) { $this->Ocupacion = $Ocupacion; }
function getOcupacion() { return $this->Ocupacion; }
function setHobby($Hobby) { $this->Hobby = $Hobby; }
function getHobby() { return $this->Hobby; }
function setEstadocivil($Estadocivil) { $this->Estadocivil = $Estadocivil; }
function getEstadocivil() { return $this->Estadocivil; }
function setTelcasa($Telcasa) { $this->Telcasa = $Telcasa; }
function getTelcasa() { return $this->Telcasa; }
function setTeloficina($Teloficina) { $this->Teloficina = $Teloficina; }
function getTeloficina() { return $this->Teloficina; }
function setCelular($Celular) { $this->Celular = $Celular; }
function getCelular() { return $this->Celular; }
function setCorreo($Correo) { $this->Correo = $Correo; }
function getCorreo() { return $this->Correo; }
function setFechaReg($FechaReg) { $this->FechaReg = $FechaReg; }
function getFechaReg() { return $this->FechaReg; }
function setEdad($Edad) { $this->Edad = $Edad; }
function getEdad() { return $this->Edad; }
function setStatus($Status) { $this->Status = $Status; }
function getStatus() { return $this->Status; }

}

?>