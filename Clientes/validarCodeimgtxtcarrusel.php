<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/Optica/Controlador/CarruselControlador.php";
include "$root/Optica/login/helps/helps.php";
session_start();
header('Content-type: application/json');
$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	
	 if (isset($_REQUEST["cuantos_imgtxt"])){
        $cuantos_imgtxt = validar_campo($_REQUEST["cuantos_imgtxt"]);
        
       
        $resultado = array("estado"=>"true"); 
        $guarda = isset($_REQUEST['guarda'])?$_REQUEST['guarda']:"";
		
		if($guarda=="si") CarruselControlador::eliminaAllImgTxt();
		//Recorremos todos los elementos del html de APO que fueron selecionados
		for($i=0; $i<$cuantos_imgtxt; $i++){
			
			//echo "<br> boton borra $i ======".$_REQUEST['borra_'.$i];
			$borra = isset($_REQUEST['borra_'.$i])?$_REQUEST['borra_'.$i]:"";
			
			
            $txtImagen_ID = validar_campo($_REQUEST["txtImagen_ID".$i]);
		    $txtTexto_ID = validar_campo($_REQUEST["txtTexto_ID".$i]);
            $txtFechaInicial = validar_campo($_REQUEST["txtFechaInicial".$i]);
            $txtFechaFinal = validar_campo($_REQUEST["txtFechaFinal".$i]);
            $txtPrioridad = validar_campo($_REQUEST["txtPrioridad".$i]);
			$resultado = array("estado"=>"true");
			//Asignamos a la entidad Imgtxtcarrusel
			$Imgtxtcarrusel = new Imgtxtcarrusel();
			$Imgtxtcarrusel->setImagen_ID($txtImagen_ID);
			$Imgtxtcarrusel->setTexto_ID($txtTexto_ID);
			$Imgtxtcarrusel->setFechaInicial($txtFechaInicial);
			$Imgtxtcarrusel->setFechaFinal($txtFechaFinal);
			$Imgtxtcarrusel->setPrioridad($txtPrioridad);
			if($borra=="si"){
				if(CarruselControlador::eliminaImgTxt($Imgtxtcarrusel)){
				    return print(json_encode($resultado));   
			    }
			}
			if($guarda=="si"){
			   CarruselControlador::relacionaImgTxt($Imgtxtcarrusel);	    
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