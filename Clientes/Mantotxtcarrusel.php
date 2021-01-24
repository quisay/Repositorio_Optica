<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include_once "Parciales/head.php";
include_once "Parciales/menu.php";
include_once "$root/Optica/Controlador/CarruselControlador.php";
//include_once "$root/Optica/Controlador/ConfigControlador.php";

$transaccion = isset($_REQUEST['transaccion'])?$_REQUEST['transaccion']:"";
$texto = null;
$Texto_ID = ""; 
$Texto = "";    

//Obtener Medico
//$Config_medico= ConfigControlador::getConfig("MEDICO");
//$arr_Descripcion_Medico = $Config_medico['arr_Descripcion'];
//$arr_Catalogo_ID_Medico = $Config_medico['arr_Catalogo_ID'];

if($transaccion=="C"){
   $Texto_ID = $_REQUEST['Texto_ID'];
   $resultado = array("estado"=>"true");
   $texto = CarruselControlador::getTexto($Texto_ID);
   $Texto = $texto->getTexto();  
   //echo " esto tiene = ".$texto->getTexto_ID();
}
?>
<div class="container">
	<div class="starter-template">
		<br><br><br>
		<div class="row">
			<div class="col">
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="frmAtexto" action="validarCodetxtcarrusel.php" method="POST" role="form">
							<legend>Texto Carrusel</legend>
							
						<div class="col-4"></div>

							
							<div class="form-group row">
								<div class="col-4">
									<label for="texto_ID">Texto_ID</label>
									<input readonly type="text" maxlength="20" name="txtTexto_ID" class="form-control" id="txtTexto_ID" autofocus="" 
									placeholder="Texto_ID" value="<?php echo $Texto_ID; ?>">
								</div>								
							</div>
							
							<div class="form-group row">
								<div class="col">
									<label for="texto">Texto</label>
									<input type="text" maxlength="20" name="txtTexto" class="form-control" id="txtTexto" autofocus="" 
									placeholder="Texto" value="<?php echo $Texto; ?>" required>
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