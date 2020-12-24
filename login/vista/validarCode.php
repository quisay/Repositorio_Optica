<?php 

$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include_once "$root/Optica/Controlador/UsuarioControlador.php";
include_once "$root/Optica/Controlador/ClienteControlador.php";
include_once "$root/Optica/login/helps/helps.php";
session_start();
header('Content-type: application/json');
$resultado = array();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_REQUEST["txtCorreo"]) && isset($_REQUEST["txtPassword"])){
        $txtcorreo = validar_campo($_REQUEST["txtCorreo"]);
        $txtpassword = validar_campo($_REQUEST["txtPassword"]);
        $resultado = array("estado"=>"true");
        if(UsuarioControlador::login($txtcorreo,$txtpassword)){
        	$usuario = UsuarioControlador::getUsuario($txtcorreo,$txtpassword);
            $cliente = ClienteControlador::getCliente($usuario->getCliente_ID());
            $nombcompl = $cliente->getNombre()." ".$cliente->getApaterno()." ".$cliente->getAmaterno();
        	$_SESSION["usuario"] = array(
        		"nombre" => $nombcompl,
        		"correo" => $usuario->getCorreo(),
        		"privilegio" => $usuario->getPrivilegio(),
        	);
        	return print(json_encode($resultado));
        }	
    }
}
$resultado = array("estado"=>"false");
//print_r($resultado);***
//die("aqui");
return print(json_encode($resultado));

?>