<?php 
class Conexion{
	/**
	 **Conexion a la base de datos
	 **/
	public static function conectar(){
		try {
			
			$conn = new PDO("mysql:host=localhost;dbname=BD_Tienda","root","");
			
			return $conn;
		} catch (PDOException $e) {
			die("error ".$e->getMessage());
		}
	}
}
Conexion::conectar();

?>