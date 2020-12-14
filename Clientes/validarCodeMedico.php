<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/Optica/Controlador/MedicoControlador.php";
include "$root/Optica/login/helps/helps.php";
session_start();
header('Content-type: application/json');
$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
    if (isset($_REQUEST["txtNombre"])){
	
        $txtMedico_ID = validar_campo($_REQUEST["txtMedico_ID"]);
        $txtNombre = validar_campo($_REQUEST["txtNombre"]);
        $txtApaterno = validar_campo($_REQUEST["txtApaterno"]);
        $txtAmaterno = validar_campo($_REQUEST["txtAmaterno"]);
        $resultado = array("estado"=>"true");
        //Asignamos a la entidad medico
        $medico = new Medico();
        $medico->setMedico_ID($txtMedico_ID);
		echo " medico ".$txtMedico_ID;
        $medico->setNombre($txtNombre);
        $medico->setApaterno($txtApaterno);
        $medico->setAmaterno($txtAmaterno);


		$resultado = array("estado"=>"true");
        if(MedicoControlador::registraMedico($medico)){
			return print(json_encode($resultado));
            //return true;
        }	
    }
}
$resultado = array("estado"=>"false");
return print(json_encode($resultado));

?>