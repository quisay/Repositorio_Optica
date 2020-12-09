<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include_once "$root/Optica/entidades/Usuario.php";
include_once "$root/Optica/Controlador/UsuarioControlador.php";
include_once "$root/Optica/login/helps/helps.php";
session_start();
header('Content-type: application/json');
$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
    if (isset($_REQUEST["cuantos_usuarios"])){
	
        $cuantos_usuarios = validar_campo($_REQUEST["cuantos_usuarios"]);
        
       
        $resultado = array("estado"=>"true"); 
        
		
		//Recorremos todos los elementos del html de APO que fueron selecionados
		for($i=0; $i<$cuantos_usuarios; $i++){
			
			$Correo = isset($_REQUEST["txtCorreo".$i])?$_REQUEST["txtCorreo".$i]:null;
			$Password = isset($_REQUEST["txtPassword".$i])?$_REQUEST["txtPassword".$i]:null;
			$Status = isset($_REQUEST["txtStatus".$i])?$_REQUEST["txtStatus".$i]:null;
			$Privilegio = isset($_REQUEST["txtPrivilegio".$i])?$_REQUEST["txtPrivilegio".$i]:null;
			$FechaReg = isset($_REQUEST["txtFechaReg".$i])?$_REQUEST["txtFechaReg".$i]:null;
			$Cliente_ID = isset($_REQUEST["txtCliente_ID".$i])?$_REQUEST["txtCliente_ID".$i]:null;
            
			$resultado = array("estado"=>"false");
			//Asignamos datos a las variables de la Base de Datos
			if(trim($Correo)!=""){
			   //Asignamos a la entidad Usuario
			   $oUsuario = new Usuario();
               $oUsuario->setCorreo($Correo);
			   $oUsuario->setPassword($Password);
			   $oUsuario->setStatus($Status);
			   $oUsuario->setPrivilegio($Privilegio);
			   $oUsuario->setFechaReg($FechaReg);
			   $oUsuario->setCliente_ID($Cliente_ID);
              //echo "<br>Correo  ".$Correo;
		       $resultado = array("estado"=>"true");
			   //Antes de insertar eliminamos registros
			   UsuarioControlador::deleteUsuario($oUsuario);
			   //Insertamos registro
               UsuarioControlador::InsertaUsuario($oUsuario);
			}
		}
	
			
        return print(json_encode($resultado));
    }
}
$resultado = array("estado"=>"true");
return print(json_encode($resultado));

?>