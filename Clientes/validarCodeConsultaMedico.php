<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/Optica/Controlador/MedicoControlador.php";
include "$root/Optica/login/helps/helps.php";
session_start();
header('Content-type: application/json');
$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	
	 if (isset($_REQUEST["cuantos_medicos"])){
        $cuantos_medicos = validar_campo($_REQUEST["cuantos_medicos"]);
        
       
        $resultado = array("estado"=>"true"); 
        $guarda = isset($_REQUEST['guarda'])?$_REQUEST['guarda']:"";
		
		if($guarda=="si") MedicoControlador::eliminaAllMedico();
		//Recorremos todos los elementos del html de APO que fueron selecionados
		for($i=0; $i<$cuantos_medicos; $i++){
			
			//echo "<br> boton borra $i ======".$_REQUEST['borra_'.$i];
			$borra = isset($_REQUEST['borra_'.$i])?$_REQUEST['borra_'.$i]:"";
			
			
            $txtMedico_ID = validar_campo($_REQUEST["txtMedico_ID".$i]);
		    $txtNombre = validar_campo($_REQUEST["txtNombre".$i]);
            $txtApaterno = validar_campo($_REQUEST["txtApaterno".$i]);
            $txtAmaterno = validar_campo($_REQUEST["txtAmaterno".$i]);
			$resultado = array("estado"=>"true");
			//Asignamos a la entidad Medico
			$Medico = new Medico();
			$Medico->setMedico_ID($txtMedico_ID);
			$Medico->setNombre($txtNombre);
			$Medico->setApaterno($txtApaterno);
			$Medico->setAmaterno($txtAmaterno);
			if($borra=="si"){
				if(MedicoControlador::eliminaMedico($Medico)){
				    return print(json_encode($resultado));   
			    }
			}
			if($guarda=="si"){
			   MedicoControlador::getAllMedico($Medico);	    
			}
		}
		if($guarda=="si"){
		   return print(json_encode($resultado));
		}
	}
				
	
}
$resultado = array("estado"=>"false");
return print(json_encode($resultado));

?>


