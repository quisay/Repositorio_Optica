<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include_once "Parciales/head.php";
include_once "Parciales/menu.php";
include_once "$root/Optica/Controlador/CarruselControlador.php";
//include_once "$root/Optica/Controlador/ConfigControlador.php";

$transaccion = isset($_REQUEST['transaccion'])?$_REQUEST['transaccion']:"";
$imagen = null;
$Imagen_ID = ""; 
$Imagen = ""; 
$Descripcion = "";   

//Obtener Medico
//$Config_medico= ConfigControlador::getConfig("MEDICO");
//$arr_Descripcion_Medico = $Config_medico['arr_Descripcion'];
//$arr_Catalogo_ID_Medico = $Config_medico['arr_Catalogo_ID'];

if($transaccion=="A"){
	echo "<script>alert('Se insertaron los Datos correctamente');</script>";
	
	/*
	$imagen = CarruselControlador::getImagen("1"); 
    $Imagen = $imagen->getImagen();
	echo '<img src = "data:image/jpeg;base64,' . base64_encode($Imagen) . '" width = "450px" height = "450px"/>';
	die();
	*/
}
if($transaccion=="W"){
	echo "<script>alert('Error al insertar Datos');</script>";
}
if($transaccion=="C"){
   $Imagen_ID = $_REQUEST['Imagen_ID'];
   $resultado = array("estado"=>"true");
   $imagen = CarruselControlador::getImagen($Imagen_ID);
   $Imagen_ID = $imagen->getImagen_ID();  
   $Imagen = $imagen->getImagen();
   $Descripcion = $imagen->getDescripcion();
   //echo " esto tiene = ".$imagen->getImagen_ID();
}
?>
<div class="container">
	<div class="starter-template">
		<br><br><br>
		<div class="row">
			<div class="col">
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="frmAimagen" action="validarCodeimgcarrusel.php" method="POST" role="form" enctype="multipart/form-data">
							<legend>Imagen Carrusel</legend>
							
						<div class="col-4"></div>

							
							<div class="form-group row">
								<div class="col-4">
									<label for="imagen_ID">Imagen_ID</label>
									<input readonly type="text" maxlength="20" name="txtImagen_ID" class="form-control" id="txtImagen_ID" autofocus="" 
									placeholder="Imagen_ID" value="<?php echo $Imagen_ID; ?>">
								</div>								
							</div>
							<div class="form-group row">
								<div class="col-4">
									
									<label for="exampleFormControlFile1"></label>
									<input type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control-file" id="image" size="40" name="image" multiple id="exampleFormControlFile1">
										
								</div>								
																	
							</div>
							<div class="form-group row">
																
								<div class="col-4">
									<label for="descripcion">Descripcion</label>
									<input type="text" maxlength="40" size="40" name="txtDescripcion" class="form-control" id="txtDescripcion" autofocus="" 
									placeholder="Descripcion" value="<?php echo $Descripcion; ?>" required>
								</div>												
							</div>

							<div class="form-group">
							<button type="submit" class="btn btn-success">Guardar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

 <?php include "Parciales/footer.php";?>