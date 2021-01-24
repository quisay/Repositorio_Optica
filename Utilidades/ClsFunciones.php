<?php 
class ClsFunciones{
	/**
	 **Funcion Que suma Dias a una fecha con Formato dd-mm-yyyy
	 **/
	public static function AgregaDias($f, $Dias, $formato){
		try {
			$w_dias = $Dias;
			if($w_dias<0)$w_dias = $w_dias * -1;
			$intervalo = "P".$w_dias."D"; //Intervalo de Dias
			
			$f = str_replace("/","-",$f);
			if($Dias>0){
			   $fecha = new DateTime($f);
			   $fecha->add(new DateInterval($intervalo));
			}else{
			   $fecha = new DateTime($f);
               $fecha->sub(new DateInterval($intervalo));
			}
			return $fecha->format($formato);
		} catch (PDOException $e) {
			die("error ".$e->getMessage());
		}
	}
	
	
}

?>