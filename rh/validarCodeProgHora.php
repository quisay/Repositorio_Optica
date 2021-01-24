<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/Optica/entidades/ProgHorario.php";
include "$root/Optica/Controlador/ProgHorarioControlador.php";
include "$root/Optica/login/helps/helps.php";
session_start();
header('Content-type: application/json');
$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
    if (isset($_REQUEST["cuentahorasmodal"])){
	
        $cuentahorasmodal = $_REQUEST["cuentahorasmodal"];
       
        $resultado = array("estado"=>"true");
		//$Medico_ID = $_REQUEST["Medico_ID"];
        //$Fecha = $_REQUEST["Fecha"];
		$Medico_ID = 1;
        $Fecha = "01-01-2021";
		
		ProgHorarioControlador::deleteProgHorario($Medico_ID, $Fecha);
		//Recorremos todos los elementos del html de Hora1 que fueron selecionados
			for($i=1; $i<=$cuentahorasmodal; $i++){

				$Hora = isset($_REQUEST["hora".$i])?$_REQUEST["hora".$i]:null;

				//Asignamos a la entidad Horario
					$Horario = new ProgHorario();
					$Horario->setMedico_ID($Medico_ID);
					$Horario->setFecha($Fecha);
					$Horario->setHora(str_replace(":","",$Hora));
					
					$resultado = array("estado"=>"true");
				//Insertamos registro
               ProgHorarioControlador::registraProgHorario($Horario);
			}
        return print(json_encode($resultado));
    }
}
$resultado = array("estado"=>"true");
return print(json_encode($resultado));

?>