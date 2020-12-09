<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/Optica/entidades/ClienteConfig.php";
include "$root/Optica/Controlador/ClienteConfigControlador.php";
include "$root/Optica/login/helps/helps.php";
session_start();
header('Content-type: application/json');
$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
    if (isset($_REQUEST["maxima_config"])){
	
        $maxima_config = $_REQUEST["maxima_config"];
       
        $resultado = array("estado"=>"true");
		$Cliente_ID = $_REQUEST["Cliente_ID"];
        
        //Antes de insertar eliminamos registros
		$Seccion_ID = "APO";
		ClienteConfigControlador::deleteConfig($Cliente_ID, $Seccion_ID);
		//Recorremos todos los elementos del html de APO que fueron selecionados
		for($i=1; $i<=$maxima_config; $i++){

			//Asignamos datos a las variables de la Base de Datos
			$Config_ID = isset($_REQUEST["APO".$i])?$_REQUEST["APO".$i]:null;
			$Observacion = isset($_REQUEST["Observacion_APO".$i])?$_REQUEST["Observacion_APO".$i]:null;
			//Si seleccionamos chek entra
			if($Config_ID!=""){
			   //Asignamos a la entidad clienteconfig
			   $clienteconfig = new ClienteConfig();
               $clienteconfig->setSeccion_ID($Seccion_ID);
               $clienteconfig->setCliente_ID($Cliente_ID);
               $clienteconfig->setConfig_ID($i);
			   $clienteconfig->setObservacion($Observacion);
		       $resultado = array("estado"=>"true");
			   //Insertamos registro
               ClienteConfigControlador::registraConfig($clienteconfig);
			}
		}
		//Recorremos todos los elementos del html de APP que fueron selecionados
		$Seccion_ID = "APP";
		ClienteConfigControlador::deleteConfig($Cliente_ID, $Seccion_ID);
		for($i=1; $i<=$maxima_config; $i++){

			//Asignamos datos a las variables de la Base de Datos
			
			$Config_ID = isset($_REQUEST["APP".$i])?$_REQUEST["APP".$i]:null;
			$Observacion = isset($_REQUEST["Observacion_APP".$i])?$_REQUEST["Observacion_APP".$i]:null;
			//Si seleccionamos chek entra
			if($Config_ID!=""){
			   //Asignamos a la entidad clienteconfig
			   $clienteconfig = new ClienteConfig();
               $clienteconfig->setSeccion_ID($Seccion_ID);
               $clienteconfig->setCliente_ID($Cliente_ID);
               $clienteconfig->setConfig_ID($i);
			   $clienteconfig->setObservacion($Observacion);
		       $resultado = array("estado"=>"true");
			   //Insertamos registro
               ClienteConfigControlador::registraConfig($clienteconfig);
			}
		}
		//Recorremos todos los elementos del html de AHF que fueron selecionados
		$Seccion_ID = "AHF";
		ClienteConfigControlador::deleteConfig($Cliente_ID, $Seccion_ID);
		for($i=1; $i<=$maxima_config; $i++){

			//Asignamos datos a las variables de la Base de Datos
			$Config_ID = isset($_REQUEST["AHF".$i])?$_REQUEST["AHF".$i]:null;
			$Observacion = isset($_REQUEST["Observacion_AHF".$i])?$_REQUEST["Observacion_AHF".$i]:null;
			//Si seleccionamos chek entra
			if($Config_ID!=""){
			   //Asignamos a la entidad clienteconfig
			   $clienteconfig = new ClienteConfig();
               $clienteconfig->setSeccion_ID($Seccion_ID);
               $clienteconfig->setCliente_ID($Cliente_ID);
               $clienteconfig->setConfig_ID($i);
			   $clienteconfig->setObservacion($Observacion);
		       $resultado = array("estado"=>"true");
			   //Insertamos registro
               ClienteConfigControlador::registraConfig($clienteconfig);
			}
		}
			
        return print(json_encode($resultado));
    }
}
$resultado = array("estado"=>"true");
return print(json_encode($resultado));

?>