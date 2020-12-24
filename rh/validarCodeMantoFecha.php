<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/Optica/Controlador/ProgFechaControlador.php";
include "$root/Optica/login/helps/helps.php";
session_start();
header('Content-type: application/json');
$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
    if (isset($_REQUEST["txtMedico"])){
        $txtMedico_ID = validar_campo($_REQUEST["txtMedico"]);
        $txtSemana = validar_campo($_REQUEST["txtSemanaprogramar"]);
        $txtAnio = validar_campo($_REQUEST["txtAnioprogramar"]);
       
        $txtFechaMod = date('d-m-Y H:i:s');
        $txtUsuario = "nada";
     
        $resultado = array("estado"=>"true");
        //Asignamos a la entidad cliente
        $ProgFecha = new ProgFecha();
        
        $ProgFecha->setMedico_ID($txtMedico_ID);
        $ProgFecha->setSemana($txtSemana);
        $ProgFecha->setAnio($txtAnio);
      
        $ProgFecha->setFechaMod($txtFechaMod);
        $ProgFecha->setUsuario($txtUsuario);

		$resultado = array("estado"=>"true");
		
		for ($i = 0; $i <= 6; $i++) {
			$txtFecha = validar_campo($_REQUEST["txtFecha".$i]);
			$txtActividad = validar_campo($_REQUEST["cbox".$i]);
			$ProgFecha->setFecha($txtFecha);
			$ProgFecha->setActividad($txtActividad);
			ProgFechaControlador::registraProgFecha($ProgFecha);
		}
		return print(json_encode($resultado));
    }
}
$resultado = array("estado"=>"false");
return print(json_encode($resultado));

?>