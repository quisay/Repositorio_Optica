<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include_once "$root/Optica/datos/clsClientes.php";
class ClienteControlador{

	public function getCliente($Cliente_ID){
		$ocliente = new Cliente();
		$ocliente->setCliente_ID($Cliente_ID);
		return clsClientes::getCliente($ocliente);
	}
	public function getAllCliente(){
		return clsClientes::getAllCliente();
	}
	public function registrarBasico($correo, $nombre, $apaterno, $amaterno){
		$ocliente = new Cliente();
		$ocliente->setCorreo($correo);
		$ocliente->setNombre($nombre);
		$ocliente->setApaterno($apaterno);
		$ocliente->setAmaterno($amaterno);
		$ocliente->setTipo("0");
		return clsClientes::registrarBasico($ocliente);
	}

	public function registraCliente($ocliente){
	   return clsClientes::registrarCliente($ocliente);
	}
}
?>