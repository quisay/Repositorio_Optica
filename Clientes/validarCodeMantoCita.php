<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/Optica/Controlador/CitaControlador.php";
include "$root/Optica/login/helps/helps.php";
session_start();
header('Content-type: application/json');
$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
    if (isset($_REQUEST["txtCita_ID"])){
	echo "pasa2";
        $txtCita_ID = validar_campo($_REQUEST["txtCita_ID"]);
        $txtFecha = validar_campo($_REQUEST["txtFecha"]);
        $txtHora = validar_campo($_REQUEST["txtHora"]);
        $txtCliente_ID = validar_campo($_REQUEST["txtCliente_ID"]);
        $txtMedico_ID = validar_campo($_REQUEST["txtMedico_ID"]);
        $txtFechaMod = validar_campo($_REQUEST["txtFechaMod"]);
        $txtFechaIngreso = validar_campo($_REQUEST["txtFechaIngreso"]);
        $txtFechaSalida = validar_campo($_REQUEST["txtFechaSalida"]);
        $txtStatus = validar_campo($_REQUEST["txtStatus"]);
        $txtObservaciones = validar_campo($_REQUEST["txtObservaciones"]);
     
        $resultado = array("estado"=>"true");
        //Asignamos a la entidad cliente
        $cita = new Cita();
        $cita->setCita_ID($txtCita_ID);
        $cita->setFecha($txtFecha);
        $cita->setHora($txtHora);
        $cita->setCliente_ID($txtCliente_ID);
        $cita->setMedico_ID($txtMedico_ID);
        $cita->setFechaMod($txtFechaMod);
        $cita->setFechaIngreso($txtFechaIngreso);
        $cita->setFechaSalida($txtFechaSalida);
        $cita->setStatus($txtStatus);
        $cita->setObservaciones($txtObservaciones);

		$resultado = array("estado"=>"true");
		
        if(CitaControlador::registraCita($cita)){
			return print(json_encode($resultado));
            //return true;
        }	
    }
}
$resultado = array("estado"=>"false");
return print(json_encode($resultado));

?>