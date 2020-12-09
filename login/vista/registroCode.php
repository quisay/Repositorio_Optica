<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/Optica/Controlador/UsuarioControlador.php";
include "$root/Optica/Controlador/ClienteControlador.php";
include "$root/Optica/login/helps/helps.php";
session_start();
header('Content-type: application/json');
$resultado = array();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_REQUEST["txtNombre"]) && isset($_REQUEST["txtPaterno"]) && isset($_REQUEST["txtMaterno"]) && isset($_REQUEST["txtPassword"])  && isset($_REQUEST["txtCorreo"])){
        $txtpassword = validar_campo($_REQUEST["txtPassword"]);
        $txtnombre = validar_campo($_REQUEST["txtNombre"]);
        $txtpaterno = validar_campo($_REQUEST["txtPaterno"]);
        $txtmaterno = validar_campo($_REQUEST["txtMaterno"]);
        $txtcorreo = validar_campo($_REQUEST["txtCorreo"]);
        $txtprivilegio = 2;
        $resultado = array("estado"=>"true");
        $cliente_ID = ClienteControlador::registrarBasico($txtcorreo, $txtnombre,$txtpaterno, $txtmaterno );
        if($cliente_ID>0){
          if(UsuarioControlador::registrar($txtcorreo, $txtpassword, $txtprivilegio, $cliente_ID)){
	         $nombcomp = trim($txtnombre)." ".trim($txtpaterno)." ".trim($txtmaterno);
         	$_SESSION["usuario"] = array(
         		"nombre" => $nombcomp,
         		"correo" => $txtcorreo,
         		"privilegio" => $txtprivilegio,
         	);
         	header("location:admin.php");
          }          	
        }
	
    }
}else{
    header("location:registro.php?error=1");	
}
?>