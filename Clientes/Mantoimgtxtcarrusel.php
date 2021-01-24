<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include_once "Parciales/head.php";
include_once "Parciales/menu.php";
include_once "$root/Optica/Controlador/CarruselControlador.php";
//include_once "$root/Optica/Controlador/ConfigControlador.php";

$transaccion = isset($_REQUEST['transaccion'])?$_REQUEST['transaccion']:"";
$imgtxt = null;
$Imagen_ID = "";
$Texto_ID = ""; 
$FechaInicial = ""; 
$FechaFinal = "";
$Prioridad = "";   

//Obtener Imagen
$Imagenes= CarruselControlador::getAllImagen();
$arr_Imagen_ID = $Imagenes['arr_Imagen_ID'];
$arr_Descripcion = $Imagenes['arr_Descripcion'];

//Obtener Texto
$Textos= CarruselControlador::getAllTexto();
$arr_Texto_ID = $Textos['arr_Texto_ID'];
$arr_Texto = $Textos['arr_Texto'];


if($transaccion=="C"){
   $Imagen_ID = $_REQUEST['Imagen_ID'];
   $Texto_ID = $_REQUEST['Texto_ID'];
   $resultado = array("estado"=>"true");
   $imagen = CarruselControlador::getImagen($Imagen_ID);
   $texto = CarruselControlador::getTexto($Texto_ID);
   $Imagen_ID = $imgtxt->getImagen_ID();
   $Texto_ID = $imgtxt->getTexto_ID();
   $FechaInicial = $imgtxt->getFechaInicial();
   $FechaFinal = $imgtxt->getFechaFinal();
   $Prioridad = $imgtxt->getPrioridad();
   //echo " esto tiene = ".$medico->getMedico_ID();
}
?>
<div class="container">
	<div class="starter-template">
		<br><br><br>
		<div class="row">
			<div class="col">
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="frmAimgtxt" action="validarCodeimgtxtcarrusel.php" method="POST" role="form" enctype="multipart/form-data">
							<legend>Relacion Imagen-Texto Carrusel</legend>
							
							<div class="col-4"></div>

							
							<div class="form-group row">
								<div class="col-4">
									<label for="imagen_ID">No. Imagen</label>
									
									<select name="txtImagen_ID" class="form-control" id="txtImagen_ID" autofocus="" 
												placeholder="Imagen">
								
										<?php 
										$cuenta = 0;
										foreach($arr_Imagen_ID as $Imagen_ID){
											//Esto es la impresion del option
											echo "<option value='".$Imagen_ID."' "; 
											   // if($arr_Status[$c] == $Imagen_ID){
												//   echo " selected ";
											    //}
											echo " >".$arr_Imagen_ID[$cuenta]." :".$arr_Descripcion[$cuenta]." </option>";
											++ $cuenta;
										}
										?>
									</select>
								</div>	
								
								<div class="col-4">
									<label for="texto_ID">No. Texto</label>
									
									
									<select name="txtTexto_ID" class="form-control" id="txtTexto_ID" autofocus="" 
												placeholder="Texto">
								
										<?php 
										$cuenta = 0;
										foreach($arr_Texto_ID as $Texto_ID){
											//Esto es la impresion del option
											echo "<option value='".$Texto_ID."' "; 
											   // if($arr_Status[$c] == $Texto_ID){
												//   echo " selected ";
											    //}
											echo " >".$arr_Texto_ID[$cuenta]." :".$arr_Texto[$cuenta]." </option>";
											++ $cuenta;
										}
										?>
										</select>
									
									
								</div>
								<div class="col-4">
									<label for="prioridad">No. Prioridad</label>
									<input type="number" maxlength="20" name="txtPrioridad" class="form-control" id="txtPrioridad" autofocus="" 
									placeholder="# Prioridad" value="<?php echo $Prioridad; ?>" required>
								</div>
							</div>
							
					  <!-- <div class="form-group row">
								<div class="col-4">
									
									<label for="exampleFormControlFile1"></label>
									<input type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control-file" id="image" size="40" name="image" multiple id="exampleFormControlFile1">
										
								</div>								
																	
							</div> -->
								
					</div>
							
							<div class="form-group row">
								<div class="col-4">
									<label for="fechainicial">FechaInicial</label>
									<input type="date" maxlength="20" name="txtFechaInicial" class="form-control" id="txtFechaInicial" autofocus="" 
									placeholder="FechaInicial" value="<?php echo $FechaInicial; ?>" required>
								</div>
								<div class="col-4">
									<label for="fechafinal">FechaFinal</label>
									<input type="date" maxlength="20" name="txtFechaFinal" class="form-control" id="txtFechaFinal" autofocus="" 
									placeholder="FechaFinal" value="<?php echo $FechaFinal; ?>" required>
								</div>
							</div>
								
								

							<div class="form-group">
							<button type="submit" class="btn btn-success" name="guardar">Guardar</button>
							
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

 <?php include "Parciales/footer.php";?>