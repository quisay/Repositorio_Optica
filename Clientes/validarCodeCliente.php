<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/Optica/Controlador/UsuarioControlador.php";
include "$root/Optica/Controlador/ClienteControlador.php";
include "$root/Optica/login/helps/helps.php";
session_start();

header('Content-type: application/json');
$resultado = array();
$resultado = array("estado"=>"true");

//die(muere);
$arr_clientes = ClienteControlador::registraCliente();
//print_r($arr_clientes);
//return print(json_encode($resultado));
//return true;
//$resultado = array("estado"=>"false");
return print(json_encode($resultado));

?>