<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/Optica/Controlador/CarruselControlador.php";
include "$root/Optica/login/helps/helps.php";
session_start();
header('Content-type: application/json');
$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
    if (isset($_REQUEST["txtTexto"])){
	
        $txtTexto_ID = validar_campo($_REQUEST["txtTexto_ID"]);
        $txtTexto = validar_campo($_REQUEST["txtTexto"]);
        $resultado = array("estado"=>"true");
        //Asignamos a la entidad Txtcarrusel
        $oTxtcarrusel = new Txtcarrusel();
        //$Ttxtcarrusel->setTexto_ID($txtTexto_ID);
		//echo " Txtcarrusel ".$txtTexto_ID;
        $oTxtcarrusel->setTexto($txtTexto);

		$resultado = array("estado"=>"true");
        if(CarruselControlador::registraTexto($oTxtcarrusel)){
			return print(json_encode($resultado));
            //return true;
        }	
    }
}
$resultado = array("estado"=>"false");
return print(json_encode($resultado));

?>