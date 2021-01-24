<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include "$root/Optica/Controlador/CarruselControlador.php";
include "$root/Optica/login/helps/helps.php";
session_start();
//header('Content-type: application/json');
$resultado = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	$revisar = getimagesize($_FILES["image"]["tmp_name"]);
    if($revisar !== false){
        $image_path = $_FILES['image']['tmp_name'];
	    $image = imagecreatefromjpeg($image_path);
		ob_start();
		imagejpeg($image);
		$img = ob_get_contents();
		ob_end_clean();
		//$img = str_replace('##','##',mysql_escape_string($img));
		
		$txtDescripcion = validar_campo($_REQUEST["txtDescripcion"]);
        $resultado = array("estado"=>"true");
        //Asignamos a la entidad Imgcarrusel
        $oImgcarrusel = new Imgcarrusel();

        $oImgcarrusel->setImagen($img);
		$oImgcarrusel->setDescripcion($txtDescripcion);

		$resultado = array("estado"=>"true");
        if(CarruselControlador::insertaImagen($oImgcarrusel)){
		   header('Location: Mantoimgcarrusel.php?transaccion=A');
			
        }else{
			header('Location: Mantoimgcarrusel.php?transaccion=W');
		}			
		die();
    }
}
//$resultado = array("estado"=>"false");
//return print(json_encode($resultado));
echo "<script>alert('Error ');</script>";
?>