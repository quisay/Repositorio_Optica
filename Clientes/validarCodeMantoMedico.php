<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/Optica/Controlador/MedicoControlador.php";
include "$root/Optica/login/helps/helps.php";
session_start();
header('Content-type: application/json');
$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
    if (isset($_REQUEST["txtMedico_ID"])){
	
        $txtMedico_ID = validar_campo($_REQUEST["txtMedico_ID"]);
        $txtNombre = validar_campo($_REQUEST["txtNombre"]);
        $txtApaterno = validar_campo($_REQUEST["txtApaterno"]);
        $txtAmaterno = validar_campo($_REQUEST["txtAmaterno"]);
        $resultado = array("estado"=>"true");
        //Asignamos a la entidad medico
        $omedico = new Medico();
        $omedico->setMedico_ID($txtMedico_ID);
		//echo " medico ".$txtMedico_ID;
        $omedico->setNombre($txtNombre);
        $omedico->setApaterno($txtApaterno);
        $omedico->setAmaterno($txtAmaterno);
		

		$resultado = array("estado"=>"true");
		
		if(MedicoControlador::registraMedico($omedico)){
			return print(json_encode($resultado));
		
		//Antes de insertar eliminamos registros
		//MedicoControlador::eliminaMedico($omedico);
		//Insertamos registro
        //MedicoControlador::registraMedico($omedico);
		
		}	
    }
			
}
$resultado = array("estado"=>"false");
return print(json_encode($resultado));

?>
