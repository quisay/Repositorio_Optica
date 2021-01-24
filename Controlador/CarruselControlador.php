<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include_once "$root/Optica/datos/clsImgCarrusel.php";
include_once "$root/Optica/datos/clsTxtCarrusel.php";
include_once "$root/Optica/datos/clsImgTxtCarrusel.php";
class 	CarruselControlador{

	public function getImagen($Imagen_ID){
		$oimagen = new Imgcarrusel();
		$oimagen->setImagen_ID($Imagen_ID);
		return clsImgCarrusel::getImagen($oimagen);
	}
	public function getAllImagen(){
		return clsImgCarrusel::getAllImagen();
	}
	public function insertaImagen($oimagen){
		return clsImgCarrusel::insertaImagen($oimagen);
	}
	public function eliminaImagen($Imagen_ID){
		return clsImgCarrusel::insertaImagen($Imagen_ID);
	}
	
	
	public function getTexto($Texto_ID){
		$otexto = new Texto();
		$otexto->setTexto_ID($Texto_ID);
		return clsTxtCarrusel::getTexto($otexto);
	}
	public function getAllTexto(){
		return clsTxtCarrusel::getAllTexto();
	}
	public function registraTexto($otexto){
		return clsTxtCarrusel::registraTexto($otexto);
	}
	public function eliminaTexto($Texto_ID){
		return clsTxtCarrusel::registraTexto($Texto_ID);
	}
	
	
	public function getImgTxt($ImgTxt_ID){
		$oimgtxt = new ImgTxt();
		$oimgtxt->setImgTxt_ID($ImgTxt_ID);
		return clsImgTxtCarrusel::getTexto($otexto);
	}
	public function getAllImgTxt(){
		return clsImgTxtCarrusel::getAllImgTxt();
	}
	public function relacionaImgTxt($oimgtxt){
		return clsImgTxtCarrusel::relacionaImgTxt($oimgtxt);
	}
	public function eliminaImgTxt($oimgtxt){
		return clsImgTxtCarrusel::eliminaImgTxt($oimgtxt);
	}
	public function eliminaAllImgTxt(){
		return clsImgTxtCarrusel::eliminaAllImgTxt();
	}
	
}



?>