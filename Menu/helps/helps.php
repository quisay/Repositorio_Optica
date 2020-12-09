<?php
/***
*Funcion que sirve para validar y limpiar el campo
*
***/
function validar_campo($campo){
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}
?>