<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/Optica/Controlador/CitaControlador.php";
include "$root/Optica/login/helps/helps.php";
session_start();

header('Content-type: application/json');
$resultado = array();
$resultado = array("estado"=>"true");

//die(muere);
$arr_cita = CitaControlador::registracita();
//print_r($arr_cita);
//return print(json_encode($resultado));
//return true;
//$resultado = array("estado"=>"false");
return print(json_encode($resultado));

?>