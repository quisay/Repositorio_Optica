<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include_once "$root/Optica/datos/clsUsuarios.php";

class UsuarioControlador{

	public static function login($correo,$password){
		$ousuario = new Usuario();
		$ousuario->setcorreo($correo);
		$ousuario->setPassword($password);

		return clsUsuarios::login($ousuario);
	} 
	public function getUsuario($correo,$password){
		$ousuario = new Usuario();
		$ousuario->setcorreo($correo);
		$ousuario->setPassword($password);

		return clsUsuarios::getUsuario($ousuario);
	}
	public function getAllUsuarios(){
		$ousuario = new Usuario();
		return clsUsuarios::getAllUsuarios();
	}
	public function registrar($correo, $password, $privilegio, $cliente_id){
		$ousuario = new Usuario();
		$ousuario->setPassword($password);
		$ousuario->setcorreo($correo);
		$ousuario->setPrivilegio($privilegio);
		$ousuario->setCliente_ID($cliente_id);
		return clsUsuarios::registrar($ousuario);
	}
	public function InsertaUsuario($ousuario){
		return clsUsuarios::registrar($ousuario);
	}
	public static function deleteUsuario($ousuario){

		return clsUsuarios::deleteUsuario($ousuario);
	}
}
?>